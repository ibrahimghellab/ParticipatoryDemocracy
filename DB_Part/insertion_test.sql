SELECT nom, prenom 
FROM Internaute 
WHERE dateCreation < '2023-02-15';

SELECT nomGroupe, couleurGroupe 
FROM Groupe;

SELECT I.nom, I.prenom, R.nomRole, G.nomGroupe 
FROM Internaute I
INNER JOIN Membre M ON I.idInternaute = M.idInternaute
INNER JOIN Role R ON M.idRole = R.idRole
INNER JOIN Groupe G ON M.idGroupe = G.idGroupe;

SELECT P.titre, P.theme, I.nom, I.prenom, V.typeScrutin, V.status 
FROM Proposition P
INNER JOIN Membre M ON P.idMembre = M.idMembre
INNER JOIN Internaute I ON M.idInternaute = I.idInternaute
INNER JOIN Vote V ON P.idVote = V.idVote;

SELECT C.texte, P.titre, I.nom, I.prenom 
FROM Commentaire C
INNER JOIN Proposition P ON C.idProposition = P.idProposition
INNER JOIN MembreCommentaire MC ON C.idCommentaire = MC.idCommentaire
INNER JOIN Membre M ON MC.idMembre = M.idMembre
INNER JOIN Internaute I ON M.idInternaute = I.idInternaute;

SELECT B.themeDuBudget, SUM(B.budgetGlobal) AS totalBudget 
FROM Budget B
GROUP BY B.themeDuBudget;

SELECT P.titre, R.emoticone, COUNT(PR.idReaction) AS nbReactions 
FROM Proposition P
INNER JOIN PropositionReaction PR ON P.idProposition = PR.idProposition
INNER JOIN Reaction R ON PR.idReaction = R.idReaction
GROUP BY P.titre, R.emoticone;

SELECT I.nom, I.prenom, V.typeScrutin, V.status, MV.choix 
FROM Internaute I
INNER JOIN Membre M ON I.idInternaute = M.idInternaute
INNER JOIN MembreVote MV ON M.idMembre = MV.idMembre
INNER JOIN Vote V ON MV.idVote = V.idVote;

SELECT I.nom, I.prenom, N.message, N.typeNotification, N.status 
FROM Internaute I
INNER JOIN InternauteNotification INN ON I.idInternaute = INN.idInternaute
INNER JOIN Notification N ON INN.idNotification = N.idNotification;

SELECT I.nom, I.prenom, C.texte, C.status 
FROM Internaute I
INNER JOIN Membre M ON I.idInternaute = M.idInternaute
INNER JOIN Signaler S ON M.idMembre = S.idMembre
INNER JOIN Commentaire C ON S.idCommentaire = C.idCommentaire;