import mysql.connector
from mysql.connector import errorcode

try:
  cnx = mysql.connector.connect(user='Kreutz',
                                database='gmat',
                                 password='#Mustangs18PennState18')
except mysql.connector.Error as err:
  if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
    print("Something is wrong with your user name or password")
  elif err.errno == errorcode.ER_BAD_DB_ERROR:
    print("Database does not exist")
  else:
    print(err)
    
TABLES={}

TABLES ['character'] = (
          "create table character ("
          "monstID int not null auto_increment,"
          "monstName varchar(20) not null,"
          "monstArmor int not null,"
          "monstCR int not null,"
          "constraint monst_PK primary key('monstID'))")

cnx.close()

 