--Liste les membres, leurs rôles, et les groupes auxquels ils appartiennent.

CREATE VIEW VueMembresGroupes AS
SELECT M.idMembre, I.nom AS NomInternaute, I.prenom AS PrenomInternaute, G.nomGroupe AS Groupe, R.nomRole AS Role, M.dateAdhesion
FROM Membre M
INNER JOIN Internaute I ON M.idInternaute = I.idInternaute
INNER JOIN Groupe G ON M.idGroupe = G.idGroupe
INNER JOIN Role R ON M.idRole = R.idRole;



