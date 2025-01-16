INSERT INTO Internaute (idInternaute, nom, prenom, adresse, email, motDePass, dateCreation) VALUES
(1, 'Martin', 'Jean', '10 rue des Lilas', 'jean.martin@mail.com', 'password123', '2023-01-10'),
(2, 'Dupont', 'Marie', '25 avenue Victor Hugo', 'marie.dupont@mail.com', 'marie1234', '2023-02-15'),
(3, 'Durand', 'Paul', '5 place de la République', 'paul.durand@mail.com', 'pauld123', '2023-03-12'),
(4, 'Moreau', 'Sophie', '12 boulevard Saint-Michel', 'sophie.moreau@mail.com', 'sophie2023', '2023-04-20'),
(5, 'Lemoine', 'Alice', '3 allée des Acacias', 'alice.lemoine@mail.com', 'alicepass', '2023-05-18'),
(6, 'Bernard', 'Luc', '18 rue Pasteur', 'luc.bernard@mail.com', 'lucpass', '2023-06-22'),
(7, 'Rousseau', 'Clara', '30 chemin des Roses', 'clara.rousseau@mail.com', 'clarapwd', '2023-07-15'),
(8, 'Petit', 'Thomas', '8 impasse des Cerisiers', 'thomas.petit@mail.com', 'thomaspwd', '2023-08-05'),
(9, 'Blanc', 'Julie', '20 rue des Champs', 'julie.blanc@mail.com', 'juliepass', '2023-09-01'),
(10, 'Fournier', 'Hugo', '15 avenue de la Gare', 'hugo.fournier@mail.com', 'hugopwd', '2023-09-28'),
(11, 'Gauthier', 'Emma', '45 rue des Peupliers', 'emma.gauthier@mail.com', 'emmapass', '2023-10-10'),
(12, 'Lopez', 'Lucas', '50 rue des Fleurs', 'lucas.lopez@mail.com', 'lucas2023', '2023-11-11'),
(13, 'Garcia', 'Lena', '22 rue du Moulin', 'lena.garcia@mail.com', 'lenapwd', '2023-12-01'),
(14, 'Martinez', 'Nina', '9 rue de la Mairie', 'nina.martinez@mail.com', 'ninapass', '2023-12-15'),
(15, 'Hernandez', 'Oscar', '60 avenue des Pyrénées', 'oscar.hernandez@mail.com', 'oscarpwd', '2024-01-10'),
(16, 'Perrin', 'Mia', '33 rue des Jardins', 'mia.perrin@mail.com', 'miapass', '2024-01-25'),
(17, 'Dumont', 'Eliot', '12 rue des Écoles', 'eliot.dumont@mail.com', 'eliotpwd', '2024-02-12'),
(18, 'Renaud', 'Zoe', '6 chemin des Pins', 'zoe.renaud@mail.com', 'zoepass', '2024-02-28'),
(19, 'Fabre', 'Victor', '28 avenue des Platanes', 'victor.fabre@mail.com', 'victorpwd', '2024-03-15'),
(20, 'Leroux', 'Lea', '14 boulevard Haussmann', 'lea.leroux@mail.com', 'leapass', '2024-03-30');

-----

