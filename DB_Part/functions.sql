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


DELIMITER //

CREATE OR REPLACE PROCEDURE createGroupe(id INT ,nom VARCHAR(50),img VARCHAR(50),clr VARCHAR(50),descr VARCHAR(50)) 
BEGIN
DECLARE crt_date DATE;
DECLARE idGrp INT;
SET crt_date=CURRENT_DATE;
INSERT INTO Groupe (nomGroupe,imageGroupe,couleurGroupe,dateCreation,description) VALUES (nom, img, clr,  crt_date ,descr) ;
SET idGrp = LAST_INSERT_ID();
INSERT INTO Membre(dateAdhesion, status, idInternaute, idRole, idGroupe) VALUES (crt_date,'Présent',id,1,idGrp) ;
END;
//
DELIMITER ;


DELIMITER //
CREATE OR REPLACE PROCEDURE createInternaute(p_nom VARCHAR(50),p_prenom VARCHAR(50),p_adresse VARCHAR(50),p_email VARCHAR(50),p_hash VARCHAR(100),p_salt VARCHAR(50))
BEGIN
INSERT INTO Internaute(nom, prenom, adresse, email, dateCreation, hash, salt) VALUES(p_nom,p_prenom,p_adresse,p_email,CURRENT_DATE,p_hash,p_salt);
END;
//
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE createVote(p_idProposition INT,p_typeScrutin VARCHAR(50),p_dateFin DATE)
BEGIN
INSERT INTO Vote(typeScrutin, dateDebut, status, dateFin) VALUES(p_typeScrutin,CURRENT_DATE(),'En cours',p_dateFin);

UPDATE Proposition SET idVote=LAST_INSERT_ID() WHERE idProposition=p_idProposition;
END;
//
DELIMITER ;