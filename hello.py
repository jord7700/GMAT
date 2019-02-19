#!/usr/bin/env python

from wsgiref.simple_server import make_server
from cgi import parse_qs, escape
import json
'''
html = """
<html>
<body>
   <form method="post" action="">
        <p>
           Notes : <input type="text" name="notes" value="%(notes)s">
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>
    <p>
        Notes: %(notes)s<br>
    </p>
</body>
</html>
"""
'''
def application(environ, start_response):

    # the environment variable CONTENT_LENGTH may be empty or missing
    try:
        request_body_size = int(environ.get('CONTENT_LENGTH', 0))
    except (ValueError):
        request_body_size = 0

    # When the method is POST the variable will be sent
    # in the HTTP request body which is passed by the WSGI server
    # in the file like wsgi.input environment variable.
    request_body = environ['wsgi.input'].read(request_body_size)
    #d = parse_qs(request_body)
    d = json.loads(request_body)

    #notes = d.get('notes', [''])[0] # Returns the first note value.
    notes = d['notes']

    # Always escape user input to avoid script injection
    notes = escape(notes)

    print(str(notes))
    response_body = 'saved!'

    status = '200 OK'

    response_headers = [
        ('Content-Type', 'text/html'),
        ('Content-Length', str(len(response_body)))
    ]

    start_response(status, response_headers)
    object = open("/var/www/html/text.txt", "w+" )
    object.write(str(notes))
    return [response_body]

'''
httpd = make_server('localhost', 8051, application)
httpd.serve_forever()
'''