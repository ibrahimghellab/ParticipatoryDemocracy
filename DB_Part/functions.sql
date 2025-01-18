--Retourne le nombre de signalements pour un membre donné.

DELIMITER //

CREATE OR REPLACE FUNCTION compter_signalements_membre(
    p_idMembre INT
) RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE v_signalements INT;

    SELECT COUNT(*)
    INTO v_signalements
    FROM Signaler S
    INNER JOIN Commentaire C ON S.idCommentaire = C.idCommentaire
    WHERE C.idMembre = p_idMembre;

    RETURN v_signalements;
END;
//

DELIMITER ;



--Retourne le nombre de signalements pour un commentaire donné.

DELIMITER //

CREATE OR REPLACE FUNCTION compter_signalements_commentaire(
    p_idCommentaire INT
) RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE v_signalements INT;

    SELECT COUNT(*)
    INTO v_signalements
    FROM Signaler
    WHERE idCommentaire = p_idCommentaire;

    RETURN v_signalements;
END;
//

DELIMITER ;



--Crée un groupe 

DELIMITER //

CREATE OR REPLACE PROCEDURE creer_groupe(
    IN p_nomGroupe VARCHAR(50),
    IN p_imageGroupe VARCHAR(255),
    IN p_couleurGroupe VARCHAR(50),
    IN p_description VARCHAR(255)
)
BEGIN
    DECLARE v_idGroupe INT;

    INSERT INTO Groupe (nomGroupe, imageGroupe, couleurGroupe, dateCreation, description)
    VALUES (p_nomGroupe, p_imageGroupe, p_couleurGroupe, NOW(), p_description);
    
    SET v_idGroupe = LAST_INSERT_ID();
    
    SELECT v_idGroupe;
END;
//

DELIMITER ;