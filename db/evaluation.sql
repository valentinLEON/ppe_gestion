/*Supression de la table evaluation si elle existe*/
DROP TABLE IF EXISTS evaluation;

/*Création de la table evaluation*/
CREATE TABLE evaluation(
        `id_evaluation`     INT (11) Auto_increment NOT NULL ,
        `grade_student`     INT NOT NULL , /*prend la note*/
        `judgement`         VARCHAR (200) , /*Définit l'appréciation de l'élève sur son travail*/
        `coef_discipline`   INT NOT NULL , /*prend le coef*/
        `dt_create`         DATE NOT NULL , /*Date de création*/
        `dt_update`         DATE NOT NULL , /*Date de modification*/
        `id_student`        INT NOT NULL , /*clé étrangère prend l'id student de la table student*/
        PRIMARY KEY (id_evaluation),
        FOREIGN KEY (id_student) REFERENCES student(id_student)
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;