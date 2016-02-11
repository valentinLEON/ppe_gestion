/*Création de la table discipline*/

CREATE TABLE discipline(
        id_discipline     INT(11) Auto_increment  NOT NULL ,
        name_discipline   VARCHAR(25) NOT NULL ,
        dt_create         DATE NOT NULL , /*Date de création*/
        dt_update         DATE NOT NULL , /*Date de modification*/
        id_evaluation     INT NOT NULL ,
        PRIMARY KEY (id_evaluation) REFERENCES evaluation(id_evaluation),
)ENGINE=InnoDB;