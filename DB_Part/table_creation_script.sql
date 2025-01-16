CREATE TABLE Internaute(
   idInternaute INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   adresse VARCHAR(50),
   email VARCHAR(50),
   motDePass VARCHAR(50),
   dateCreation DATE,
   PRIMARY KEY(idInternaute)
);

CREATE TABLE Groupe(
   idGroupe INT AUTO_INCREMENT,
   nomGroupe VARCHAR(50),
   imageGroupe VARCHAR(50),
   couleurGroupe VARCHAR(50),
   dateCreation DATE,
   description VARCHAR(50),
   PRIMARY KEY(idGroupe)
);

CREATE TABLE Vote(
   idVote INT AUTO_INCREMENT,
   typeScrutin VARCHAR(50),
   dateDebut DATE,
   status VARCHAR(50),
   dateFin DATE,
   PRIMARY KEY(idVote)
);

CREATE TABLE Notification(
   idNotification INT AUTO_INCREMENT,
   message VARCHAR(50),
   typeNotification VARCHAR(50),
   dateNotification DATE,
   status VARCHAR(50),
   PRIMARY KEY(idNotification)
);

CREATE TABLE Role(
   idRole INT AUTO_INCREMENT,
   nomRole VARCHAR(50) NOT NULL,
   PRIMARY KEY(idRole)
);

CREATE TABLE Reaction(
   idReaction INT AUTO_INCREMENT,
   emoticone VARCHAR(50),
   PRIMARY KEY(idReaction)
);

CREATE TABLE Membre(
   idMembre INT AUTO_INCREMENT,
   dateAdhesion VARCHAR(50),
   status VARCHAR(50),
   idInternaute INT NOT NULL,
   idRole VARCHAR(50) NOT NULL,
   idGroupe INT NOT NULL,
   PRIMARY KEY(idMembre),
   FOREIGN KEY(idInternaute) REFERENCES Internaute(idInternaute),
   FOREIGN KEY(idRole) REFERENCES Role(idRole),
   FOREIGN KEY(idGroupe) REFERENCES Groupe(idGroupe)
);

CREATE TABLE Proposition(
   idProposition INT AUTO_INCREMENT,
   titre VARCHAR(50),
   description VARCHAR(50),
   dateCreation DATE,
   theme VARCHAR(50),
   status VARCHAR(50),
   voteDemande BOOLEAN,
   idVote INT NOT NULL,
   idMembre INT NOT NULL,
   PRIMARY KEY(idProposition),
   UNIQUE(idVote),
   FOREIGN KEY(idVote) REFERENCES Vote(idVote),
   FOREIGN KEY(idMembre) REFERENCES Membre(idMembre)
);

CREATE TABLE Commentaire(
   idCommentaire INT AUTO_INCREMENT,
   texte VARCHAR(50),
   dateCommentaire DATE,
   status VARCHAR(50),
   idProposition INT NOT NULL,
   PRIMARY KEY(idCommentaire),
   FOREIGN KEY(idProposition) REFERENCES Proposition(idProposition)
);

CREATE TABLE Budget(
   idBudget INT AUTO_INCREMENT,
   budgetGlobal DECIMAL(15,2),
   budgetTheme DECIMAL(15,2),
   themeDuBudget VARCHAR(50),
   limiteBudgetTheme DECIMAL(15,2),
   idProposition INT NOT NULL,
   PRIMARY KEY(idBudget),
   UNIQUE(idProposition),
   FOREIGN KEY(idProposition) REFERENCES Proposition(idProposition)
);

CREATE TABLE Signaler(
   idMembre INT,
   idCommentaire INT,
   PRIMARY KEY(idMembre, idCommentaire),
   FOREIGN KEY(idMembre) REFERENCES Membre(idMembre),
   FOREIGN KEY(idCommentaire) REFERENCES Commentaire(idCommentaire)
);

CREATE TABLE CommentaireReaction(
   idCommentaire INT,
   idReaction INT,
   PRIMARY KEY(idCommentaire, idReaction),
   FOREIGN KEY(idCommentaire) REFERENCES Commentaire(idCommentaire),
   FOREIGN KEY(idReaction) REFERENCES Reaction(idReaction)
);

CREATE TABLE PropositionReaction(
   idProposition INT,
   idReaction INT,
   PRIMARY KEY(idProposition, idReaction),
   FOREIGN KEY(idProposition) REFERENCES Proposition(idProposition),
   FOREIGN KEY(idReaction) REFERENCES Reaction(idReaction)
);

CREATE TABLE MembreReaction(
   idMembre INT,
   idReaction INT,
   PRIMARY KEY(idMembre, idReaction),
   FOREIGN KEY(idMembre) REFERENCES Membre(idMembre),
   FOREIGN KEY(idReaction) REFERENCES Reaction(idReaction)
);

CREATE TABLE MembreVote(
   idMembre INT,
   idVote INT,
   choix VARCHAR(50),
   PRIMARY KEY(idMembre, idVote),
   FOREIGN KEY(idMembre) REFERENCES Membre(idMembre),
   FOREIGN KEY(idVote) REFERENCES Vote(idVote)
);

CREATE TABLE InternauteNotification(
   idInternaute INT,
   idNotification INT,
   PRIMARY KEY(idInternaute, idNotification),
   FOREIGN KEY(idInternaute) REFERENCES Internaute(idInternaute),
   FOREIGN KEY(idNotification) REFERENCES Notification(idNotification)
);

CREATE TABLE MembreCommentaire(
   idMembre INT,
   idCommentaire INT,
   PRIMARY KEY(idMembre, idCommentaire),
   FOREIGN KEY(idMembre) REFERENCES Membre(idMembre),
   FOREIGN KEY(idCommentaire) REFERENCES Commentaire(idCommentaire)
);
