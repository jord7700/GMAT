import mysql.connector
from mysql.connector import errorcode


try:
    db = mysql.connector.connect(host="localhost",
    user="Kreutz",
    database="gmat",
    password="#Mustangs18PennState18")
    
    

    

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Incorrect Login Information, Please try again.")
    elif err.no == errorcore.ER_BAD_DB_ERROR:
        print("Invalid Database. Aborting..")
    else:
        print(err)

    

else:
    db.close()
