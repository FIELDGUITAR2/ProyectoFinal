-- BASE DE DATOS: ALTARAIR (corregida) + INSERTS realistas (claves en MD5)
CREATE DATABASE IF NOT EXISTS AltairAir;
USE AltairAir;

-- ============================
-- TABLAS (corregidas)
-- ============================
CREATE TABLE IF NOT EXISTS Admin(
    idAdmin INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    PRIMARY KEY(idAdmin)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS EstadoPersona(
    idEstadoPersona INT AUTO_INCREMENT,
    nombreEstado VARCHAR(100) NOT NULL,
    PRIMARY KEY(idEstadoPersona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Piloto(
    idPiloto INT AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    idEstadoPersona INT NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    foto VARCHAR(255),
    fecha_nac DATE NOT NULL,
    edad INT,
    PRIMARY KEY(idPiloto),
    FOREIGN KEY(idEstadoPersona) REFERENCES EstadoPersona(idEstadoPersona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Pasajero(
    idPasajero INT AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    telefono VARCHAR(100),
    foto VARCHAR(255),
    idEstadoPersona INT NOT NULL,
    PRIMARY KEY(idPasajero),
    FOREIGN KEY(idEstadoPersona) REFERENCES EstadoPersona(idEstadoPersona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS EstadoVuelo(
    idEstado INT AUTO_INCREMENT,
    nombreEstado VARCHAR(100) NOT NULL,
    PRIMARY KEY(idEstado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS ClaseBoleto(
    idClase INT AUTO_INCREMENT,
    nombreClase VARCHAR(100) NOT NULL,
    PRIMARY KEY(idClase)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS TipoAvion(
    idTipo INT AUTO_INCREMENT,
    nombreTipo VARCHAR(100) NOT NULL,
    PRIMARY KEY(idTipo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Avion(
    idAvion INT AUTO_INCREMENT,
    idTipo INT NOT NULL,
    cantCombustible INT NOT NULL,
    capacidadPasajeros INT NOT NULL,
    PRIMARY KEY(idAvion),
    FOREIGN KEY(idTipo) REFERENCES TipoAvion(idTipo) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Pais(
    idPais INT AUTO_INCREMENT,
    nombrePais VARCHAR(100) NOT NULL,
    PRIMARY KEY(idPais)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Ciudad(
    idCiudad INT AUTO_INCREMENT,
    nombreCiudad VARCHAR(100) NOT NULL,
    idPais INT NOT NULL,
    descripcion VARCHAR(255),
    PRIMARY KEY(idCiudad),
    FOREIGN KEY(idPais) REFERENCES Pais(idPais) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Aeropuerto(
    idAeropuerto INT AUTO_INCREMENT,
    idCiudad INT NOT NULL,
    nombreAeropuerto VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    PRIMARY KEY(idAeropuerto),
    FOREIGN KEY(idCiudad) REFERENCES Ciudad(idCiudad) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Vuelo(
    idVuelo INT AUTO_INCREMENT,
    idAvion INT NOT NULL,
    idPiloto INT NOT NULL,
    idCopiloto INT NOT NULL,
    idEstado INT NOT NULL,
    idOrigen INT NOT NULL,
    idDestino INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    cantidadPasajeros INT NOT NULL DEFAULT 0,
    PRIMARY KEY(idVuelo),
    FOREIGN KEY(idAvion) REFERENCES Avion(idAvion) ON DELETE CASCADE,
    FOREIGN KEY(idPiloto) REFERENCES Piloto(idPiloto) ON DELETE CASCADE,
    FOREIGN KEY(idCopiloto) REFERENCES Piloto(idPiloto) ON DELETE CASCADE,
    FOREIGN KEY(idEstado) REFERENCES EstadoVuelo(idEstado) ON DELETE CASCADE,
    FOREIGN KEY(idOrigen) REFERENCES Aeropuerto(idAeropuerto) ON DELETE CASCADE,
    FOREIGN KEY(idDestino) REFERENCES Aeropuerto(idAeropuerto) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Boleto(
    idBoleto INT AUTO_INCREMENT,
    idVuelo INT NOT NULL,
    idPasajero INT NOT NULL,
    idClase INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    asiento VARCHAR(10) NOT NULL,
    PRIMARY KEY(idBoleto),
    FOREIGN KEY(idVuelo) REFERENCES Vuelo(idVuelo) ON DELETE CASCADE,
    FOREIGN KEY(idPasajero) REFERENCES Pasajero(idPasajero) ON DELETE CASCADE,
    FOREIGN KEY(idClase) REFERENCES ClaseBoleto(idClase) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- INSERTS realistas (claves en MD5)
-- ============================

-- 1) Admins (claves MD5)
INSERT INTO Admin (nombre, correo, clave, telefono) VALUES
('Carlos Mendoza', 'c.mendoza@altairair.com', MD5('1'), '3001000001'),
('Laura Ramírez', 'l.ramirez@altairair.com', MD5('2'), '3001000002'),
('Miguel Torres', 'm.torres@altairair.com', MD5('3'), '3001000003'),
('Ana Castillo', 'a.castillo@altairair.com', MD5('4'), '3001000004'),
('Sofia Ruiz', 's.ruiz@altairair.com', MD5('5'), '3001000005');

-- 2) Estados de persona
INSERT INTO EstadoPersona (nombreEstado) VALUES
('Activo'),
('Inactivo'),
('Suspendido'),
('En Capacitación'),
('Retirado');

-- 3) Pilotos (usando la imagen subida para el primer piloto)
-- nota: las claves son MD5('1')..MD5('5')
INSERT INTO Piloto (nombres, apellidos, correo, clave, idEstadoPersona, telefono, foto, fecha_nac, edad) VALUES
('Andrés', 'García', 'andres.garcia@altairair.com', MD5('1'), 1, '3101000001', '/mnt/data/A_logo_for_"Altair_Air"_is_displayed_against_a_lig.png', '1980-04-10', 45),
('Fernando', 'López', 'fernando.lopez@altairair.com', MD5('2'), 1, '3101000002', 'pilotos/fernando.jpg', '1976-09-22', 48),
('María', 'Santos', 'maria.santos@altairair.com', MD5('3'), 1, '3101000003', 'pilotos/maria.jpg', '1984-11-05', 40),
('Ricardo', 'Vargas', 'ricardo.vargas@altairair.com', MD5('4'), 2, '3101000004', 'pilotos/ricardo.jpg', '1988-07-30', 36),
('Julio', 'Fernández', 'julio.fernandez@altairair.com', MD5('5'), 1, '3101000005', 'pilotos/julio.jpg', '1975-01-18', 49);

-- 4) Pasajeros (claves MD5, con teléfono)
INSERT INTO Pasajero (nombres, apellidos, correo, clave, telefono, foto, idEstadoPersona) VALUES
('Laura', 'Pérez', 'laura.perez@mail.com', MD5('1'), '3201000001', 'pasajeros/laura.jpg', 1),
('Pedro', 'Hernández', 'pedro.hernandez@mail.com', MD5('2'), '3201000002', 'pasajeros/pedro.jpg', 1),
('Valentina', 'López', 'valentina.lopez@mail.com', MD5('3'), '3201000003', 'pasajeros/valentina.jpg', 1),
('José', 'Sánchez', 'jose.sanchez@mail.com', MD5('4'), '3201000004', 'pasajeros/jose.jpg', 1),
('Camila', 'Ruiz', 'camila.ruiz@mail.com', MD5('5'), '3201000005', 'pasajeros/camila.jpg', 1);

-- 5) Estados de vuelo
INSERT INTO EstadoVuelo (nombreEstado) VALUES
('Programado'),
('En Vuelo'),
('Aterrizado'),
('Cancelado'),
('Retrasado');

-- 6) Clases de boleto
INSERT INTO ClaseBoleto (nombreClase) VALUES
('Económica'),
('Económica Premium'),
('Business'),
('Primera Clase');

-- 7) Tipos de avión
INSERT INTO TipoAvion (nombreTipo) VALUES
('Airbus A320'),
('Airbus A330'),
('Boeing 737'),
('Boeing 787'),
('Embraer E190');

-- 8) Aviones
-- asegúrate que capacidades no sean superadas por los boletos que insertaré abajo
INSERT INTO Avion (idTipo, cantCombustible, capacidadPasajeros) VALUES
(1, 12000, 180),  -- A320
(2, 24000, 260),  -- A330
(3, 11000, 170),  -- B737
(4, 32000, 300),  -- B787
(5, 8000, 100);   -- E190

-- 9) Países
INSERT INTO Pais (nombrePais) VALUES
('Colombia'),
('México'),
('Estados Unidos'),
('Perú'),
('España');

-- 10) Ciudades
INSERT INTO Ciudad (nombreCiudad, idPais, descripcion) VALUES
('Bogotá', 1, 'Capital de Colombia'),
('Medellín', 1, 'Ciudad de la eterna primavera'),
('Ciudad de México', 2, 'Capital de México'),
('Lima', 4, 'Capital de Perú'),
('Miami', 3, 'Ciudad y hub en Florida, USA'),
('Madrid', 5, 'Capital de España');

-- 11) Aeropuertos
INSERT INTO Aeropuerto (idCiudad, nombreAeropuerto, direccion) VALUES
(1, 'El Dorado', 'Av. El Dorado #103-09, Bogotá'),
(2, 'José María Córdova', 'Rionegro, Antioquia'),
(3, 'Benito Juárez (AICM)', 'CDMX'),
(4, 'Jorge Chávez', 'Callao, Lima'),
(5, 'Miami International Airport', '2100 NW 42nd Ave, Miami'),
(6, 'Adolfo Suárez Madrid-Barajas', 'Avenida de la Hispanidad, Madrid');

-- 12) Vuelos (fechas en 2025, cantidadPasajeros inicial = 0)
-- Asegúrate que idPiloto ≠ idCopiloto al insertar
INSERT INTO Vuelo (idAvion, idPiloto, idCopiloto, idEstado, idOrigen, idDestino, fecha, hora, cantidadPasajeros) VALUES
(1, 1, 2, 1, 1, 5, '2025-06-10', '08:00:00', 0), -- Bogotá -> Miami (A320)
(2, 3, 4, 1, 3, 1, '2025-06-11', '10:30:00', 0), -- CDMX -> Bogotá (A330)
(3, 2, 5, 2, 5, 4, '2025-06-12', '14:45:00', 0), -- Miami -> Lima (B737)
(4, 4, 1, 3, 2, 6, '2025-06-13', '19:00:00', 0), -- Medellín -> Madrid (B787)
(5, 5, 3, 1, 4, 3, '2025-06-15', '06:15:00', 0); -- Lima -> CDMX (E190)

-- 13) Boletos (sin duplicar asientos; no superan capacidad)
INSERT INTO Boleto (idVuelo, idPasajero, idClase, precio, asiento) VALUES
-- Vuelo 1 (capacidad 180) - algunos pasajeros
(1, 1, 1, 450.00, '12A'),
(1, 2, 2, 600.00, '12B'),

-- Vuelo 2
(2, 3, 1, 320.00, '14C'),

-- Vuelo 3
(3, 4, 3, 750.00, '3A'),

-- Vuelo 4
(4, 5, 4, 1500.00, '1A');

-- Fin del script
