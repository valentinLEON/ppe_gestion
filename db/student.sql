/*Création de la table student*/

CREATE TABLE Student(
        id_student              int (11) Auto_increment PRIMARY KEY NOT NULL ,
        student_name            Varchar (25) ,
        student_firstname       Varchar (50) ,
        student_birthday        Date ,
        dt_create               Date ,
        dt_update               Date ,
        student_email           Varchar (255) ,
        FOREIGN KEY (id_class) REFERENCES className(id_class),
)ENGINE=InnoDB;