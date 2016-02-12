CREATE TABLE disciplineToClass(
    `id_class`        INT(11) NOT NULL ,
    `id_discipline`      INT(11) NOT NULL,
    FOREIGN KEY (id_class) REFERENCES className (id_class),
    FOREIGN KEY (id_discipline) REFERENCES discipline(id_discipline)
)