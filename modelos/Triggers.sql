USE AltairAir;

DELIMITER $$

/* ============================================================
   1. IMPEDIR QUE UN VUELO TENGA PILOTO = COPILOTO
   ============================================================ */
DROP TRIGGER IF EXISTS trg_validar_pilotos $$
CREATE TRIGGER trg_validar_pilotos
BEFORE INSERT ON GrAlt_Vuelo
FOR EACH ROW
BEGIN
    IF NEW.idPiloto = NEW.idCopiloto THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El piloto y copiloto no pueden ser la misma persona.';
    END IF;
END $$

DROP TRIGGER IF EXISTS trg_validar_pilotos_upd $$
CREATE TRIGGER trg_validar_pilotos_upd
BEFORE UPDATE ON GrAlt_Vuelo
FOR EACH ROW
BEGIN
    IF NEW.idPiloto = NEW.idCopiloto THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El piloto y copiloto no pueden ser la misma persona.';
    END IF;
END $$


/* ============================================================
   2. IMPEDIR QUE ORIGEN = DESTINO
   ============================================================ */
DROP TRIGGER IF EXISTS trg_validar_origen_destino $$
CREATE TRIGGER trg_validar_origen_destino
BEFORE INSERT ON GrAlt_Vuelo
FOR EACH ROW
BEGIN
    IF NEW.idOrigen = NEW.idDestino THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El origen y destino del vuelo no pueden ser iguales.';
    END IF;
END $$

DROP TRIGGER IF EXISTS trg_validar_origen_destino_upd $$
CREATE TRIGGER trg_validar_origen_destino_upd
BEFORE UPDATE ON GrAlt_Vuelo
FOR EACH ROW
BEGIN
    IF NEW.idOrigen = NEW.idDestino THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El origen y destino del vuelo no pueden ser iguales.';
    END IF;
END $$


/* ============================================================
   3. VALIDACIÓN: NO PERMITIR ASIENTOS DUPLICADOS EN UN MISMO VUELO
   ============================================================ */
DROP TRIGGER IF EXISTS trg_validar_asiento $$
CREATE TRIGGER trg_validar_asiento
BEFORE INSERT ON GrAlt_Boleto
FOR EACH ROW
BEGIN
    IF EXISTS(
        SELECT 1 FROM GrAlt_Boleto 
        WHERE idVuelo = NEW.idVuelo AND asiento = NEW.asiento
    ) THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ese asiento ya está ocupado en este vuelo.';
    END IF;
END $$


/* ============================================================
   4. VALIDACIÓN: NO SOBREPASAR CAPACIDAD DEL AVIÓN
   ============================================================ */
DROP TRIGGER IF EXISTS trg_validar_capacidad $$
CREATE TRIGGER trg_validar_capacidad
BEFORE INSERT ON GrAlt_Boleto
FOR EACH ROW
BEGIN
    DECLARE capacidad INT;
    DECLARE ocupados INT;

    SELECT capacidadPasajeros INTO capacidad
    FROM GrAlt_Avion a
    JOIN GrAlt_Vuelo v ON v.idAvion = a.idAvion
    WHERE v.idVuelo = NEW.idVuelo;

    SELECT COUNT(*) INTO ocupados 
    FROM GrAlt_Boleto 
    WHERE idVuelo = NEW.idVuelo;

    IF ocupados >= capacidad THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'La capacidad máxima del avión ya fue alcanzada.';
    END IF;
END $$


/* ============================================================
   5. ACTUALIZAR CANTIDAD DE PASAJEROS CUANDO SE INSERTA BOLETO
   ============================================================ */
DROP TRIGGER IF EXISTS trg_sumar_pasajero $$
CREATE TRIGGER trg_sumar_pasajero
AFTER INSERT ON GrAlt_Boleto
FOR EACH ROW
BEGIN
    UPDATE GrAlt_Vuelo
    SET cantidadPasajeros = cantidadPasajeros + 1
    WHERE idVuelo = NEW.idVuelo;
END $$


/* ============================================================
   6. ACTUALIZAR CANTIDAD DE PASAJEROS CUANDO SE ELIMINA BOLETO
   ============================================================ */
DROP TRIGGER IF EXISTS trg_restar_pasajero $$
CREATE TRIGGER trg_restar_pasajero
AFTER DELETE ON GrAlt_Boleto
FOR EACH ROW
BEGIN
    UPDATE GrAlt_Vuelo
    SET cantidadPasajeros = cantidadPasajeros - 1
    WHERE idVuelo = OLD.idVuelo;
END $$

DELIMITER ;