INSERT INTO Groupe (idGroupe, nomGroupe, imageGroupe, couleurGroupe, dateCreation, description) VALUES
(1, 'Les Innovateurs', 'innovateurs.png', 'Bleu', '2023-01-01', 'Groupe d idées innovantes'),
(2, 'Les Créateurs', 'createurs.png', 'Rouge', '2023-02-10', 'Développer des projets artistiques'),
(3, 'Team Sports', 'sports.png', 'Vert', '2023-03-05', 'Passionnés de sport'),
(4, 'Les Explorateurs', 'explorateurs.png', 'Jaune', '2023-04-12', 'Découverte de nouveaux horizons'),
(5, 'Amis des Animaux', 'animaux.png', 'Orange', '2023-05-20', 'Protéger les animaux'),
(6, 'Tech Lovers', 'tech.png', 'Gris', '2023-06-15', 'Amateurs de technologie'),
(7, 'Nature et Aventure', 'nature.png', 'Vert clair', '2023-07-01', 'Randonnées et aventures'),
(8, 'Cuisine Passion', 'cuisine.png', 'Rose', '2023-08-25', 'Partage de recettes et astuces'),
(9, 'Lecture et Écriture', 'lecture.png', 'Violet', '2023-09-10', 'Écrivains et lecteurs'),
(10, 'Les Mélomanes', 'musique.png', 'Cyan', '2023-10-05', 'Amoureux de la musique'),
(11, 'Fitness Club', 'fitness.png', 'Rouge clair', '2023-11-01', 'Activité physique et bien-être'),
(12, 'Gamers United', 'jeux.png', 'Bleu foncé', '2023-11-25', 'Jeux vidéo et compétitions'),
(13, 'Les Écolos', 'ecolo.png', 'Vert foncé', '2023-12-15', 'Écologie et durabilité'),
(14, 'Photographie', 'photo.png', 'Gris clair', '2024-01-05', 'Art de la photo'),
(15, 'Cinéphiles', 'cinema.png', 'Noir', '2024-01-20', 'Discussions sur le cinéma'),
(16, 'Les Artistes', 'art.png', 'Rose clair', '2024-02-01', 'Créations artistiques diverses'),
(17, 'Voyageurs', 'voyage.png', 'Beige', '2024-02-20', 'Partages de voyages'),
(18, 'Entrepreneurs', 'business.png', 'Doré', '2024-03-10', 'Idées et projets d entreprises'),
(19, 'Gastronomie', 'gastronomie.png', 'Vert olive', '2024-03-22', 'Art culinaire'),
(20, 'Solidarité', 'solidarite.png', 'Marron', '2024-04-01', 'Aider les autres');

----

INSERT INTO Vote (idVote, typeScrutin, dateDebut, status, dateFin) VALUES
(1, 'Majoritaire', '2023-01-01', 'Clôturé', '2023-01-10'),
(2, 'Proportionnel', '2023-02-05', 'Clôturé', '2023-02-15'),
(3, 'Uninominal', '2023-03-01', 'Clôturé', '2023-03-10'),
(4, 'Plurinominal', '2023-04-10', 'Clôturé', '2023-04-20'),
(5, 'Majoritaire', '2023-05-15', 'En cours', '2023-05-25'),
(6, 'Proportionnel', '2023-06-05', 'Clôturé', '2023-06-15'),
(7, 'Uninominal', '2023-07-01', 'Clôturé', '2023-07-10'),
(8, 'Plurinominal', '2023-08-15', 'Clôturé', '2023-08-25'),
(9, 'Majoritaire', '2023-09-10', 'En cours', '2023-09-20'),
(10, 'Proportionnel', '2023-10-01', 'Clôturé', '2023-10-10'),
(11, 'Uninominal', '2023-11-05', 'En cours', '2023-11-15'),
(12, 'Plurinominal', '2023-12-01', 'Clôturé', '2023-12-10'),
(13, 'Majoritaire', '2024-01-01', 'En cours', '2024-01-10'),
(14, 'Proportionnel', '2024-01-15', 'Clôturé', '2024-01-25'),
(15, 'Uninominal', '2024-02-10', 'En cours', '2024-02-20'),
(16, 'Plurinominal', '2024-02-20', 'Clôturé', '2024-02-28'),
(17, 'Majoritaire', '2024-03-05', 'Clôturé', '2024-03-15'),
(18, 'Proportionnel', '2024-03-20', 'En cours', '2024-03-30'),
(19, 'Uninominal', '2024-04-01', 'Clôturé', '2024-04-10'),
(20, 'Plurinominal', '2024-04-15', 'En cours', '2024-04-25');

----

INSERT INTO Notification (idNotification, message, typeNotification, dateNotification, status) VALUES
(1, 'Votre vote est comptabilisé', 'Vote', '2023-01-10', 'Envoyée'),
(2, 'Nouveau message du groupe', 'Message', '2023-01-15', 'Envoyée'),
(3, 'Un nouveau membre a rejoint', 'Membre', '2023-02-05', 'Envoyée'),
(4, 'Proposition acceptée', 'Proposition', '2023-02-20', 'Envoyée'),
(5, 'Nouvelle notification', 'Général', '2023-03-01', 'Envoyée'),
(6, 'Rappel de réunion', 'Agenda', '2023-03-10', 'Envoyée'),
(7, 'Un commentaire a été ajouté', 'Commentaire', '2023-03-15', 'Envoyée'),
(8, 'Statut mis à jour', 'Statut', '2023-04-01', 'Envoyée'),
(9, 'Vote clôturé', 'Vote', '2023-04-15', 'Envoyée'),
(10, 'Nouvelle annonce', 'Annonce', '2023-05-01', 'Envoyée'),
(11, 'Un membre a quitté le groupe', 'Membre', '2023-05-15', 'Envoyée'),
(12, 'Nouveau fichier partagé', 'Fichier', '2023-06-01', 'Envoyée'),
(13, 'Changement de responsable', 'Responsable', '2023-06-15', 'Envoyée'),
(14, 'Statut de proposition changé', 'Proposition', '2023-07-01', 'Envoyée'),
(15, 'Réunion reportée', 'Agenda', '2023-07-15', 'Envoyée'),
(16, 'Proposition rejetée', 'Proposition', '2023-08-01', 'Envoyée'),
(17, 'Ajout au groupe validé', 'Groupe', '2023-08-15', 'Envoyée'),
(18, 'Un rôle vous a été attribué', 'Rôle', '2023-09-01', 'Envoyée'),
(19, 'Mise à jour des règles', 'Groupe', '2023-09-15', 'Envoyée'),
(20, 'Proposition en cours de vote', 'Proposition', '2023-10-01', 'Envoyée');

