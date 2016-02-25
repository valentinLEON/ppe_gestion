/*Supression de la table userToClass si elle existe*/
DROP TABLE IF EXISTS userToClass;

/*Création de la table userToClass*/
CREATE TABLE userToClass(
    `id`              INT (11) NOT NULL ,
    `id_user`        INT (11) NOT NULL ,
    `id_class`   INT (11) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_class) REFERENCES className(id_class)
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;