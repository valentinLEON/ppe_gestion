CREATE TABLE className
(
    id_class INT(11) PRIMARY KEY NOT NULL,
    classe_name VARCHAR(10),
    class_years SMALLINT,
    dt_Create DATE NOT NULL,
    dt_Create DATE NOT NULL,
    id_student INT NOT NULL,
    PRIMARY KEY (id_student)REFERENCES user(id_student)
)