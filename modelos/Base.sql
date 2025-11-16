CREATE DATABASE AltairAir;
USE AltairAir;

-- ============================
-- ADMIN
-- ============================
CREATE TABLE Admin(
    idAdmin INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    PRIMARY KEY(idAdmin)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- PILOTOS
-- ============================
CREATE TABLE Piloto(
    idPiloto INT AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    foto VARCHAR(200),
    fecha_nac DATE NOT NULL,
    edad INT,
    PRIMARY KEY(idPiloto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- PASAJEROS
-- ============================
CREATE TABLE Pasajero(
    idPasajero INT AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    foto VARCHAR(200),
    PRIMARY KEY(idPasajero)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- ESTADO DE VUELO
-- ============================
CREATE TABLE EstadoVuelo(
    idEstado INT AUTO_INCREMENT,
    nombreEstado VARCHAR(100) NOT NULL,
    PRIMARY KEY(idEstado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- CLASES DE BOLETO
-- ============================
CREATE TABLE ClaseBoleto(
    idClase INT AUTO_INCREMENT,
    nombreClase VARCHAR(100) NOT NULL,
    PRIMARY KEY(idClase)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- TIPO DE AVIÓN
-- ============================
CREATE TABLE TipoAvion(
    idTipo INT AUTO_INCREMENT,
    nombreTipo VARCHAR(100) NOT NULL,
    PRIMARY KEY(idTipo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- AVIÓN
-- ============================
CREATE TABLE Avion(
    idAvion INT AUTO_INCREMENT,
    idTipo INT NOT NULL,
    cantCombustible INT NOT NULL,
    capacidadPasajeros INT NOT NULL,
    PRIMARY KEY(idAvion),
    FOREIGN KEY(idTipo) REFERENCES TipoAvion(idTipo) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- PAÍS
-- ============================
CREATE TABLE Pais(
    idPais INT AUTO_INCREMENT,
    nombrePais VARCHAR(100) NOT NULL,
    PRIMARY KEY(idPais)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- CIUDAD
-- ============================
CREATE TABLE Ciudad(
    idCiudad INT AUTO_INCREMENT,
    nombreCiudad VARCHAR(100) NOT NULL,
    idPais INT NOT NULL,
    PRIMARY KEY(idCiudad),
    FOREIGN KEY(idPais) REFERENCES Pais(idPais) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- AEROPUERTO
-- ============================
CREATE TABLE Aeropuerto(
    idAeropuerto INT AUTO_INCREMENT,
    idCiudad INT NOT NULL,
    nombreAeropuerto VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    PRIMARY KEY(idAeropuerto),
    FOREIGN KEY(idCiudad) REFERENCES Ciudad(idCiudad) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- VUELO
-- ============================
CREATE TABLE Vuelo(
    idVuelo INT AUTO_INCREMENT,
    idAvion INT NOT NULL,
    idPiloto INT NOT NULL,
    idCopiloto INT NOT NULL,
    idEstado INT NOT NULL,
    idOrigen INT NOT NULL,
    idDestino INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    cantidadPasajeros INT NOT NULL,
    PRIMARY KEY(idVuelo),
    FOREIGN KEY(idAvion) REFERENCES Avion(idAvion) ON DELETE CASCADE,
    FOREIGN KEY(idPiloto) REFERENCES Piloto(idPiloto) ON DELETE CASCADE,
    FOREIGN KEY(idCopiloto) REFERENCES Piloto(idPiloto) ON DELETE CASCADE,
    FOREIGN KEY(idEstado) REFERENCES EstadoVuelo(idEstado) ON DELETE CASCADE,
    FOREIGN KEY(idOrigen) REFERENCES Aeropuerto(idAeropuerto) ON DELETE CASCADE,
    FOREIGN KEY(idDestino) REFERENCES Aeropuerto(idAeropuerto) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================
-- BOLETO
-- ============================
CREATE TABLE Boleto(
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
