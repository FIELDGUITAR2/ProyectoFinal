DROP DATABASE IF EXISTS AltairAir;
CREATE DATABASE AltairAir;
USE AltairAir;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET NAMES utf8mb4 */;

-- -----------------------
--       TABLAS BASE
-- -----------------------

CREATE TABLE GrAlt_Pais (
    idPais INT PRIMARY KEY AUTO_INCREMENT,
    nombrePais VARCHAR(100) NOT NULL
);

CREATE TABLE GrAlt_EstadoPersona (
    idEstadoPersona INT PRIMARY KEY AUTO_INCREMENT,
    nombreEstado VARCHAR(100) NOT NULL
);

CREATE TABLE GrAlt_EstadoVuelo (
    idEstado INT PRIMARY KEY AUTO_INCREMENT,
    nombreEstado VARCHAR(100) NOT NULL
);

CREATE TABLE GrAlt_ClaseBoleto (
    idClase INT PRIMARY KEY AUTO_INCREMENT,
    nombreClase VARCHAR(100) NOT NULL
);

CREATE TABLE GrAlt_TipoAvion (
    idTipo INT PRIMARY KEY AUTO_INCREMENT,
    nombreTipo VARCHAR(100) NOT NULL
);

-- -----------------------
--    TABLAS DEPENDIENTES
-- -----------------------

CREATE TABLE GrAlt_Ciudad (
    idCiudad INT PRIMARY KEY AUTO_INCREMENT,
    nombreCiudad VARCHAR(100) NOT NULL,
    idPais INT NOT NULL,
    descripcion VARCHAR(255),

    FOREIGN KEY (idPais) REFERENCES GrAlt_Pais(idPais)
);

CREATE TABLE GrAlt_Aeropuerto (
    idAeropuerto INT PRIMARY KEY AUTO_INCREMENT,
    idCiudad INT NOT NULL,
    nombreAeropuerto VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,

    FOREIGN KEY (idCiudad) REFERENCES GrAlt_Ciudad(idCiudad)
);

CREATE TABLE GrAlt_Avion (
    idAvion INT PRIMARY KEY AUTO_INCREMENT,
    idTipo INT NOT NULL,
    cantCombustible INT NOT NULL,
    capacidadPasajeros INT NOT NULL,
    nombreAvion VARCHAR(100) NOT NULL,

    FOREIGN KEY (idTipo) REFERENCES GrAlt_TipoAvion(idTipo)
);

CREATE TABLE GrAlt_Pasajero (
    idPasajero INT PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(100) NOT NULL,
    telefono VARCHAR(100),
    foto VARCHAR(255),
    idEstadoPersona INT NOT NULL,

    FOREIGN KEY (idEstadoPersona) REFERENCES GrAlt_EstadoPersona(idEstadoPersona)
);

CREATE TABLE GrAlt_Piloto (
    idPiloto INT PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    idEstadoPersona INT NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    foto VARCHAR(255),
    fecha_nac DATE NOT NULL,
    edad INT,

    FOREIGN KEY (idEstadoPersona) REFERENCES GrAlt_EstadoPersona(idEstadoPersona)
);

-- -----------------------
--        VUELOS
-- -----------------------

CREATE TABLE GrAlt_Vuelo (
    idVuelo INT PRIMARY KEY AUTO_INCREMENT,
    idAvion INT NOT NULL,
    idPiloto INT NOT NULL,
    idCopiloto INT NOT NULL,
    idEstado INT NOT NULL,
    idOrigen INT NOT NULL,
    idDestino INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    cantidadPasajeros INT NOT NULL DEFAULT 0,

    FOREIGN KEY (idAvion) REFERENCES GrAlt_Avion(idAvion),
    FOREIGN KEY (idPiloto) REFERENCES GrAlt_Piloto(idPiloto),
    FOREIGN KEY (idCopiloto) REFERENCES GrAlt_Piloto(idPiloto),
    FOREIGN KEY (idEstado) REFERENCES GrAlt_EstadoVuelo(idEstado),
    FOREIGN KEY (idOrigen) REFERENCES GrAlt_Aeropuerto(idAeropuerto),
    FOREIGN KEY (idDestino) REFERENCES GrAlt_Aeropuerto(idAeropuerto)
);

-- -----------------------
--        BOLETOS
-- -----------------------

CREATE TABLE GrAlt_Boleto (
    idBoleto INT PRIMARY KEY AUTO_INCREMENT,
    idVuelo INT NOT NULL,
    idPasajero INT NOT NULL,
    idClase INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    asiento VARCHAR(10) NOT NULL,

    FOREIGN KEY (idVuelo) REFERENCES GrAlt_Vuelo(idVuelo),
    FOREIGN KEY (idPasajero) REFERENCES GrAlt_Pasajero(idPasajero),
    FOREIGN KEY (idClase) REFERENCES GrAlt_ClaseBoleto(idClase)
);

-- -----------------------
--        ADMIN
-- -----------------------

CREATE TABLE GrAlt_Admin (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL
);

-- -----------------------
--  INSERTS ORIGINALES
-- -----------------------

INSERT INTO GrAlt_Pais VALUES
(1,'Colombia'),(2,'México'),(3,'Estados Unidos'),
(4,'Perú'),(5,'España');

INSERT INTO GrAlt_EstadoPersona VALUES
(1,'Activo'),(2,'Inactivo'),(3,'Suspendido'),
(4,'En Capacitación'),(5,'Retirado');

INSERT INTO GrAlt_EstadoVuelo VALUES
(1,'Programado'),(2,'En Vuelo'),(3,'Aterrizado'),
(4,'Cancelado'),(5,'Retrasado');

