/*Création de la table evaluation*/

CREATE TABLE evaluation(
        id_evaluation INT (11) Auto_increment  NOT NULL ,
        grade_student INT NOT NULL ,
        judgement     Varchar (200) , /*Définit l'appréciation de l'élève sur son travail*/
        id_user       Int NOT NULL ,
        dt_Create      Date NOT NULL , /*Date de création*/
        dt_Update      Date NOT NULL , /*Date de modification*/
        PRIMARY KEY (id_evaluation) REFERENCES discipline(id_evaluation),
        FOREIGN KEY (id_student) REFERENCES student(id_student)
)ENGINE=InnoDB;