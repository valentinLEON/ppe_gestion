/*Création de la table student*/

CREATE TABLE student(
        id_student              INT (11) Auto_increment PRIMARY KEY NOT NULL ,
        student_name            VARCHAR (25) ,
        student_firstname       VARCHAR (50) ,
        student_birthday        DATE ,
        dt_create               DATE NOT NULL , /*Date de création*/
        dt_update               DATE NOT NULL , /*Date de modification*/
        student_email           VARCHAR (255) ,
        FOREIGN KEY (id_class) REFERENCES className(id_class),
)ENGINE=InnoDB;