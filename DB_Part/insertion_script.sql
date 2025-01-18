INSERT INTO Internaute (idInternaute, nom, prenom, adresse, email, motDePass, dateCreation) VALUES
('Martin', 'Jean', '10 rue des Lilas', 'jean.martin@mail.com', 'password123', '2023-01-10'),
('Dupont', 'Marie', '25 avenue Victor Hugo', 'marie.dupont@mail.com', 'marie1234', '2023-02-15'),
('Durand', 'Paul', '5 place de la République', 'paul.durand@mail.com', 'pauld123', '2023-03-12'),
('Moreau', 'Sophie', '12 boulevard Saint-Michel', 'sophie.moreau@mail.com', 'sophie2023', '2023-04-20'),
('Lemoine', 'Alice', '3 allée des Acacias', 'alice.lemoine@mail.com', 'alicepass', '2023-05-18'),
('Bernard', 'Luc', '18 rue Pasteur', 'luc.bernard@mail.com', 'lucpass', '2023-06-22'),
('Rousseau', 'Clara', '30 chemin des Roses', 'clara.rousseau@mail.com', 'clarapwd', '2023-07-15'),
('Petit', 'Thomas', '8 impasse des Cerisiers', 'thomas.petit@mail.com', 'thomaspwd', '2023-08-05'),
('Blanc', 'Julie', '20 rue des Champs', 'julie.blanc@mail.com', 'juliepass', '2023-09-01'),
('Fournier', 'Hugo', '15 avenue de la Gare', 'hugo.fournier@mail.com', 'hugopwd', '2023-09-28'),
('Gauthier', 'Emma', '45 rue des Peupliers', 'emma.gauthier@mail.com', 'emmapass', '2023-10-10'),
('Lopez', 'Lucas', '50 rue des Fleurs', 'lucas.lopez@mail.com', 'lucas2023', '2023-11-11'),
('Garcia', 'Lena', '22 rue du Moulin', 'lena.garcia@mail.com', 'lenapwd', '2023-12-01'),
('Martinez', 'Nina', '9 rue de la Mairie', 'nina.martinez@mail.com', 'ninapass', '2023-12-15'),
('Hernandez', 'Oscar', '60 avenue des Pyrénées', 'oscar.hernandez@mail.com', 'oscarpwd', '2024-01-10'),
('Perrin', 'Mia', '33 rue des Jardins', 'mia.perrin@mail.com', 'miapass', '2024-01-25'),
('Dumont', 'Eliot', '12 rue des Écoles', 'eliot.dumont@mail.com', 'eliotpwd', '2024-02-12'),
('Renaud', 'Zoe', '6 chemin des Pins', 'zoe.renaud@mail.com', 'zoepass', '2024-02-28'),
('Fabre', 'Victor', '28 avenue des Platanes', 'victor.fabre@mail.com', 'victorpwd', '2024-03-15'),
('Leroux', 'Lea', '14 boulevard Haussmann', 'lea.leroux@mail.com', 'leapass', '2024-03-30');

-----

INSERT INTO Groupe (idGroupe, nomGroupe, imageGroupe, couleurGroupe, dateCreation, description) VALUES
('Les Innovateurs', 'innovateurs.png', 'Bleu', '2023-01-01', 'Groupe d idées innovantes'),
('Les Créateurs', 'createurs.png', 'Rouge', '2023-02-10', 'Développer des projets artistiques'),
('Team Sports', 'sports.png', 'Vert', '2023-03-05', 'Passionnés de sport'),
('Les Explorateurs', 'explorateurs.png', 'Jaune', '2023-04-12', 'Découverte de nouveaux horizons'),
('Amis des Animaux', 'animaux.png', 'Orange', '2023-05-20', 'Protéger les animaux'),
('Tech Lovers', 'tech.png', 'Gris', '2023-06-15', 'Amateurs de technologie'),
('Nature et Aventure', 'nature.png', 'Vert clair', '2023-07-01', 'Randonnées et aventures'),
('Cuisine Passion', 'cuisine.png', 'Rose', '2023-08-25', 'Partage de recettes et astuces'),
('Lecture et Écriture', 'lecture.png', 'Violet', '2023-09-10', 'Écrivains et lecteurs'),
('Les Mélomanes', 'musique.png', 'Cyan', '2023-10-05', 'Amoureux de la musique'),
('Fitness Club', 'fitness.png', 'Rouge clair', '2023-11-01', 'Activité physique et bien-être'),
('Gamers United', 'jeux.png', 'Bleu foncé', '2023-11-25', 'Jeux vidéo et compétitions'),
('Les Écolos', 'ecolo.png', 'Vert foncé', '2023-12-15', 'Écologie et durabilité'),
('Photographie', 'photo.png', 'Gris clair', '2024-01-05', 'Art de la photo'),
('Cinéphiles', 'cinema.png', 'Noir', '2024-01-20', 'Discussions sur le cinéma'),
('Les Artistes', 'art.png', 'Rose clair', '2024-02-01', 'Créations artistiques diverses'),
('Voyageurs', 'voyage.png', 'Beige', '2024-02-20', 'Partages de voyages'),
('Entrepreneurs', 'business.png', 'Doré', '2024-03-10', 'Idées et projets d entreprises'),
('Gastronomie', 'gastronomie.png', 'Vert olive', '2024-03-22', 'Art culinaire'),
('Solidarité', 'solidarite.png', 'Marron', '2024-04-01', 'Aider les autres');

