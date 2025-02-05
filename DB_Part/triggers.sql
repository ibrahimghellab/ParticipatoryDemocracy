DELIMITER //

CREATE TRIGGER notification_suppression
BEFORE DELETE ON Proposition
FOR EACH ROW
BEGIN
    DECLARE v_idGroupe INT;

    SELECT idGroupe INTO v_idGroupe 
    FROM Membre 
    WHERE idMembre = OLD.idMembre 
    LIMIT 1; 

    SET @deleted_idGroupe = v_idGroupe;
END;
//

DELIMITER ;

DELIMITER //

CREATE TRIGGER after_proposition_delete
AFTER DELETE ON Proposition
FOR EACH ROW
BEGIN
    DECLARE v_message VARCHAR(255);
    DECLARE v_notificationId INT;

    SET v_message = CONCAT('La proposition "', OLD.titre, '" a été supprimée.');

    INSERT INTO Notification (message, typeNotification, dateNotification)
    VALUES (v_message, 'Suppression', NOW());

    SET v_notificationId = LAST_INSERT_ID();

    INSERT INTO InternauteNotification (idInternaute, idNotification)
    SELECT DISTINCT Membre.idInternaute, v_notificationId
    FROM Membre
    WHERE Membre.idGroupe = @deleted_idGroupe;

END;
//

DELIMITER ;