/*Création de la table discipline*/

CREATE TABLE discipline(
        id_discipline   int (11) Auto_increment  NOT NULL ,
        name_discipline Varchar (25) NOT NULL ,
        dt_create        Date NOT NULL , /*Date de création*/
        dt_update        Date NOT NULL , /*Date de modification*/
        id_evaluation    Int NOT NULL ,
        PRIMARY KEY (id_evaluation) REFERENCES evaluation(id_evaluation),
)ENGINE=InnoDB;