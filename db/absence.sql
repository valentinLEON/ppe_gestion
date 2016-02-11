/*Création de la table d'absence*/

CREATE TABLE absence(
    id_evaluation INT PRIMARY KEY NOT NULL,
    id_student INT FOREIGN KEY,
    id_discipline INT FOREIGN KEY,
    nbrAbs SMALLINT, /*Définit le nombre d'absence que l'élève à eu*/
    dateAbs DATE, /*Définit le jour/heure de(s) absence*/
    late bool, /*Définit le(s) retard(s)*/
    judgmentAbs bool, /*Définit si l'absence est ou a été justifier*/
    dt_Create DATE, /*Date de création*/
    dt_Update DATE, /*Date de modification*/
)