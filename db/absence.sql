CREATE TABLE absence
(
    id_grade INT PRIMARY KEY NOT NULL,
    id_student INT FOREIGN KEY,
    id_discipline INT FOREIGN KEY,
    nbrAbs SMALLINT,
    dateAbs DATE,
    late bool,
    judgmentAbs bool,
    dtCreate DATE,
    dtUpdate DATE
)