INSERT INTO GrAlt_ClaseBoleto VALUES
(1,'Económica'),(2,'Económica Premium'),
(3,'Business'),(4,'Primera Clase');

INSERT INTO GrAlt_TipoAvion VALUES
(1,'Airbus A320'),(2,'Airbus A330'),(3,'Boeing 737'),
(4,'Boeing 787'),(5,'Embraer E190');

INSERT INTO GrAlt_Ciudad VALUES
(1,'Bogotá',1,'Capital de Colombia'),
(2,'Medellín',1,'Ciudad de la eterna primavera'),
(3,'Ciudad de México',2,'Capital de México'),
(4,'Lima',4,'Capital de Perú'),
(5,'Miami',3,'Ciudad y hub en Florida, USA'),
(6,'Madrid',5,'Capital de España');

INSERT INTO GrAlt_Aeropuerto VALUES
(1,1,'El Dorado','Av. El Dorado #103-09, Bogotá'),
(2,2,'José María Córdova','Rionegro, Antioquia'),
(3,3,'Benito Juárez (AICM)','CDMX'),
(4,4,'Jorge Chávez','Callao, Lima'),
(5,5,'Miami International Airport','2100 NW 42nd Ave, Miami'),
(6,6,'Adolfo Suárez Madrid-Barajas','Avenida de la Hispanidad, Madrid');

INSERT INTO GrAlt_Avion VALUES
(1,1,12000,180,''),
(2,2,24000,260,''),
(3,3,11000,170,''),
(4,4,32000,300,''),
(5,5,8000,100,'');

INSERT INTO GrAlt_Pasajero VALUES
(1,'Laura','Pérez','lper@ce.com','c4ca4238a0b923820dcc509a6f75849b','3201000001','pasajeros/laura.jpg',1),
(2,'Pedro','Hernández','pedro.hernandez@mail.com','c81e728d9d4c2f636f067f89cc14862c','3201000002','pasajeros/pedro.jpg',1),
(3,'Valentina','López','valentina.lopez@mail.com','eccbc87e4b5ce2fe28308fd9f2a7baf3','3201000003','pasajeros/valentina.jpg',1),
(4,'José','Sánchez','jose.sanchez@mail.com','a87ff679a2f3e71d9181a67b7542122c','3201000004','pasajeros/jose.jpg',1),
(5,'Camila','Ruiz','camila.ruiz@mail.com','e4da3b7fbbce2345d7772b0674a318d5','3201000005','pasajeros/camila.jpg',1);

INSERT INTO GrAlt_Piloto VALUES
(1,'Castro Fidel M','García','juanperez@hotmail.com','c4ca4238a0b923820dcc509a6f75849b',3,'3143245152','', '1980-03-10',45),
(2,'julio','jaramillo','jj@ce.com','c81e728d9d4c2f636f067f89cc14862c',1,'3101000002','na','1999-09-09',48),
(3,'María Stephania','Santos','maria.santos@altairair.com','eccbc87e4b5ce2fe28308fd9f2a7baf3',3,'3101000003','', '1984-11-05',40),
(4,'Ricardo','Vargas','ricardo.vargas@altairair.com','a87ff679a2f3e71d9181a67b7542122c',3,'3101000004','', '1988-07-30',36),
(5,'Julio','Fernández','julio.fernandez@altairair.com','e4da3b7fbbce2345d7772b0674a318d5',1,'3101000005','pilotos/julio.jpg','1975-01-18',49),
(6,'fieldguitar','mirsa','fg@ce.com','827ccb0eea8a706c4c34a16891f84e7b',1,'3216548907',NULL,'2003-12-11',20),
(7,'Ahmed Mauricio','Gonzalez Ortiz','ag@ce.com','12345',2,'3213214567',NULL,'2003-01-01',NULL),
(8,'Ahmed Mauricio','Gonzalez Ortiz','ag@ce.com','12345',4,'3213214567','', '2003-01-01',NULL),
(9,'Julian Camilo','Guzman','4fe0f471561628b0e1b4b32df0e651f3','12345',1,'3216547894',NULL,'2003-01-01',NULL),
(10,'María Stephania','Santos','mf@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1,'3044113724',NULL,'2009-02-08',NULL);

INSERT INTO GrAlt_Vuelo VALUES
(1,1,1,2,1,1,5,'2025-06-10','08:00:00',0),
(2,2,3,4,1,3,1,'2025-06-11','10:30:00',0),
(3,3,2,5,2,5,4,'2025-06-12','14:45:00',0),
(4,4,4,1,3,2,6,'2025-06-13','19:00:00',0),
(5,5,5,3,1,4,3,'2026-06-30','06:15:00',0);

INSERT INTO GrAlt_Boleto VALUES
(1,1,1,1,450,'12A'),
(2,1,2,2,600,'12B'),
(3,2,3,1,320,'14C'),
(4,3,4,3,750,'3A'),
(5,4,5,4,1500,'1A');

INSERT INTO GrAlt_Admin VALUES
(1,'Carlos Mendoza','c.mendoza@altairair.com','c4ca4238a0b923820dcc509a6f75849b','3001000001'),
(2,'Laura Ramírez','l.ramirez@altairair.com','c81e728d9d4c2f636f067f89cc14862c','3001000002'),
(3,'Miguel Torres','m.torres@altairair.com','eccbc87e4b5ce2fe28308fd9f2a7baf3','3001000003'),
(4,'Ana Castillo','a.castillo@altairair.com','a87ff679a2f3e71d9181a67b7542122c','3001000004'),
(5,'Sofia Ruiz','s.ruiz@altairair.com','e4da3b7fbbce2345d7772b0674a318d5','3001000005'),
(6,'Samir','js@ce.com','827ccb0eea8a706c4c34a16891f84e7b','3044113724');

COMMIT;
