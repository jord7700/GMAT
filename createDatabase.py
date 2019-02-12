import mysql.connector
from mysql.connector import errorcode

try:
    #Connecting to the database using mysql.connector.
    db = mysql.connector.connect(host=""
                                 user=""
                                 database=""
                                 password=""

    cur = db.cursor()

    #This table includes basic character data from a rank of 1-25 with 25 being more experienced.
    cur.execute("""create table characterData (charID int not null auto_increment,  #Characters ID
                                                charName varchar(20) not null,      #Name
                                                charStrength int not null,          #Strength
                                                charDexterity int not null,         #Movement level
                                                charConstitution int not null,      #Immunity to illness
                                                charIntelligence int not null,      #Intelligence
                                                charWisdom int not null,            #Wisom
                                                charCharisma int not null,          #Charisma
                                                primary key(charID))""")            #Primary Key = charID

    #This table includes basic monster stats along with monstCR = Challenge Rating, monstExp4CR = Experience the players
    #receive for defeating that specific monster.
    cur.execute("""create table monsterData (monstID int not null auto_increment,   #Monster ID
                                            monstName varchar(20) not null,         #Name
                                            monstHP int not null,                   #Hit Points
                                            monstArmor int not null,                #Armor
                                            monstCR int not null,                   #Challenge Rating
                                            monstExp4CR int not null,               #Experience from defeating monster
                                            primary key(monstID))""")               #Primary Key = monstID

    #Commiting.
    cur.execute("commit")

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
