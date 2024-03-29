/*Supression de la table className si elle existe*/
DROP TABLE IF EXISTS className;

/*Création de la table className*/
CREATE TABLE className(
    `id_class`        INT(11) Auto_increment NOT NULL ,
    `class_name`      VARCHAR(50) ,
    `class_option`    VARCHAR(50) , /*Définit l'option de l'élève*/
    `nombreEtudiant`  INT(11) , /*Définit le nombre d'élève dans la classe*/
    `class_year`      SMALLINT , /*Définit l'année de la classe*/
    `description`     MESSAGE_TEXT (100) , /* Description de la classe */
    `dt_create`       DATE NOT NULL , /*Date de création*/
    `dt_update`       DATE NOT NULL , /*Date de modification*/
    PRIMARY KEY (id_class)
)ENGINE=innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;