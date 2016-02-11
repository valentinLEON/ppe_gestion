/*Création de la table student*/

CREATE TABLE student(
        id_student              INT (11) Auto_increment NOT NULL ,
        student_name            VARCHAR (25) ,
        student_firstname       VARCHAR (50) ,
        student_birthday        DATE ,
        student_email           VARCHAR (255) ,
        dt_create               DATE NOT NULL , /*Date de création*/
        dt_update               DATE NOT NULL , /*Date de modification*/
        id_evaluation           INT NOT NULL ,
        PRIMARY KEY (id_student) ,
        FOREIGN KEY (id_evaluation) REFERENCES evaluation(id_evaluation)
)ENGINE=InnoDB;