/*Création de la table evaluation*/

CREATE TABLE evaluation(
        id_evaluation   INT (11) Auto_increment  NOT NULL ,
        grade_student   INT NOT NULL ,
        judgement       VARCHAR (200) , /*Définit l'appréciation de l'élève sur son travail*/
        id_user         INT NOT NULL ,
        dt_create       DATE NOT NULL , /*Date de création*/
        dt_update       DATE NOT NULL , /*Date de modification*/
        PRIMARY KEY (id_evaluation) REFERENCES discipline(id_evaluation),
        FOREIGN KEY (id_student) REFERENCES student(id_student)
)ENGINE=InnoDB;