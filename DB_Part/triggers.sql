--Lorsqu'une proposition est supprimé, notifie automatiquement tous les membres du groupe associé.

CREATE OR REPLACE TRIGGER notification_suppression
AFTER DELETE ON Proposition
FOR EACH ROW
DECLARE
    v_message VARCHAR(50);
BEGIN
    -- Construction du message de notification
    v_message := 'La proposition "' || :OLD.titre || '" a été supprimée.';

    -- Insertion des notifications pour tous les membres du groupe
    INSERT INTO Notification (message, typeNotification, dateNotification)
    VALUES(v_message, 'Suppression', SYSDATE())
    INSERT INTO InternauteNotification 

END;
/


DELIMITER //
CREATE TRIGGER trg_before_insert_internaute
BEFORE INSERT ON Internaute
FOR EACH ROW

v_count NUMBER;
BEGIN
SELECT COUNT(*) INTO v_count
FROM internaute
WHERE email= :NEW.email;
IF v_count > 0 THEN
RAISE_APPLICATION_ERROR(-20001, 'Cette adresse email est déjà utilisée.');
--check if a email is valid with this regex :^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$



END IF;

END;//
DELIMITER ;//
DELIMITER ;
/
