--Retourne le nombre de signalements pour un membre donné.

CREATE OR REPLACE FUNCTION compter_signalements_membre(
    p_idMembre INT
) RETURN INT IS
    v_signalements INT;
BEGIN
    SELECT COUNT(*) INTO v_signalements
    FROM Signaler
    WHERE idMembre = p_idMembre;

    RETURN v_signalements;
END;
/


--Retourne le nombre de signalements pour un commentaire donné.

CREATE OR REPLACE FUNCTION compter_signalements_commentaire(
    p_idCommentaire INT
) RETURN INT IS
    v_signalements INT;
BEGIN
    SELECT COUNT(*) INTO v_signalements
    FROM Signaler
    WHERE idCommentaire = p_idCommentaire;

    RETURN v_signalements;
END;
/


--Crée un groupe 

CREATE OR REPLACE PROCEDURE creer_groupe(p_nomGroupe VARCHAR, p_imageGroupe VARCHAR, p_couleurGroupe VARCHAR, p_description VARCHAR) AS
    v_idGroupe INT;
BEGIN
    INSERT INTO Groupe (nomGroupe, imageGroupe, couleurGroupe, dateCreation, description)
    VALUES (p_nomGroupe, p_imageGroupe, p_couleurGroupe, SYSDATE(), p_description);
END;
/