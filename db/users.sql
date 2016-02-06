CREATE TABLE USER(
        id_user   int (11) Auto_increment PRIMARY KEY NOT NULL ,
        status    TinyINT NOT NULL ,
        name      Varchar (50) NOT NULL ,
        firstname Varchar (50) ,
        email     Varchar (25) ,
        atCreate  Date NOT NULL ,
        atUpdate  Date NOT NULL ,
        id_class  Int NOT NULL ,
)ENGINE=InnoDB;