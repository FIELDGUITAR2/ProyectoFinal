USE AltairAir;

-- ============================
-- ADMIN
-- ============================
INSERT INTO Admin (nombre, correo, clave, telefono) VALUES
('Carlos Mendoza', 'carlos@altairair.com', MD5('admin123'), '3000000001'),
('Laura Ramírez', 'laura@altairair.com', MD5('admin123'), '3000000002');

-- ============================
-- PILOTOS
-- ============================
INSERT INTO Piloto (nombres, correo, clave, apellidos, telefono, foto, fecha_nac, edad) VALUES
('Juan', 'juan.piloto@altairair.com', MD5('piloto123'), 'Martínez', '3001111111', 'juan.jpg', '1985-04-12', 40),
('Pedro', 'pedro.piloto@altairair.com', MD5('piloto123'), 'Gómez', '3002222222', 'pedro.jpg', '1980-09-20', 45),
('Sofia', 'sofia.piloto@altairair.com', MD5('piloto123'), 'López', '3003333333', 'sofia.jpg', '1990-01-08', 35);

-- ============================
-- PASAJEROS
-- ============================
INSERT INTO Pasajero (nombres, apellidos, correo, clave, foto) VALUES
('Luis', 'Pérez', 'luis.perez@mail.com', MD5('pass123'), 'luis.jpg'),
('Andrea', 'García', 'andrea.garcia@mail.com', MD5('pass123'), 'andrea.jpg'),
('Miguel', 'Torres', 'miguel.torres@mail.com', MD5('pass123'), 'miguel.jpg');

-- ============================
-- ESTADO DE VUELO
-- ============================
INSERT INTO EstadoVuelo (nombreEstado) VALUES
('Programado'),
('En vuelo'),
('Aterrizado'),
('Cancelado'),
('Retrasado');

-- ============================
-- CLASE DE BOLETO
-- ============================
INSERT INTO ClaseBoleto (nombreClase) VALUES
('Económica'),
('Premium'),
('Ejecutiva'),
('Primera Clase');

-- ============================
-- TIPO DE AVIÓN
-- ============================
INSERT INTO TipoAvion (nombreTipo) VALUES
('Airbus A320'),
('Boeing 737'),
('Embraer E190');

-- ============================
-- AVIÓN
-- ============================
INSERT INTO Avion (idTipo, cantCombustible, capacidadPasajeros) VALUES
(1, 18000, 180),
(2, 20000, 190),
(3, 15000, 110);

-- ============================
-- PAÍS
-- ============================
INSERT INTO Pais (nombrePais) VALUES
('Colombia'),
('México'),
('Estados Unidos');

-- ============================
-- CIUDAD
-- ============================
INSERT INTO Ciudad (nombreCiudad, idPais) VALUES
('Bogotá', 1),
('Medellín', 1),
('Ciudad de México', 2),
('Cancún', 2),
('Miami', 3),
('New York', 3);

-- ============================
-- AEROPUERTO
-- ============================
INSERT INTO Aeropuerto (idCiudad, nombreAeropuerto, direccion) VALUES
(1, 'El Dorado', 'Av. El Dorado 103-09'),
(2, 'José María Córdova', 'Rionegro - 056'),
(3, 'AICM', 'Av. Capitán Carlos León'),
(4, 'Aeropuerto Intl. Cancún', 'Carretera Aeropuerto KM 22'),
(5, 'Aeropuerto Intl. Miami', '2100 NW 42nd Ave'),
(6, 'JFK International', 'Queens, NY 11430');

-- ============================
-- VUELO
-- ============================
INSERT INTO Vuelo (idAvion, idPiloto, idCopiloto, idEstado, idOrigen, idDestino, fecha, hora, cantidadPasajeros) VALUES
(1, 1, 2, 1, 1, 5, '2025-01-20', '08:30:00', 150),
(2, 2, 3, 1, 3, 1, '2025-01-22', '14:00:00', 170),
(3, 3, 1, 1, 6, 2, '2025-01-25', '09:15:00', 100);

-- ============================
-- BOLETO
-- ============================
INSERT INTO Boleto (idVuelo, idPasajero, idClase, precio, asiento) VALUES
(1, 1, 1, 350.00, '12A'),
(1, 2, 2, 550.00, '4C'),
(2, 3, 1, 300.00, '18F'),
(3, 1, 3, 900.00, '2A');
