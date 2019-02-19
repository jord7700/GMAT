import mysql.connector
from mysql.connector import errorcode

try:
    #Connecting to the database using mysql.connector.
    db = mysql.connector.connect(host="localhost",
                                 user="Kreutz",
                                 database="gmat",
                                 password="#Mustangs18PennState18")

    cur = db.cursor()

    cur.execute("""drop table characterData""")
    cur.execute("""drop table monsterData""")
    cur.execute("""drop table simpleMeleeWeapons""")
    cur.execute("""drop table simpleRangedWeapons""")
    cur.execute("""drop table martialMeleeWeapons""")
    cur.execute("""drop table martialRangedWeapons""")



#Test for errors.
except mysql.connector.Error as err:
    #Check for correct login info.
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Incorrect Login Information.. Please Try Again.")
    #Check for if database exists.
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Invalid Database. Aborting..")
    #Print an error.
    else:
        print(err)

#Close connection.
else:
    db.close()
