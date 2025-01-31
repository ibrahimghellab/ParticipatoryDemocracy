-- Insertion dans la table Internaute
INSERT INTO Internaute (nom, prenom, adresse, email, dateCreation, hash, salt) VALUES
('Dubois', 'Jean', '12 rue de Paris', 'jean.dubois@email.com', '2024-01-01', 'hash1', 'salt1'),
('Martin', 'Sophie', '15 avenue Victor Hugo', 'sophie.martin@email.com', '2024-01-02', 'hash2', 'salt2'),
('Bernard', 'Pierre', '8 rue du Commerce', 'pierre.bernard@email.com', '2024-01-03', 'hash3', 'salt3'),
('Thomas', 'Marie', '25 boulevard Voltaire', 'marie.thomas@email.com', '2024-01-04', 'hash4', 'salt4'),
('Robert', 'Julie', '3 place de la République', 'julie.robert@email.com', '2024-01-05', 'hash5', 'salt5'),
('Petit', 'Lucas', '45 rue des Fleurs', 'lucas.petit@email.com', '2024-01-06', 'hash6', 'salt6'),
('Richard', 'Emma', '17 avenue Foch', 'emma.richard@email.com', '2024-01-07', 'hash7', 'salt7'),
('Durand', 'Louis', '9 rue Molière', 'louis.durand@email.com', '2024-01-08', 'hash8', 'salt8'),
('Moreau', 'Léa', '33 boulevard Saint-Michel', 'lea.moreau@email.com', '2024-01-09', 'hash9', 'salt9'),
('Simon', 'Nicolas', '22 rue de la Paix', 'nicolas.simon@email.com', '2024-01-10', 'hash10', 'salt10');

-- Insertion dans la table Groupe
INSERT INTO Groupe (nomGroupe, imageGroupe, couleurGroupe, dateCreation, description) VALUES
('Écologie Urbaine', 'eco.png', '#00FF00', '2024-01-01', 'Groupe pour l''environnement'),
('Sports et Loisirs', 'sport.png', '#FF0000', '2024-01-02', 'Activités sportives'),
('Culture', 'culture.png', '#0000FF', '2024-01-03', 'Événements culturels'),
('Éducation', 'education.png', '#FFFF00', '2024-01-04', 'Projets éducatifs'),
('Mobilité', 'mobilite.png', '#FF00FF', '2024-01-05', 'Transport et déplacements'),
('Solidarité', 'solidarite.png', '#00FFFF', '2024-01-06', 'Entraide locale'),
('Innovation', 'innovation.png', '#800080', '2024-01-07', 'Projets innovants'),
('Santé', 'sante.png', '#008000', '2024-01-08', 'Bien-être et santé'),
('Jeunesse', 'jeunesse.png', '#800000', '2024-01-09', 'Actions pour les jeunes'),
('Seniors', 'seniors.png', '#008080', '2024-01-10', 'Activités seniors');

-- Insertion dans la table Vote
INSERT INTO Vote (typeScrutin, dateDebut, status, dateFin) VALUES
('Majoritaire', '2024-02-01', 'En cours', '2024-02-15'),
('Proportionnel', '2024-02-02', 'Terminé', '2024-02-16'),
('Préférentiel', '2024-02-03', 'En attente', '2024-02-17'),
('Majoritaire', '2024-02-04', 'En cours', '2024-02-18'),
('Proportionnel', '2024-02-05', 'Terminé', '2024-02-19'),
('Préférentiel', '2024-02-06', 'En attente', '2024-02-20'),
('Majoritaire', '2024-02-07', 'En cours', '2024-02-21'),
('Proportionnel', '2024-02-08', 'Terminé', '2024-02-22'),
('Préférentiel', '2024-02-09', 'En attente', '2024-02-23'),
('Majoritaire', '2024-02-10', 'En cours', '2024-02-24');

-- Insertion dans la table Notification
INSERT INTO Notification (message, typeNotification, dateNotification) VALUES
('Nouveau vote créé', 'Vote', '2024-01-01'),
('Commentaire ajouté', 'Commentaire', '2024-01-02'),
('Proposition validée', 'Proposition', '2024-01-03'),
('Nouveau membre', 'Membre', '2024-01-04'),
('Vote terminé', 'Vote', '2024-01-05'),
('Réaction reçue', 'Réaction', '2024-01-06'),
('Groupe créé', 'Groupe', '2024-01-07'),
('Budget mis à jour', 'Budget', '2024-01-08'),
('Signalement reçu', 'Signalement', '2024-01-09'),
('Thème ajouté', 'Thème', '2024-01-10');

-- Insertion dans la table Theme
INSERT INTO Theme (nomTheme, budgetTheme, limiteBudgetTheme) VALUES
('Environnement', 50000.00, 100000.00),
('Sport', 30000.00, 60000.00),
('Culture', 40000.00, 80000.00),
('Éducation', 45000.00, 90000.00),
('Transport', 60000.00, 120000.00),
('Social', 35000.00, 70000.00),
('Technologie', 55000.00, 110000.00),
('Santé', 65000.00, 130000.00),
('Jeunesse', 25000.00, 50000.00),
('Senior', 20000.00, 40000.00);

