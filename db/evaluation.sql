/*Création de la table evaluation*/

CREATE TABLE evaluation(
        id_evaluation INT (11) Auto_increment  NOT NULL ,
        grade_student INT NOT NULL ,

        id_student    Int NOT NULL ,
        id_user       Int NOT NULL ,
        judgement     Varchar (200) ,
        atCreate      Date NOT NULL ,
        atUpdate      Date NOT NULL ,
        PRIMARY KEY (id_grade )
)ENGINE=InnoDB;