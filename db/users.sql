/*Création de la table user (professeurs/administration)*/

CREATE TABLE users(
        id_users        INT (11) Auto_increment PRIMARY KEY NOT NULL ,
        status          TinyINT NOT NULL , /*Définit le niveau de droit de l'utilisateur*/
        name            VARCHAR (50) NOT NULL ,
        firstname       VARCHAR (50) ,
        email           VARCHAR (25) ,
        dt_create       Date NOT NULL , /*Date de création*/
        dt_update       Date NOT NULL , /*Date de modification*/
        id_class        INT NOT NULL ,
)ENGINE=InnoDB;