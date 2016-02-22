/*Supression de la table discipline si elle existe*/
DROP TABLE IF EXISTS discipline;

/*Création de la table discipline*/

CREATE TABLE discipline(
        `id_discipline`     INT(11) Auto_increment  NOT NULL ,
        `name_discipline`   VARCHAR(50) NOT NULL ,
        `dt_create`         DATE NOT NULL , /*Date de création*/
        `dt_update`         DATE NOT NULL , /*Date de modification*/
        `description`     VARCHAR NOT NULL ,
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;