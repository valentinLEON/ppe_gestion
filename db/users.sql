DROP TABLE IF EXISTS users;

/*Création de la table des utilisateurs*/

CREATE TABLE users(
  `id_users`        INT(11) NOT NULL ,
  `username`        VARCHAR(50) NOT NULL,
  `password`        VARCHAR(50) NOT NULL,
  `salt`            VARCHAR(23) NOT NULL, /* Hashage du mot de passe */
  `roles`           VARCHAR(23) NOT NULL, /* Définit le rôle de l'utilisateur */
  `dt_create`       DATE NOT NULL , /*Date de création*/
  `dt_update`       DATE NOT NULL , /*Date de modification*/
  `id_discipline`   INT(11) NOT NULL,
  `id_class`        INT(11) NOT NULL,
  PRIMARY KEY (id_users),
  FOREIGN KEY (id_discipline) REFERENCES discipline(id_discipline),
  FOREIGN KEY (id_class) REFERENCES className(id_class)
)ENGINE=innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;