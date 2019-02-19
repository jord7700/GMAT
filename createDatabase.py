import mysql.connector
from mysql.connector import errorcode

try:
    #Connecting to the database using mysql.connector.
    db = mysql.connector.connect(host="localhost",
                                 user="Kreutz",
                                 database="gmat",
                                 password="#Mustangs18PennState18")

    cur = db.cursor()

    #This table includes basic character data from a rank of 1-25 with 25 being more experienced.
    cur.execute("""create table characterData (charID int not null auto_increment,      #Characters ID
                                                charClass varchar(20) not null,         #Class of Char
                                                charName varchar(20) not null,          #Name
                                                charStrength int not null,              #Strength
                                                charDexterity int not null,             #Movement level
                                                charConstitution int not null,          #Immunity to illness
                                                charIntelligence int not null,          #Intelligence
                                                charWisdom int not null,                #Wisom
                                                charCharisma int not null,              #Charisma
                                                primary key(charID))""")                #Primary Key = charID

    #This table includes basic monster stats along with monstCR = Challenge Rating, monstExp4CR = Experience the players
    #receive for defeating that specific monster.
    cur.execute("""create table monsterData (monstID int not null auto_increment,       #Monster ID
                                            monstName varchar(20) not null,             #Name
                                            monstHP int not null,                       #Hit Points
                                            monstArmor int not null,                    #Armor
                                            monstCR int not null,                       #Challenge Rating
                                            monstExp4CR int not null,                   #Experience from defeating monster
                                            primary key(monstID))""")                   #Primary Key = monstID              
                                            
    #This table includes data for simple melee weapons.                             
    cur.execute("""Create table simpleMeleeWeapons (smwID int not null auto_increment,  #simpleMeleeWeapons ID
                                                    smwCost int not null,               #Cost of smw
                                                    smwDmg varchar(5) not null,         #smw Damage
                                                    smwWeight int not null,             #Weight of weapon
                                                    smwProperties varchar(50) not null, #Properties: two-handed, throwable, etc.
                                                    primary key(smwID))""")             #Primary Key = smwID

    #This table includes data for simple ranged weapons.
    cur.execute("""create table simpleRangedWeapons (srwID int not null auto_increment, #simpleRangedWeapons ID
                                                     srwCost int not null,              #cost of srw
                                                     srwDmg varchar(5) not null,        #srw Damage
                                                     srwWeight int not null,            #Weight of weapon
                                                     srwProperties varchar(50) not null,#Properties
                                                     primary key (srwID))""")           #Primary Key = srwID
                                                     
    #This table includes data for martial melee weapons.
    cur.execute("""create table martialMeleeWeapons (mmwID int not null auto_increment, #martialMeleeWeapons ID
                                                     mmwCost int not null,              #cost of mmw
                                                     mmwDmg varchar(5) not null,        #mmw Damage
                                                     mmwWeight int not null,            #Weight of weapon
                                                     mmwProperties varchar(50) not null,#Properties
                                                     primary key (mmwID))""")           #Primary Key = mmwID
                                                     
    #This table includes data for martial ranged weapons.
    cur.execute("""create table martialRangedWeapons (mrwID int not null auto_increment, #martialRangedWeapons ID
                                                     mrwCost int not null,              #cost of mrw
                                                     mrwDmg varchar(5) not null,        #mrw Damage
                                                     mrwWeight int not null,            #Weight of weapon
                                                     mrwProperties varchar(50) not null,#Properties
                                                     primary key (mrwID))""")           #Primary Key = mrwID
    
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