----

INSERT INTO Vote (idVote, typeScrutin, dateDebut, status, dateFin) VALUES
('Majoritaire', '2023-01-01', 'Clôturé', '2023-01-10'),
('Proportionnel', '2023-02-05', 'Clôturé', '2023-02-15'),
('Uninominal', '2023-03-01', 'Clôturé', '2023-03-10'),
('Plurinominal', '2023-04-10', 'Clôturé', '2023-04-20'),
('Majoritaire', '2023-05-15', 'En cours', '2023-05-25'),
('Proportionnel', '2023-06-05', 'Clôturé', '2023-06-15'),
('Uninominal', '2023-07-01', 'Clôturé', '2023-07-10'),
('Plurinominal', '2023-08-15', 'Clôturé', '2023-08-25'),
('Majoritaire', '2023-09-10', 'En cours', '2023-09-20'),
('Proportionnel', '2023-10-01', 'Clôturé', '2023-10-10'),
('Uninominal', '2023-11-05', 'En cours', '2023-11-15'),
('Plurinominal', '2023-12-01', 'Clôturé', '2023-12-10'),
('Majoritaire', '2024-01-01', 'En cours', '2024-01-10'),
('Proportionnel', '2024-01-15', 'Clôturé', '2024-01-25'),
('Uninominal', '2024-02-10', 'En cours', '2024-02-20'),
('Plurinominal', '2024-02-20', 'Clôturé', '2024-02-28'),
('Majoritaire', '2024-03-05', 'Clôturé', '2024-03-15'),
('Proportionnel', '2024-03-20', 'En cours', '2024-03-30'),
('Uninominal', '2024-04-01', 'Clôturé', '2024-04-10'),
('Plurinominal', '2024-04-15', 'En cours', '2024-04-25');

----

INSERT INTO Notification (idNotification, message, typeNotification, dateNotification) VALUES
('Votre vote est comptabilisé', 'Vote', '2023-01-10'),
('Nouveau message du groupe', 'Message', '2023-01-15'),
('Un nouveau membre a rejoint', 'Membre', '2023-02-05'),
('Proposition acceptée', 'Proposition', '2023-02-20'),
('Nouvelle notification', 'Général', '2023-03-01'),
('Rappel de réunion', 'Agenda', '2023-03-10'),
('Un commentaire a été ajouté', 'Commentaire', '2023-03-15'),
('Statut mis à jour', 'Statut', '2023-04-01'),
('Vote clôturé', 'Vote', '2023-04-15'),
('Nouvelle annonce', 'Annonce', '2023-05-01'),
('Un membre a quitté le groupe', 'Membre', '2023-05-15'),
('Nouveau fichier partagé', 'Fichier', '2023-06-01'),
('Changement de responsable', 'Responsable', '2023-06-15'),
('Statut de proposition changé', 'Proposition', '2023-07-01'),
('Réunion reportée', 'Agenda', '2023-07-15'),
('Proposition rejetée', 'Proposition', '2023-08-01'),
('Ajout au groupe validé', 'Groupe', '2023-08-15'),
('Un rôle vous a été attribué', 'Rôle', '2023-09-01'),
('Mise à jour des règles', 'Groupe', '2023-09-15'),
('Proposition en cours de vote', 'Proposition', '2023-10-01');

----

INSERT INTO Role (idRole, nomRole) VALUES
('Administrateur'),
('Modérateur'),
('Membre actif'),
('Invité'),
('Responsable de groupe'),
('Contributeur'),
('Observateur'),
('Coordinateur'),
('Consultant'),
('Support technique'),
('Rédacteur'),
('Analyste'),
('Participant'),
('Évaluateur'),
('Organisateur'),
('Président'),
('Vice-président'),
('Secrétaire'),
('Trésorier'),
('Archiviste');


---

INSERT INTO Reaction (idReaction, emoticone) VALUES
('👍'),
('❤️'),
('😂'),
('😮'),
('😢'),
('👏'),
('😡'),
('🔥'),
('🎉'),
('💡'),
('🙌'),
('😎'),
('😇'),
('🤔'),
('👌'),
('✅'),
('❌'),
('💪'),
('🌟'),
('🚀');

