/*Création de la table discipline*/

CREATE TABLE DISCIPLINE(
        id_discipline   int (11) Auto_increment  NOT NULL ,
        name_discipline Varchar (25) NOT NULL ,
        dt_Create        Date NOT NULL , /*Date de création*/
        dt_Update        Date NOT NULL , /*Date de modification*/
        id_evaluation    Int NOT NULL ,
        PRIMARY KEY (id_evaluation) REFERENCES evaluation(id_evaluation),
)ENGINE=InnoDB;