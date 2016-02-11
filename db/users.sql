/*Création de la table user (professeurs/administration)*/

CREATE TABLE users(
        id_users   int (11) Auto_increment PRIMARY KEY NOT NULL ,
        status    TinyINT NOT NULL , /*Définit le niveau de droit de l'utilisateur*/
        name      Varchar (50) NOT NULL ,
        firstname Varchar (50) ,
        email     Varchar (25) ,
        dt_create  Date NOT NULL , /*Date de création*/
        dt_update  Date NOT NULL , /*Date de modification*/
        id_class  Int NOT NULL ,
)ENGINE=InnoDB;