----

INSERT INTO Membre (idMembre, dateAdhesion, status, idInternaute, idRole, idGroupe) VALUES
('2025-01-01', 'Actif', 1, 1, 1),
('2025-01-02', 'Actif', 2, 2, 1),
('2025-01-03', 'Inactif', 3, 3, 2),
('2025-01-04', 'Actif', 4, 4, 2),
('2025-01-05', 'Suspendu', 5, 5, 3),
('2025-01-06', 'Actif', 6, 6, 3),
('2025-01-07', 'Inactif', 7, 7, 4),
('2025-01-08', 'Actif', 8, 8, 4),
('2025-01-09', 'Actif', 9, 9, 5),
('2025-01-10', 'Suspendu', 10, 10, 5),
('2025-01-11', 'Actif', 11, 11, 6),
('2025-01-12', 'Actif', 12, 12, 6),
('2025-01-13', 'Inactif', 13, 13, 7),
('2025-01-14', 'Actif', 14, 14, 7),
('2025-01-15', 'Actif', 15, 15, 8),
('2025-01-16', 'Suspendu', 16, 16, 8),
('2025-01-17', 'Actif', 17, 17, 9),
('2025-01-18', 'Inactif', 18, 18, 9),
('2025-01-19', 'Actif', 19, 19, 10),
('2025-01-20', 'Actif', 20, 20, 10);


----

INSERT INTO Proposition (idProposition, titre, description, dateCreation, theme, status, voteDemande, idVote, idMembre) VALUES
('Améliorer la plateforme', 'Proposer de nouvelles fonctionnalités', '2023-01-15', 'Technologie', 'En cours', TRUE, 1, 1),
('Créer un événement sportif', 'Organiser une compétition locale', '2023-02-10', 'Sport', 'Clôturé', FALSE, 2, 2),
('Planter des arbres', 'Reforestation de zones urbaines', '2023-03-01', 'Écologie', 'En cours', TRUE, 3, 3),
('Campagne de dons', 'Collecte pour une association', '2023-04-05', 'Solidarité', 'En cours', FALSE, 4, 4),
('Refonte du site web', 'Moderniser le design', '2023-05-20', 'Technologie', 'Clôturé', TRUE, 5, 5),
('Organiser une exposition', 'Mise en avant d artistes locaux', '2023-06-10', 'Art', 'En cours', TRUE, 6, 6),
('Réunir les membres', 'Préparer une rencontre annuelle', '2023-07-05', 'Social', 'Clôturé', FALSE, 7, 7),
('Créer une bibliothèque', 'Donner accès à des livres', '2023-08-15', 'Culture', 'En cours', TRUE, 8, 8),
('Réparer les équipements', 'Maintenance des locaux', '2023-09-01', 'Infrastructure', 'Clôturé', TRUE, 9, 9),
('Ajouter des ateliers', 'Proposer de nouveaux cours', '2023-10-10', 'Éducation', 'En cours', FALSE, 10, 10),
('Créer une charte', 'Établir un cadre pour le groupe', '2023-11-15', 'Règlement', 'Clôturé', TRUE, 11, 11),
('Développer une application', 'Faciliter l accès aux services', '2023-12-01', 'Technologie', 'En cours', FALSE, 12, 12),
('Organiser un concours', 'Événement pour les membres', '2024-01-05', 'Social', 'Clôturé', TRUE, 13, 13),
('Aménager les locaux', 'Ajouter du mobilier', '2024-01-20', 'Infrastructure', 'En cours', TRUE, 14, 14),
('Créer un podcast', 'Échanger des idées', '2024-02-10', 'Média', 'Clôturé', FALSE, 15, 15),
('Lancer un projet écologique', 'Réduction des déchets', '2024-02-25', 'Écologie', 'En cours', TRUE, 16, 16),
('Former les membres', 'Proposer des formations', '2024-03-01', 'Éducation', 'Clôturé', TRUE, 17, 17),
('Organiser une visite guidée', 'Découvrir des lieux historiques', '2024-03-15', 'Culture', 'En cours', FALSE, 18, 18),
('Mettre en place un système', 'Simplifier les inscriptions', '2024-04-01', 'Technologie', 'En cours', TRUE, 19, 19),
('Créer un partenariat', 'Collaborer avec d autres groupes', '2024-04-10', 'Social', 'Clôturé', FALSE, 20, 20);

-----

