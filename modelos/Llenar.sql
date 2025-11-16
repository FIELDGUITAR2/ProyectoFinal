USE AltairAir;

-- ============================
-- ADMIN (claves en MD5)
-- ============================
INSERT INTO Admin(nombre, correo, clave, telefono) VALUES
('Carlos Méndez', 'admin@altairair.com', MD5('admin123'), '3001234567'),
('Laura Torres', 'soporte@altairair.com', MD5('soporte2024'), '3209876543');

-- ============================
-- PILOTOS
-- ============================
INSERT INTO Piloto(nombres, apellidos, telefono, foto, fecha_nac, edad) VALUES
('Juan', 'González', '3101112233', 'juan.jpg', '1980-05-14', 44),
('Martín', 'Silva', '3129998877', 'martin.jpg', '1975-03-22', 49),
('Sandra', 'Pérez', '3154567890', 'sandra.jpg', '1988-10-09', 36),
('Andrés', 'López', '3167891234', 'andres.jpg', '1990-01-30', 34);

-- ============================
-- PASAJEROS (claves MD5)
-- ============================
INSERT INTO Pasajero(nombres, apellidos, correo, clave, foto) VALUES
('Luis', 'Ramírez', 'lramirez@gmail.com', MD5('pass123'), 'luis.jpg'),
('Ana', 'Martínez', 'anam@hotmail.com', MD5('ana456'), 'ana.jpg'),
('Pedro', 'Cordero', 'pcordero@yahoo.com', MD5('pedro789'), 'pedro.jpg'),
('Lucía', 'Gómez', 'lgomez@gmail.com', MD5('lucia000'), 'lucia.jpg');

-- ============================
-- ESTADO DE VUELO
-- ============================
INSERT INTO EstadoVuelo(nombreEstado) VALUES
('Programado'),
('En Vuelo'),
('Retrasado'),
('Cancelado'),
('Aterrizado');

-- ============================
-- CLASES DE BOLETO
-- ============================
INSERT INTO ClaseBoleto(nombreClase) VALUES
('Económica'),
('Ejecutiva'),
('Primera Clase');

-- ============================
-- TIPOS DE AVIÓN
-- ============================
INSERT INTO TipoAvion(nombreTipo) VALUES
('Airbus A320'),
('Boeing 737'),
('Embraer E190'),
('ATR 72');

-- ============================
-- AVIONES
-- ============================
INSERT INTO Avion(idTipo, cantCombustible, capacidadPasajeros) VALUES
(1, 28000, 180),
(2, 26000, 160),
(3, 15000, 120),
(4, 9000, 74);

-- ============================
-- PAÍSES
-- ============================
INSERT INTO Pais(nombrePais) VALUES
('Colombia'),
('Estados Unidos'),
('México');

-- ============================
-- CIUDADES
-- ============================
INSERT INTO Ciudad(nombreCiudad, idPais) VALUES
('Bogotá', 1),
('Medellín', 1),
('Miami', 2),
('Ciudad de México', 3);

-- ============================
-- AEROPUERTOS
-- ============================
INSERT INTO Aeropuerto(idCiudad, nombreAeropuerto, direccion) VALUES
(1, 'El Dorado Internacional', 'Av. El Dorado #103-09'),
(2, 'José María Córdova', 'Rionegro - Antioquia'),
(3, 'Miami International Airport', '2100 NW 42nd Ave'),
(4, 'Aeropuerto Internacional Benito Juárez', 'Av. Capitán Carlos León');

-- ============================
-- VUELOS
-- ============================
INSERT INTO Vuelo(
    idAvion, idPiloto, idCopiloto, idEstado, idOrigen, idDestino,
    fecha, hora, cantidadPasajeros
) VALUES
(1, 1, 2, 1, 1, 2, '2025-02-10', '08:30:00', 150),
(2, 3, 4, 1, 2, 3, '2025-02-12', '12:45:00', 120),
(3, 2, 1, 3, 3, 1, '2025-02-15', '09:15:00', 110),
(4, 4, 3, 1, 1, 4, '2025-02-20', '18:00:00', 60);

-- ============================
-- BOLETOS
-- ============================
INSERT INTO Boleto(idVuelo, idPasajero, idClase, precio, asiento) VALUES
(1, 1, 1, 350.00, '12A'),
(1, 2, 2, 650.00, '2B'),
(2, 3, 1, 420.00, '15C'),
(2, 4, 3, 980.00, '1A'),
(3, 2, 1, 390.00, '14D'),
(4, 1, 2, 720.00, '3C');
