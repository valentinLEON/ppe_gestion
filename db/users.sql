DROP TABLE IF EXISTS users;

/*Création de la table des utilisateurs*/

CREATE TABLE users(
  `id_users`        INT (11) NOT NULL ,
  `username`        VARCHAR (50) NOT NULL ,
  `name`        VARCHAR (50) NOT NULL ,
  `firstname`        VARCHAR (50) NOT NULL ,
  `password`        VARCHAR (50) NOT NULL ,
  `salt`            VARCHAR (23) NOT NULL , /* Hashage du mot de passe */
  `role`           VARCHAR (23) NOT NULL , /* Définit le rôle de l'utilisateur */
  `user_mail`       VARCHAR (255) NOT NULL ,
  `description`     VARCHAR (255) NOT ,
  `dt_create`       DATE NOT NULL , /*Date de création*/
  `dt_update`       DATE NOT NULL , /*Date de modification*/
  `id_discipline`   INT(11) NOT NULL,
  PRIMARY KEY (id_users),
  FOREIGN KEY (id_discipline) REFERENCES discipline(id_discipline),
)ENGINE=innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;