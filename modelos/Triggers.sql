DELIMITER $$

CREATE TRIGGER trg_calcular_edad_piloto_before_insert
BEFORE INSERT ON Piloto
FOR EACH ROW
BEGIN
    SET NEW.edad = TIMESTAMPDIFF(YEAR, NEW.fecha_nac, CURDATE());
END $$

CREATE TRIGGER trg_calcular_edad_piloto_before_update
BEFORE UPDATE ON Piloto
FOR EACH ROW
BEGIN
    SET NEW.edad = TIMESTAMPDIFF(YEAR, NEW.fecha_nac, CURDATE());
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER trg_validar_pilotos_before_insert
BEFORE INSERT ON Vuelo
FOR EACH ROW
BEGIN
    IF NEW.idPiloto = NEW.idCopiloto THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El piloto y el copiloto no pueden ser la misma persona';
    END IF;
END $$

CREATE TRIGGER trg_validar_pilotos_before_update
BEFORE UPDATE ON Vuelo
FOR EACH ROW
BEGIN
    IF NEW.idPiloto = NEW.idCopiloto THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El piloto y el copiloto no pueden ser la misma persona';
    END IF;
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER trg_evitar_sobreventa_before_insert
BEFORE INSERT ON Boleto
FOR EACH ROW
BEGIN
    DECLARE capacidad INT;
    DECLARE vendidos INT;

    SELECT A.capacidadPasajeros INTO capacidad
    FROM Vuelo V INNER JOIN Avion A ON V.idAvion = A.idAvion
    WHERE V.idVuelo = NEW.idVuelo;

    SELECT COUNT(*) INTO vendidos
    FROM Boleto
    WHERE idVuelo = NEW.idVuelo;

    IF vendidos >= capacidad THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'No se pueden vender más boletos: capacidad del avión alcanzada';
    END IF;
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER trg_actualizar_pasajeros_after_insert
AFTER INSERT ON Boleto
FOR EACH ROW
BEGIN
    UPDATE Vuelo
    SET cantidadPasajeros = cantidadPasajeros + 1
    WHERE idVuelo = NEW.idVuelo;
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER trg_actualizar_pasajeros_after_delete
AFTER DELETE ON Boleto
FOR EACH ROW
BEGIN
    UPDATE Vuelo
    SET cantidadPasajeros = cantidadPasajeros - 1
    WHERE idVuelo = OLD.idVuelo;
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER trg_prevenir_asiento_duplicado_before_insert
BEFORE INSERT ON Boleto
FOR EACH ROW
BEGIN
    IF EXISTS(
        SELECT 1 FROM Boleto 
        WHERE idVuelo = NEW.idVuelo AND asiento = NEW.asiento
    ) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El asiento ya está ocupado en este vuelo';
    END IF;
END $$

DELIMITER ;

CREATE TABLE AuditoriaVuelos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idVuelo INT,
    accion VARCHAR(20),
    fecha DATETIME
);

DELIMITER $$

CREATE TRIGGER trg_auditar_vuelos_after_insert
AFTER INSERT ON Vuelo
FOR EACH ROW
BEGIN
    INSERT INTO AuditoriaVuelos(idVuelo, accion, fecha)
    VALUES (NEW.idVuelo, 'CREADO', NOW());
END $$

DELIMITER ;

