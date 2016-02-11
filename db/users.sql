/*Création de la table user (professeurs/administration)*/

CREATE TABLE USER(
        id_user   int (11) Auto_increment PRIMARY KEY NOT NULL ,
        status    TinyINT NOT NULL , /*Définit le niveau de droit de l'utilisateur*/
        name      Varchar (50) NOT NULL ,
        firstname Varchar (50) ,
        email     Varchar (25) ,
        atCreate  Date NOT NULL , /*Date de création*/
        atUpdate  Date NOT NULL , /*Date de modification*/
        id_class  Int NOT NULL ,
)ENGINE=InnoDB;