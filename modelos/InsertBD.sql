/* ============================
   DATOS ADICIONALES ADMIN
   ============================ */
INSERT INTO GrAlt_Admin (nombre, correo, clave, telefono)
VALUES
('Daniel Osorio', 'daniel.osorio@altairair.com', 'e10adc3949ba59abbe56e057f20f883e', '3005000001'),
('Karen López', 'karen.lopez@altairair.com', '25d55ad283aa400af464c76d713c07ad', '3005000002');


/* ============================
   NUEVOS PAISES
   ============================ */
INSERT INTO GrAlt_Pais (nombrePais)
VALUES
('Argentina'),
('Brasil'),
('Canadá');


/* ============================
   NUEVAS CIUDADES
   ============================ */
INSERT INTO GrAlt_Ciudad (nombreCiudad, idPais, descripcion)
VALUES
('Buenos Aires', 6, 'Capital de Argentina'),
('Sao Paulo', 7, 'Centro financiero de Brasil'),
('Toronto', 8, 'Ciudad principal de Canadá');


/* ============================
   NUEVOS AEROPUERTOS
   ============================ */
INSERT INTO GrAlt_Aeropuerto (idCiudad, nombreAeropuerto, direccion)
VALUES
(7, 'Ezeiza Ministro Pistarini', 'Buenos Aires'),
(8, 'Guarulhos', 'Sao Paulo'),
(9, 'Toronto Pearson', 'Toronto');


/* ============================
   NUEVOS TIPOS DE AVIÓN
   ============================ */
INSERT INTO GrAlt_TipoAvion (nombreTipo)
VALUES
('Airbus A350'),
('Boeing 777');


/* ============================
   NUEVOS AVIONES
   ============================ */
INSERT INTO GrAlt_Avion (idTipo, cantCombustible, capacidadPasajeros, nombreAvion)
VALUES
(6, 28000, 320, 'A350 Neo 1'),
(7, 33000, 350, 'B777 Max');


/* ============================
   NUEVOS PILOTOS
   ============================ */
INSERT INTO GrAlt_Piloto
(nombres, apellidos, correo, clave, idEstadoPersona, telefono, foto, fecha_nac, edad)
VALUES
('Andrés Felipe', 'Montoya', 'andres.m@altairair.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '3156000001', 'pilotos/andres.jpg', '1985-04-21', 40),
('Luis Alberto', 'Ramírez', 'l.ramirez@altairair.com', '25d55ad283aa400af464c76d713c07ad', 1, '3156000002', 'pilotos/luis.jpg', '1979-10-11', 46),
('Carolina', 'Jiménez', 'carolina.j@altairair.com', '202cb962ac59075b964b07152d234b70', 1, '3156000003', 'pilotos/carolina.jpg', '1990-06-09', 35);


/* ============================
   NUEVOS PASAJEROS
   ============================ */
INSERT INTO GrAlt_Pasajero
(nombres, apellidos, correo, clave, telefono, foto, idEstadoPersona)
VALUES
('Esteban', 'Rodríguez', 'esteban.rod@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '3201000100', 'pasajeros/esteban.jpg', 1),
('Juliana', 'Moreno', 'juliana.mo@mail.com', '25d55ad283aa400af464c76d713c07ad', '3201000101', 'pasajeros/juliana.jpg', 1),
('Santiago', 'Velásquez', 's.velasquez@mail.com', '202cb962ac59075b964b07152d234b70', '3201000102', 'pasajeros/santiago.jpg', 1),
('Daniela', 'Ortiz', 'dani.ortiz@mail.com', '098f6bcd4621d373cade4e832627b4f6', '3201000103', 'pasajeros/daniela.jpg', 1);


/* ============================
   NUEVOS VUELOS
   ============================ */
INSERT INTO GrAlt_Vuelo
(idAvion, idPiloto, idCopiloto, idEstado, idOrigen, idDestino, fecha, hora, cantidadPasajeros)
VALUES
(6, 1, 2, 1, 1, 7, '2025-07-01', '09:30:00', 0),  -- Bogotá → Buenos Aires
(7, 3, 4, 1, 5, 8, '2025-07-03', '12:15:00', 0),  -- Miami → Sao Paulo
(6, 6, 5, 1, 9, 6, '2025-07-05', '16:00:00', 0),  -- Toronto → Madrid
(7, 10, 3, 1, 2, 1, '2025-07-08', '06:45:00', 0), -- Medellín → Bogotá
(7, 5, 4, 1, 4, 3, '2025-07-09', '18:20:00', 0);  -- Lima → CDMX


/* ============================  
       NUEVOS BOLETOS  
   ============================ */

/* Lima → CDMX */
INSERT INTO GrAlt_Boleto (idVuelo, idPasajero, idClase, precio, asiento)
VALUES
    (6, 6, 1, 500.00, '15A'),
    (6, 7, 2, 650.00, '15B'),
    (7, 8, 1, 900.00, '21C'),
    (8, 9, 3, 2000.00, '2A'),
    (9, 10, 4, 3500.00, '1A');

