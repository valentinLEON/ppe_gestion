/*Création de la table className*/

CREATE TABLE className(
    id_class INT(11) PRIMARY KEY NOT NULL,
    class_name VARCHAR(10),
    class_option VARCHAR(10), /*Définit l'option de l'élève*/
    class_year SMALLINT, /*Définit l'année de la classe*/
    dt_Create DATE NOT NULL, /*Date de création*/
    dt_Create DATE NOT NULL, /*Date de modification*/
    id_student INT NOT NULL,
    PRIMARY KEY (id_student)REFERENCES users (id_student),
)