import mysql.connector

mydb = mysql.connector.connect(
	host="localhost",
	user="root",
	passwd="Password123!"
)
print ("hello")