INSERT INTO Commentaire (idCommentaire, texte, dateCommentaire, status, idProposition,idMembre) VALUES
('Très bonne idée !', '2023-01-16', 'Approuvé', 1,1),
('Je suis d accord', '2023-01-17', 'Approuvé', 1,2),
('Cela semble compliqué', '2023-02-12', 'Rejeté', 2,2),
('Super initiative', '2023-02-15', 'Approuvé', 3,2),
('Manque de détails', '2023-03-05', 'Rejeté', 4,2),
('Excellente proposition', '2023-03-10', 'Approuvé', 5,2),
('Besoin de précisions', '2023-03-20', 'En attente', 6,5),
('Projet intéressant', '2023-04-05', 'Approuvé', 7,6),
('Je suis pour', '2023-04-10', 'Approuvé', 8,7),
('Pas convaincu', '2023-05-01', 'Rejeté', 9,7),
('Bonne démarche', '2023-05-15', 'Approuvé', 10,9),
('Trop ambitieux', '2023-06-01', 'Rejeté', 11,3),
('Je soutiens', '2023-06-20', 'Approuvé', 12,10),
('Peut être amélioré', '2023-07-01', 'En attente', 13,12),
('Bien pensé', '2023-07-15', 'Approuvé', 14,13),
('Difficile à réaliser', '2023-08-01', 'Rejeté', 15,14),
('Excellent projet', '2023-08-20', 'Approuvé', 16,15),
('Trop vague', '2023-09-01', 'Rejeté', 17,16),
('À approfondir', '2023-09-15', 'En attente', 18,17),
('Je suis enthousiaste', '2023-10-01', 'Approuvé', 19,20);


-----

INSERT INTO Budget (budgetGlobal, budgetTheme, themeDuBudget, limiteBudgetTheme, idProposition) VALUES
(50000.00, 15000.00, 'Technologie', 20000.00, 1),
(30000.00, 10000.00, 'Sport', 15000.00, 2),
(70000.00, 30000.00, 'Écologie', 40000.00, 3),
(20000.00, 5000.00, 'Solidarité', 10000.00, 4),
(80000.00, 25000.00, 'Technologie', 30000.00, 5),
(40000.00, 15000.00, 'Art', 20000.00, 6),
(25000.00, 10000.00, 'Social', 15000.00, 7),
(60000.00, 20000.00, 'Culture', 25000.00, 8),
(35000.00, 12000.00, 'Infrastructure', 15000.00, 9),
(50000.00, 20000.00, 'Éducation', 25000.00, 10),
(45000.00, 15000.00, 'Règlement', 20000.00, 11),
(90000.00, 35000.00, 'Technologie', 40000.00, 12),
(20000.00, 8000.00, 'Social', 10000.00, 13),
(70000.00, 25000.00, 'Infrastructure', 30000.00, 14),
(30000.00, 12000.00, 'Média', 15000.00, 15),
(80000.00, 30000.00, 'Écologie', 40000.00, 16),
(60000.00, 20000.00, 'Éducation', 25000.00, 17),
(40000.00, 15000.00, 'Culture', 20000.00, 18),
(55000.00, 20000.00, 'Technologie', 25000.00, 19),
(25000.00, 10000.00, 'Social', 15000.00, 20);




INSERT INTO CommentaireReaction (idCommentaire, idReaction) VALUES
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10),
(11, 11), (12, 12), (13, 13), (14, 14), (15, 15),
(16, 16), (17, 17), (18, 18), (19, 19), (20, 20);

----

INSERT INTO PropositionReaction (idProposition, idReaction) VALUES
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10),
(11, 11), (12, 12), (13, 13), (14, 14), (15, 15),
(16, 16), (17, 17), (18, 18), (19, 19), (20, 20);

-----

INSERT INTO MembreReaction (idMembre, idReaction) VALUES
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10),
(11, 11), (12, 12), (13, 13), (14, 14), (15, 15),
(16, 16), (17, 17), (18, 18), (19, 19), (20, 20);

-----

INSERT INTO MembreVote (idMembre, idVote, choix) VALUES
(1, 1, 'Oui'), (2, 2, 'Non'), (3, 3, 'Oui'), (4, 4, 'Non'), (5, 5, 'Oui'),
(6, 6, 'Oui'), (7, 7, 'Non'), (8, 8, 'Oui'), (9, 9, 'Non'), (10, 10, 'Oui'),
(11, 11, 'Oui'), (12, 12, 'Non'), (13, 13, 'Oui'), (14, 14, 'Non'), (15, 15, 'Oui'),
(16, 16, 'Non'), (17, 17, 'Oui'), (18, 18, 'Non'), (19, 19, 'Oui'), (20, 20, 'Non');


----

INSERT INTO InternauteNotification (idInternaute, idNotification) VALUES
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10),
(11, 11), (12, 12), (13, 13), (14, 14), (15, 15),
(16, 16), (17, 17), (18, 18), (19, 19), (20, 20);


----


INSERT INTO Signaler (idMembre, idCommentaire) VALUES
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10),
(11, 11), (12, 12), (13, 13), (14, 14), (15, 15),
(16, 16), (17, 17), (18, 18), (19, 19), (20, 20);

------------