-- Insertion dans la table Role
INSERT INTO Role (nomRole) VALUES
('Administrateur'),
('Modérateur'),
('Membre actif'),
('Membre standard'),
('Visiteur'),
('Expert'),
('Contributeur'),
('Observateur'),
('Évaluateur'),
('Animateur');

-- Insertion dans la table Reaction
INSERT INTO Reaction (emoticone) VALUES
('👍'),
('❤️'),
('😊'),
('🎉'),
('👏'),
('🌟'),
('💡'),
('💪'),
('🤝'),
('👌');

-- Insertion dans la table Membre
INSERT INTO Membre (dateAdhesion, status, idInternaute, idRole, idGroupe) VALUES
('2024-01-01', 'Actif', 1, 1, 1),
('2024-01-02', 'Actif', 2, 2, 2),
('2024-01-03', 'Inactif', 3, 3, 3),
('2024-01-04', 'Actif', 4, 4, 4),
('2024-01-05', 'Actif', 5, 5, 5),
('2024-01-06', 'Inactif', 6, 6, 6),
('2024-01-07', 'Actif', 7, 7, 7),
('2024-01-08', 'Actif', 8, 8, 8),
('2024-01-09', 'Inactif', 9, 9, 9),
('2024-01-10', 'Actif', 10, 10, 10);

-- Insertion dans la table Proposition
INSERT INTO Proposition (titre, description, dateCreation, theme, status, voteDemande, budgetGlobal, idTheme, idVote, idMembre) VALUES
('Parc écologique', 'Création d''un parc', '2024-01-01', 'Environnement', 'En cours', true, 25000.00, 1, 1, 1),
('Terrain multisport', 'Installation sportive', '2024-01-02', 'Sport', 'Validé', true, 15000.00, 2, 2, 2),
('Festival culturel', 'Événement annuel', '2024-01-03', 'Culture', 'En attente', true, 20000.00, 3, 3, 3),
('Bibliothèque mobile', 'Service de proximité', '2024-01-04', 'Education', 'En cours', true, 10000.00, 4, 4, 4),
('Pistes cyclables', 'Mobilité douce', '2024-01-05', 'Transport', 'Validé', true, 30000.00, 5, 5, 5),
('Épicerie solidaire', 'Aide alimentaire', '2024-01-06', 'Social', 'En attente', true, 18000.00, 6, 6, 6),
('Fab Lab', 'Espace innovation', '2024-01-07', 'Technologie', 'En cours', true, 35000.00, 7, 7, 7),
('Centre bien-être', 'Espace santé', '2024-01-08', 'Santé', 'Validé', true, 40000.00, 8, 8, 8),
('Skatepark', 'Loisirs jeunesse', '2024-01-09', 'Jeunesse', 'En attente', true, 22000.00, 9, 9, 9),
('Jardin partagé', 'Activité seniors', '2024-01-10', 'Senior', 'En cours', true, 12000.00, 10, 10, 10);

-- Insertion dans la table Commentaire
INSERT INTO Commentaire (texte, dateCommentaire, status, idProposition, idMembre) VALUES
('Excellent projet !', '2024-01-01', 'Validé', 1, 1),
('À améliorer', '2024-01-02', 'Validé', 2, 2),
('Très intéressant', '2024-01-03', 'En attente', 3, 3),
('Je soutiens', '2024-01-04', 'Validé', 4, 4),
('À étudier', '2024-01-05', 'En attente', 5, 5),
('Belle initiative', '2024-01-06', 'Validé', 6, 6),
('Innovant', '2024-01-07', 'Validé', 7, 7),
('À développer', '2024-01-08', 'En attente', 8, 8),
('Super idée', '2024-01-09', 'Validé', 9, 9),
('Je participe', '2024-01-10', 'Validé', 10, 10);

-- Insertion dans la table CommentaireReaction
INSERT INTO CommentaireReaction (idCommentaire, idReaction) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Insertion dans la table PropositionReaction
INSERT INTO PropositionReaction (idProposition, idReaction) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Insertion dans la table MembreReaction
INSERT INTO MembreReaction (idMembre, idReaction) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Insertion dans la table MembreVote
INSERT INTO MembreVote (idMembre, idVote, choix) VALUES
(1, 1, 'Pour'),
(2, 2, 'Contre'),
(3, 3, 'Abstention'),
(4, 4, 'Pour'),
(5, 5, 'Pour'),
(6, 6, 'Contre'),
(7, 7, 'Pour'),
(8, 8, 'Abstention'),
(9, 9, 'Pour'),
(10, 10, 'Contre');

-- Insertion dans la table InternauteNotification
INSERT INTO InternauteNotification (idInternaute, idNotification) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Insertion dans la table Signaler
INSERT INTO Signaler (idMembre, idCommentaire) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 1);

-- Insertion dans la table ThemeGroupe
INSERT INTO ThemeGroupe (idGroupe, idTheme) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);