----

INSERT INTO Role (idRole, nomRole) VALUES
(1, 'Administrateur'),
(2, 'Modérateur'),
(3, 'Membre actif'),
(4, 'Invité'),
(5, 'Responsable de groupe'),
(6, 'Contributeur'),
(7, 'Observateur'),
(8, 'Coordinateur'),
(9, 'Consultant'),
(10, 'Support technique'),
(11, 'Rédacteur'),
(12, 'Analyste'),
(13, 'Participant'),
(14, 'Évaluateur'),
(15, 'Organisateur'),
(16, 'Président'),
(17, 'Vice-président'),
(18, 'Secrétaire'),
(19, 'Trésorier'),
(20, 'Archiviste');


---

INSERT INTO Reaction (idReaction, emoticone) VALUES
(1, '👍'),
(2, '❤️'),
(3, '😂'),
(4, '😮'),
(5, '😢'),
(6, '👏'),
(7, '😡'),
(8, '🔥'),
(9, '🎉'),
(10, '💡'),
(11, '🙌'),
(12, '😎'),
(13, '😇'),
(14, '🤔'),
(15, '👌'),
(16, '✅'),
(17, '❌'),
(18, '💪'),
(19, '🌟'),
(20, '🚀');

----

INSERT INTO Membre (idMembre, dateAdhesion, status, idInternaute, idRole, idGroupe) VALUES
(1, '2025-01-01', 'Actif', 1, 1, 1),
(2, '2025-01-02', 'Actif', 2, 2, 1),
(3, '2025-01-03', 'Inactif', 3, 3, 2),
(4, '2025-01-04', 'Actif', 4, 4, 2),
(5, '2025-01-05', 'Suspendu', 5, 5, 3),
(6, '2025-01-06', 'Actif', 6, 6, 3),
(7, '2025-01-07', 'Inactif', 7, 7, 4),
(8, '2025-01-08', 'Actif', 8, 8, 4),
(9, '2025-01-09', 'Actif', 9, 9, 5),
(10, '2025-01-10', 'Suspendu', 10, 10, 5),
(11, '2025-01-11', 'Actif', 11, 11, 6),
(12, '2025-01-12', 'Actif', 12, 12, 6),
(13, '2025-01-13', 'Inactif', 13, 13, 7),
(14, '2025-01-14', 'Actif', 14, 14, 7),
(15, '2025-01-15', 'Actif', 15, 15, 8),
(16, '2025-01-16', 'Suspendu', 16, 16, 8),
(17, '2025-01-17', 'Actif', 17, 17, 9),
(18, '2025-01-18', 'Inactif', 18, 18, 9),
(19, '2025-01-19', 'Actif', 19, 19, 10),
(20, '2025-01-20', 'Actif', 20, 20, 10);


----

