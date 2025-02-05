-- 1. Nombre de membres par groupe
SELECT g.nomGroupe, COUNT(m.idMembre) as nombreMembres
FROM Groupe g
LEFT JOIN Membre m ON g.idGroupe = m.idGroupe
GROUP BY g.nomGroupe
ORDER BY nombreMembres DESC;

-- 2. Liste des propositions avec leur nombre de votes "Pour"
SELECT p.titre, COUNT(mv.choix) as votes_pour
FROM Proposition p
LEFT JOIN Vote v ON p.idVote = v.idVote
LEFT JOIN MembreVote mv ON v.idVote = mv.idVote AND mv.choix = 'Pour'
GROUP BY p.titre
ORDER BY votes_pour DESC;

-- 3. Top 5 des thèmes avec le plus grand budget total de propositions
SELECT t.nomTheme, SUM(p.budgetGlobal) as budget_total
FROM Theme t
LEFT JOIN Proposition p ON t.idTheme = p.idTheme
GROUP BY t.nomTheme
ORDER BY budget_total DESC
LIMIT 5;

-- 4. Membres les plus actifs (basé sur les commentaires)
SELECT i.nom, i.prenom, COUNT(c.idCommentaire) as nombre_commentaires
FROM Internaute i
JOIN Membre m ON i.idInternaute = m.idInternaute
LEFT JOIN Commentaire c ON m.idMembre = c.idMembre
GROUP BY i.nom, i.prenom
ORDER BY nombre_commentaires DESC;

-- 5. Propositions les plus réagies
SELECT p.titre, COUNT(pr.idReaction) as nombre_reactions
FROM Proposition p
LEFT JOIN PropositionReaction pr ON p.idProposition = pr.idProposition
GROUP BY p.titre
ORDER BY nombre_reactions DESC;

-- 6. Liste des groupes et leurs thèmes associés
SELECT g.nomGroupe, GROUP_CONCAT(t.nomTheme) as themes
FROM Groupe g
LEFT JOIN ThemeGroupe tg ON g.idGroupe = tg.idGroupe
LEFT JOIN Theme t ON tg.idTheme = t.idTheme
GROUP BY g.nomGroupe;

-- 7. Statistiques des votes par type de scrutin
SELECT v.typeScrutin, 
       COUNT(mv.idMembre) as nombre_votants,
       COUNT(CASE WHEN mv.choix = 'Pour' THEN 1 END) as votes_pour,
       COUNT(CASE WHEN mv.choix = 'Contre' THEN 1 END) as votes_contre,
       COUNT(CASE WHEN mv.choix = 'Abstention' THEN 1 END) as abstentions
FROM Vote v
LEFT JOIN MembreVote mv ON v.idVote = mv.idVote
GROUP BY v.typeScrutin;

-- 8. Recherche des commentaires signalés avec leurs auteurs
SELECT i.nom, i.prenom, c.texte, COUNT(s.idMembre) as nombre_signalements
FROM Commentaire c
JOIN Membre m ON c.idMembre = m.idMembre
JOIN Internaute i ON m.idInternaute = i.idInternaute
LEFT JOIN Signaler s ON c.idCommentaire = s.idCommentaire
GROUP BY i.nom, i.prenom, c.texte
HAVING nombre_signalements > 0
ORDER BY nombre_signalements DESC;

-- 9. Analyse des propositions par statut et budget
SELECT 
    status,
    COUNT(*) as nombre_propositions,
    AVG(budgetGlobal) as budget_moyen,
    MIN(budgetGlobal) as budget_min,
    MAX(budgetGlobal) as budget_max
FROM Proposition
GROUP BY status;

-- 10. Utilisateurs n'ayant jamais voté
SELECT i.nom, i.prenom
FROM Internaute i
JOIN Membre m ON i.idInternaute = m.idInternaute
LEFT JOIN MembreVote mv ON m.idMembre = mv.idMembre
WHERE mv.idMembre IS NULL
ORDER BY i.idInternaute ASC
LIMIT 0, 25;

-- 11. Historique des activités d'un membre spécifique
SELECT 
    i.nom,
    i.prenom,
    COUNT(DISTINCT c.idCommentaire) as nombre_commentaires,
    COUNT(DISTINCT mv.idVote) as nombre_votes,
    COUNT(DISTINCT p.idProposition) as nombre_propositions
FROM Internaute i
JOIN Membre m ON i.idInternaute = m.idInternaute
LEFT JOIN Commentaire c ON m.idMembre = c.idMembre
LEFT JOIN MembreVote mv ON m.idMembre = mv.idMembre
LEFT JOIN Proposition p ON m.idMembre = p.idMembre
WHERE i.idInternaute = 1
GROUP BY i.nom, i.prenom;

-- 12. Analyse des notifications par type
SELECT 
    typeNotification,
    COUNT(*) as nombre_notifications,
    MIN(dateNotification) as premiere_notification,
    MAX(dateNotification) as derniere_notification
FROM Notification
GROUP BY typeNotification;