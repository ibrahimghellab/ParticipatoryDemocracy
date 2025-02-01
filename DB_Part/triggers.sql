--Lorsqu'une proposition est supprimé, notifie automatiquement tous les membres du groupe associé.

DELIMITER //

CREATE TRIGGER notification_suppression
AFTER DELETE ON Proposition
FOR EACH ROW
BEGIN
    DECLARE v_message VARCHAR(255);

    SET v_message = CONCAT('La proposition "', OLD.titre, '" a été supprimée.');

    INSERT INTO Notification (message, typeNotification, dateNotification)
    VALUES (v_message, 'Suppression', NOW());

    DECLARE v_notificationId INT;
    SET v_notificationId = LAST_INSERT_ID();

    INSERT INTO InternauteNotification (idInternaute, idNotification)
    SELECT DISTINCT Membre.idInternaute, v_notificationId
    FROM Membre
    WHERE Membre.idGroupe = (SELECT idGroupe FROM Proposition WHERE idProposition = OLD.idProposition);

END;
//



