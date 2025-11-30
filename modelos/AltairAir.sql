SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- DATABASE AltairAir
-- --------------------------------------------------------

-- --------------------------------------------------------
-- TABLE GrAlt_Admin
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Admin` (
  `idAdmin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Admin` VALUES
(1,'Carlos Mendoza','c.mendoza@altairair.com','c4ca4238a0b923820dcc509a6f75849b','3001000001'),
(2,'Laura Ramírez','l.ramirez@altairair.com','c81e728d9d4c2f636f067f89cc14862c','3001000002'),
(3,'Miguel Torres','m.torres@altairair.com','eccbc87e4b5ce2fe28308fd9f2a7baf3','3001000003'),
(4,'Ana Castillo','a.castillo@altairair.com','a87ff679a2f3e71d9181a67b7542122c','3001000004'),
(5,'Sofia Ruiz','s.ruiz@altairair.com','e4da3b7fbbce2345d7772b0674a318d5','3001000005'),
(6,'Samir','js@ce.com','827ccb0eea8a706c4c34a16891f84e7b','3044113724');

-- --------------------------------------------------------
-- TABLE GrAlt_Pais
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Pais` (
  `idPais` int(11) NOT NULL,
  `nombrePais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Pais` VALUES
(1,'Colombia'),(2,'México'),(3,'Estados Unidos'),(4,'Perú'),(5,'España');

-- --------------------------------------------------------
-- TABLE GrAlt_Ciudad
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombreCiudad` varchar(100) NOT NULL,
  `idPais` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Ciudad` VALUES
(1,'Bogotá',1,'Capital de Colombia'),
(2,'Medellín',1,'Ciudad de la eterna primavera'),
(3,'Ciudad de México',2,'Capital de México'),
(4,'Lima',4,'Capital de Perú'),
(5,'Miami',3,'Ciudad y hub en Florida, USA'),
(6,'Madrid',5,'Capital de España');

-- --------------------------------------------------------
-- TABLE GrAlt_Aeropuerto
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Aeropuerto` (
  `idAeropuerto` int(11) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `nombreAeropuerto` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Aeropuerto` VALUES
(1,1,'El Dorado','Av. El Dorado #103-09, Bogotá'),
(2,2,'José María Córdova','Rionegro, Antioquia'),
(3,3,'Benito Juárez (AICM)','CDMX'),
(4,4,'Jorge Chávez','Callao, Lima'),
(5,5,'Miami International Airport','2100 NW 42nd Ave, Miami'),
(6,6,'Adolfo Suárez Madrid-Barajas','Avenida de la Hispanidad, Madrid');

-- --------------------------------------------------------
-- TABLE GrAlt_EstadoPersona
-- --------------------------------------------------------
CREATE TABLE `GrAlt_EstadoPersona` (
  `idEstadoPersona` int(11) NOT NULL,
  `nombreEstado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_EstadoPersona` VALUES
(1,'Activo'),(2,'Inactivo'),(3,'Suspendido'),(4,'En Capacitación'),(5,'Retirado');

-- --------------------------------------------------------
-- TABLE GrAlt_Pasajero
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Pasajero` (
  `idPasajero` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `idEstadoPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Pasajero` VALUES
(1,'Laura','Pérez','laura.perez@mail.com','c4ca4238a0b923820dcc509a6f75849b','3201000001','pasajeros/laura.jpg',1),
(2,'Pedro','Hernández','pedro.hernandez@mail.com','c81e728d9d4c2f636f067f89cc14862c','3201000002','pasajeros/pedro.jpg',1),
(3,'Valentina','López','valentina.lopez@mail.com','eccbc87e4b5ce2fe28308fd9f2a7baf3','3201000003','pasajeros/valentina.jpg',1),
(4,'José','Sánchez','jose.sanchez@mail.com','a87ff679a2f3e71d9181a67b7542122c','3201000004','pasajeros/jose.jpg',1),
(5,'Camila','Ruiz','camila.ruiz@mail.com','e4da3b7fbbce2345d7772b0674a318d5','3201000005','pasajeros/camila.jpg',1);

-- --------------------------------------------------------
-- TABLE GrAlt_Piloto
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Piloto` (
  `idPiloto` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `idEstadoPersona` int(11) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Piloto` VALUES
(1,'Andrés','García','andres.garcia@altairair.com','c4ca4238a0b923820dcc509a6f75849b',1,'3101000001','pilotos/andres.jpg','1980-04-10',45),
(2,'Julio','Jaramillo','jj@ce.com','c81e728d9d4c2f636f067f89cc14862c',1,'3101000002','na','1999-09-09',48),
(3,'María','Santos','maria.santos@altairair.com','eccbc87e4b5ce2fe28308fd9f2a7baf3',1,'3101000003','pilotos/maria.jpg','1984-11-05',40),
(4,'Ricardo','Vargas','ricardo.vargas@altairair.com','a87ff679a2f3e71d9181a67b7542122c',2,'3101000004','pilotos/ricardo.jpg','1988-07-30',36),
(5,'Julio','Fernández','julio.fernandez@altairair.com','e4da3b7fbbce2345d7772b0674a318d5',1,'3101000005','pilotos/julio.jpg','1975-01-18',49),
(6,'fieldguitar','mirsa','fg@ce.com','827ccb0eea8a706c4c34a16891f84e7b',1,'3216548907',NULL,'2003-12-11',20);

-- --------------------------------------------------------
-- TABLE GrAlt_TipoAvion
-- --------------------------------------------------------
CREATE TABLE `GrAlt_TipoAvion` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_TipoAvion` VALUES
(1,'Airbus A320'),(2,'Airbus A330'),(3,'Boeing 737'),(4,'Boeing 787'),(5,'Embraer E190');

-- --------------------------------------------------------
-- TABLE GrAlt_Avion
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Avion` (
  `idAvion` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `cantCombustible` int(11) NOT NULL,
  `capacidadPasajeros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Avion` VALUES
(1,1,12000,180),
(2,2,24000,260),
(3,3,11000,170),
(4,4,32000,300),
(5,5,8000,100);

-- --------------------------------------------------------
-- TABLE GrAlt_EstadoVuelo
-- --------------------------------------------------------
CREATE TABLE `GrAlt_EstadoVuelo` (
  `idEstado` int(11) NOT NULL,
  `nombreEstado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_EstadoVuelo` VALUES
(1,'Programado'),(2,'En Vuelo'),(3,'Aterrizado'),(4,'Cancelado'),(5,'Retrasado');

-- --------------------------------------------------------
-- TABLE GrAlt_ClaseBoleto
-- --------------------------------------------------------
CREATE TABLE `GrAlt_ClaseBoleto` (
  `idClase` int(11) NOT NULL,
  `nombreClase` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_ClaseBoleto` VALUES
(1,'Económica'),
(2,'Económica Premium'),
(3,'Business'),
(4,'Primera Clase');

-- --------------------------------------------------------
-- TABLE GrAlt_Vuelo
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Vuelo` (
  `idVuelo` int(11) NOT NULL,
  `idAvion` int(11) NOT NULL,
  `idPiloto` int(11) NOT NULL,
  `idCopiloto` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `idOrigen` int(11) NOT NULL,
  `idDestino` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cantidadPasajeros` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Vuelo` VALUES
(1,1,1,2,1,1,5,'2025-06-10','08:00:00',0),
(2,2,3,4,1,3,1,'2025-06-11','10:30:00',0),
(3,3,2,5,2,5,4,'2025-06-12','14:45:00',0),
(4,4,4,1,3,2,6,'2025-06-13','19:00:00',0),
(5,5,5,3,1,4,3,'2025-06-15','06:15:00',0);

-- --------------------------------------------------------
-- TABLE GrAlt_Boleto
-- --------------------------------------------------------
CREATE TABLE `GrAlt_Boleto` (
  `idBoleto` int(11) NOT NULL,
  `idVuelo` int(11) NOT NULL,
  `idPasajero` int(11) NOT NULL,
  `idClase` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `asiento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `GrAlt_Boleto` VALUES
(1,1,1,1,450.00,'12A'),
(2,1,2,2,600.00,'12B'),
(3,2,3,1,320.00,'14C'),
(4,3,4,3,750.00,'3A'),
(5,4,5,4,1500.00,'1A');

-- --------------------------------------------------------
-- INDEXES + FOREIGN KEYS
-- (Actualizados para coincidir con los nuevos nombres)
-- --------------------------------------------------------

ALTER TABLE `GrAlt_Admin`
  ADD PRIMARY KEY (`idAdmin`);

ALTER TABLE `GrAlt_Pais`
  ADD PRIMARY KEY (`idPais`);

ALTER TABLE `GrAlt_Ciudad`
  ADD PRIMARY KEY (`idCiudad`),
  ADD KEY `idPais` (`idPais`);

ALTER TABLE `GrAlt_Aeropuerto`
  ADD PRIMARY KEY (`idAeropuerto`),
  ADD KEY `idCiudad` (`idCiudad`);

ALTER TABLE `GrAlt_EstadoPersona`
  ADD PRIMARY KEY (`idEstadoPersona`);

ALTER TABLE `GrAlt_Pasajero`
  ADD PRIMARY KEY (`idPasajero`),
  ADD KEY `idEstadoPersona` (`idEstadoPersona`);

ALTER TABLE `GrAlt_Piloto`
  ADD PRIMARY KEY (`idPiloto`),
  ADD KEY `idEstadoPersona` (`idEstadoPersona`);

ALTER TABLE `GrAlt_TipoAvion`
  ADD PRIMARY KEY (`idTipo`);

ALTER TABLE `GrAlt_Avion`
  ADD PRIMARY KEY (`idAvion`),
  ADD KEY `idTipo` (`idTipo`);

ALTER TABLE `GrAlt_EstadoVuelo`
  ADD PRIMARY KEY (`idEstado`);

ALTER TABLE `GrAlt_ClaseBoleto`
  ADD PRIMARY KEY (`idClase`);

ALTER TABLE `GrAlt_Vuelo`
  ADD PRIMARY KEY (`idVuelo`),
  ADD KEY `idAvion` (`idAvion`),
  ADD KEY `idPiloto` (`idPiloto`),
  ADD KEY `idCopiloto` (`idCopiloto`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idOrigen` (`idOrigen`),
  ADD KEY `idDestino` (`idDestino`);

ALTER TABLE `GrAlt_Boleto`
  ADD PRIMARY KEY (`idBoleto`),
  ADD KEY `idVuelo` (`idVuelo`),
  ADD KEY `idPasajero` (`idPasajero`),
  ADD KEY `idClase` (`idClase`);

-- FOREIGN KEYS

ALTER TABLE `GrAlt_Ciudad`
  ADD CONSTRAINT `FK_Ciudad_Pais`
    FOREIGN KEY (`idPais`) REFERENCES `GrAlt_Pais` (`idPais`) ON DELETE CASCADE;

ALTER TABLE `GrAlt_Aeropuerto`
  ADD CONSTRAINT `FK_Aeropuerto_Ciudad`
    FOREIGN KEY (`idCiudad`) REFERENCES `GrAlt_Ciudad` (`idCiudad`) ON DELETE CASCADE;

ALTER TABLE `GrAlt_Pasajero`
  ADD CONSTRAINT `FK_Pasajero_EstadoPersona`
    FOREIGN KEY (`idEstadoPersona`) REFERENCES `GrAlt_EstadoPersona` (`idEstadoPersona`);

ALTER TABLE `GrAlt_Piloto`
  ADD CONSTRAINT `FK_Piloto_EstadoPersona`
    FOREIGN KEY (`idEstadoPersona`) REFERENCES `GrAlt_EstadoPersona` (`idEstadoPersona`);

ALTER TABLE `GrAlt_Avion`
  ADD CONSTRAINT `FK_Avion_TipoAvion`
    FOREIGN KEY (`idTipo`) REFERENCES `GrAlt_TipoAvion` (`idTipo`) ON DELETE CASCADE;

ALTER TABLE `GrAlt_Vuelo`
  ADD CONSTRAINT `FK_Vuelo_Avion`
    FOREIGN KEY (`idAvion`) REFERENCES `GrAlt_Avion` (`idAvion`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Vuelo_Piloto`
    FOREIGN KEY (`idPiloto`) REFERENCES `GrAlt_Piloto` (`idPiloto`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Vuelo_Copiloto`
    FOREIGN KEY (`idCopiloto`) REFERENCES `GrAlt_Piloto` (`idPiloto`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Vuelo_EstadoVuelo`
    FOREIGN KEY (`idEstado`) REFERENCES `GrAlt_EstadoVuelo` (`idEstado`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Vuelo_Origen`
    FOREIGN KEY (`idOrigen`) REFERENCES `GrAlt_Aeropuerto` (`idAeropuerto`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Vuelo_Destino`
    FOREIGN KEY (`idDestino`) REFERENCES `GrAlt_Aeropuerto` (`idAeropuerto`) ON DELETE CASCADE;

ALTER TABLE `GrAlt_Boleto`
  ADD CONSTRAINT `FK_Boleto_Vuelo`
    FOREIGN KEY (`idVuelo`) REFERENCES `GrAlt_Vuelo` (`idVuelo`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Boleto_Pasajero`
    FOREIGN KEY (`idPasajero`) REFERENCES `GrAlt_Pasajero` (`idPasajero`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Boleto_Clase`
    FOREIGN KEY (`idClase`) REFERENCES `GrAlt_ClaseBoleto` (`idClase`) ON DELETE CASCADE;

COMMIT;

ALTER TABLE GrAlt_Admin
ADD UNIQUE (correo);

ALTER TABLE GrAlt_Pasajero
ADD UNIQUE (correo);

ALTER TABLE GrAlt_Piloto
ADD UNIQUE (correo);

