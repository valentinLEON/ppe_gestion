/*Création de la table evaluation*/

CREATE TABLE evaluation(
        id_evaluation     INT (11) Auto_increment NOT NULL ,
        grade_student     INT NOT NULL ,
        judgement         VARCHAR (200) , /*Définit l'appréciation de l'élève sur son travail*/
        coef_discipline   INT NOT NULL ,
        dt_create         DATE NOT NULL , /*Date de création*/
        dt_update         DATE NOT NULL , /*Date de modification*/
        id_student        INT NOT NULL ,
        PRIMARY KEY (id_evaluation),
        FOREIGN KEY (id_student) REFERENCES student(id_student)
)ENGINE=InnoDB;