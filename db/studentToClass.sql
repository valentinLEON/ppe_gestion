CREATE TABLE studentToClass(
    `id_class`        INT(11) NOT NULL ,
    `id_student`      INT(11) NOT NULL,
    FOREIGN KEY (id_class) REFERENCES className (id_class),
    FOREIGN KEY (id_student) REFERENCES student(id_student)
)