INSERT INTO Proposition (idProposition, titre, description, dateCreation, theme, status, voteDemande, idVote, idMembre) VALUES
(1, 'Améliorer la plateforme', 'Proposer de nouvelles fonctionnalités', '2023-01-15', 'Technologie', 'En cours', TRUE, 1, 1),
(2, 'Créer un événement sportif', 'Organiser une compétition locale', '2023-02-10', 'Sport', 'Clôturé', FALSE, 2, 2),
(3, 'Planter des arbres', 'Reforestation de zones urbaines', '2023-03-01', 'Écologie', 'En cours', TRUE, 3, 3),
(4, 'Campagne de dons', 'Collecte pour une association', '2023-04-05', 'Solidarité', 'En cours', FALSE, 4, 4),
(5, 'Refonte du site web', 'Moderniser le design', '2023-05-20', 'Technologie', 'Clôturé', TRUE, 5, 5),
(6, 'Organiser une exposition', 'Mise en avant d artistes locaux', '2023-06-10', 'Art', 'En cours', TRUE, 6, 6),
(7, 'Réunir les membres', 'Préparer une rencontre annuelle', '2023-07-05', 'Social', 'Clôturé', FALSE, 7, 7),
(8, 'Créer une bibliothèque', 'Donner accès à des livres', '2023-08-15', 'Culture', 'En cours', TRUE, 8, 8),
(9, 'Réparer les équipements', 'Maintenance des locaux', '2023-09-01', 'Infrastructure', 'Clôturé', TRUE, 9, 9),
(10, 'Ajouter des ateliers', 'Proposer de nouveaux cours', '2023-10-10', 'Éducation', 'En cours', FALSE, 10, 10),
(11, 'Créer une charte', 'Établir un cadre pour le groupe', '2023-11-15', 'Règlement', 'Clôturé', TRUE, 11, 11),
(12, 'Développer une application', 'Faciliter l accès aux services', '2023-12-01', 'Technologie', 'En cours', FALSE, 12, 12),
(13, 'Organiser un concours', 'Événement pour les membres', '2024-01-05', 'Social', 'Clôturé', TRUE, 13, 13),
(14, 'Aménager les locaux', 'Ajouter du mobilier', '2024-01-20', 'Infrastructure', 'En cours', TRUE, 14, 14),
(15, 'Créer un podcast', 'Échanger des idées', '2024-02-10', 'Média', 'Clôturé', FALSE, 15, 15),
(16, 'Lancer un projet écologique', 'Réduction des déchets', '2024-02-25', 'Écologie', 'En cours', TRUE, 16, 16),
(17, 'Former les membres', 'Proposer des formations', '2024-03-01', 'Éducation', 'Clôturé', TRUE, 17, 17),
(18, 'Organiser une visite guidée', 'Découvrir des lieux historiques', '2024-03-15', 'Culture', 'En cours', FALSE, 18, 18),
(19, 'Mettre en place un système', 'Simplifier les inscriptions', '2024-04-01', 'Technologie', 'En cours', TRUE, 19, 19),
(20, 'Créer un partenariat', 'Collaborer avec d autres groupes', '2024-04-10', 'Social', 'Clôturé', FALSE, 20, 20);

-----

INSERT INTO Commentaire (idCommentaire, texte, dateCommentaire, status, idProposition) VALUES
(1, 'Très bonne idée !', '2023-01-16', 'Approuvé', 1),
(2, 'Je suis d accord', '2023-01-17', 'Approuvé', 1),
(3, 'Cela semble compliqué', '2023-02-12', 'Rejeté', 2),
(4, 'Super initiative', '2023-02-15', 'Approuvé', 3),
(5, 'Manque de détails', '2023-03-05', 'Rejeté', 4),
(6, 'Excellente proposition', '2023-03-10', 'Approuvé', 5),
(7, 'Besoin de précisions', '2023-03-20', 'En attente', 6),
(8, 'Projet intéressant', '2023-04-05', 'Approuvé', 7),
(9, 'Je suis pour', '2023-04-10', 'Approuvé', 8),
(10, 'Pas convaincu', '2023-05-01', 'Rejeté', 9),
(11, 'Bonne démarche', '2023-05-15', 'Approuvé', 10),
(12, 'Trop ambitieux', '2023-06-01', 'Rejeté', 11),
(13, 'Je soutiens', '2023-06-20', 'Approuvé', 12),
(14, 'Peut être amélioré', '2023-07-01', 'En attente', 13),
(15, 'Bien pensé', '2023-07-15', 'Approuvé', 14),
(16, 'Difficile à réaliser', '2023-08-01', 'Rejeté', 15),
(17, 'Excellent projet', '2023-08-20', 'Approuvé', 16),
(18, 'Trop vague', '2023-09-01', 'Rejeté', 17),
(19, 'À approfondir', '2023-09-15', 'En attente', 18),
(20, 'Je suis enthousiaste', '2023-10-01', 'Approuvé', 19);


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


----

INSERT INTO MembreCommentaire (idMembre, idCommentaire) VALUES
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10),
(11, 11), (12, 12), (13, 13), (14, 14), (15, 15),
(16, 16), (17, 17), (18, 18), (19, 19), (20, 20);

-----


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