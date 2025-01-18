
CREATE OR REPLACE VIEW VueMembresGroupes AS
SELECT M.idMembre, I.nom, I.prenom, G.nomGroupe, R.nomRole, M.dateAdhesion
FROM Membre M
INNER JOIN Internaute I ON M.idInternaute = I.idInternaute
INNER JOIN Groupe G ON M.idGroupe = G.idGroupe
INNER JOIN Role R ON M.idRole = R.idRole;



CREATE OR REPLACE VIEW VuePropositions AS
SELECT P.idProposition, P.titre, P.description, P.theme, P.status, P.dateCreation, V.typeScrutin, V.dateDebut, V.dateFin
FROM Proposition P
LEFT JOIN Vote V ON P.idVote = V.idVote;



CREATE OR REPLACE VIEW VueCommentairesSignales AS
SELECT C.idCommentaire, C.texte, C.dateCommentaire, C.status,C.idMembre as commentateur ,M.idMembre as signaleur, I.nom, I.prenom 
FROM Membre M
INNER JOIN Signaler S ON S.idMembre = M.idMembre
INNER JOIN Commentaire C ON S.idCommentaire = C.idCommentaire
INNER JOIN Internaute I ON M.idInternaute = I.idInternaute;



CREATE OR REPLACE VIEW VueVotesChoix AS
SELECT V.idVote, V.typeScrutin, V.dateDebut, V.dateFin, MV.idMembre, I.nom AS NomVotant, I.prenom AS PrenomVotant, MV.choix
FROM Vote V
INNER JOIN MembreVote MV ON V.idVote = MV.idVote
INNER JOIN Membre M ON MV.idMembre = M.idMembre
INNER JOIN Internaute I ON M.idInternaute = I.idInternaute;



CREATE OR REPLACE VIEW VueNotificationsReçues AS
SELECT INN.idInternaute, I.nom, I.prenom, N.message, N.typeNotification, N.dateNotification
FROM InternauteNotification INN
INNER JOIN Notification N ON INN.idNotification = N.idNotification
INNER JOIN Internaute I ON INN.idInternaute = I.idInternaute;


