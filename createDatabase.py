import connect

cur.execut("create table character ("
   "charID tinyint not null auto_increment,"
    "charStrength tinyint not null,"
    "charDexterity tinyint not null,"
    "charConsitution tinyint not null,"
    "charIntelligence tinyint not null,"
    "charWisdom tinyint not null,"
    "charCharisma tinyint not null,"
    "primary key(charID)")

cur = db.cursor()
cur.execute("Select * from character")