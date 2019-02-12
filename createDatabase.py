import mysql.connector
from mysql.connector import errorcode

try:
    db = mysql.connector.connect(host="localhost",
                                 user="Kreutz",
                                 database="gmat",
                                 password="#Mustangs18PennState18")

    cur = db.cursor()
    cur.execute("""create table test(name varchar(30))""")


except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Incorrect Login Information.. Please Try Again.")
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Invalid Database. Aborting..")
    else:
        print(err)
else:
    db.close()
