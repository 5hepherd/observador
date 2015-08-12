CREATE DATABASE evaluaciones;

USE evaluaciones;

CREATE TABLE docentes(
    cedula varchar(8) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    id_grupo INT(2) NOT NULL,
    id_materia INT(2) NOT NULL,

    PRIMARY KEY(cedula)
) ENGINE=InnoDB ;

CREATE TABLE estudiantes(
    codigo varchar(6) NOT NULL,
    nombre varchar(39) NOT NULL,
    id_grupo INT(2) NOT NULL,
    id_materia INT(2) NOT NULL,

    PRIMARY KEY(codigo)
) ENGINE=InnoDB ;

CREATE TABLE grupos(
    id_grupo INT(2) NOT NULL auto_increment,
    nombre_grupo VARCHAR(12) NOT NULL,

    PRIMARY KEY(id_grupo)
) ENGINE=InnoDB ;

CREATE TABLE materias(
    id_materia INT(2) NOT NULL auto_increment,
    nombre_materia VARCHAR(20) NOT NULL,

    PRIMARY KEY(id_materia)
) ENGINE=InnoDB ;

