CREATE TABLE DISCIPLINE(
        id_discipline   int (11) Auto_increment  NOT NULL ,
        name_discipline Varchar (25) NOT NULL ,
        dt_Create        Date NOT NULL ,
        dt_Update        Date NOT NULL ,
        id_grade        Int NOT NULL ,
        id_class        Int NOT NULL ,
        PRIMARY KEY (id_grade ,id_class )
)ENGINE=InnoDB;