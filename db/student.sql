/*Supression de la table student si elle existe*/
DROP TABLE IF EXISTS student;

/*Création de la table student*/
CREATE TABLE student(
        `id_student`              INT (11) Auto_increment NOT NULL ,
        `student_name`            VARCHAR (25) ,
        `student_firstname`       VARCHAR (50) ,
        `student_birthday`        DATE ,
        `student_address`         VARCHAR (50) ,
        `student_email`           VARCHAR (255) ,
        `student_statut`          VARCHAR (100) , /*Définit le type de contrat*/
        `dt_create`               DATE NOT NULL , /*Date de création*/
        `dt_update`               DATE NOT NULL , /*Date de modification*/
        PRIMARY KEY (id_student)
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;