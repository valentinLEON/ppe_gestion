CREATE TABLE STUDENT(
        id_student     int (11) Auto_increment PRIMARY KEY NOT NULL ,
        name           Varchar (25) ,
        firstname      Varchar (25) ,
        birthday       Date ,
        status_student TinyINT ,
        atCreate       Date ,
        atUpdate       Date ,
        email          Varchar (25) ,
        id_class       Int FOREIGN KEY NOT NULL ,
)ENGINE=InnoDB;