# Participatory Democracy

Ce projet est une plateforme de démocratie participative qui permet aux utilisateurs de proposer, voter et collaborer sur des projets au sein de groupes. Il est composé de plusieurs parties : une API en PHP, une application Java, une interface web, et une base de données MySQL.

## Structure du Projet

```
index.php          # Point d'entrée principal du projet
README.md          # Documentation du projet
API/               # Contient l'API PHP
    .htaccess        # Configuration Apache
    index.php        # Point d'entrée de l'API
    config/          # Fichiers de configuration
    documentation/   # Documentation de l'API
    Model/           # Modèles de données
    router/          # Gestion des routes
appJava/           # Application Java
    bcrypt-0.7.0.jar # Librairie pour le chiffrement
    bin/             # Fichiers compilés
    jar/             # Librairies MySQL
    src/             # Code source Java
DB_Part/           # Scripts et ressources pour la base de données
    *.sql            # Scripts SQL pour création, insertion, et tests
    mcd.loo          # Modèle conceptuel de données
    RAPPORT_BD.docx  # Rapport de la base de données
Web_Part/          # Partie web de l'application
    assets/          # Ressources statiques (images, JS, etc.)
    Controller/      # Contrôleurs PHP
    CSS/             # Feuilles de style
    Model/           # Modèles de données
    View/            # Vues HTML
```

## Fonctionnalités

### API
- Gestion des utilisateurs, groupes, propositions, votes, et commentaires.
- Endpoints RESTful pour les opérations CRUD.
- Documentation disponible dans `API/documentation/index.html`.

### Application Java
- Interface utilisateur pour gérer les propositions et les groupes.
- Connexion à la base de données pour récupérer et modifier les données.
- Utilisation de Swing pour l'interface graphique.

### Interface Web
- Inscription, connexion, et gestion des utilisateurs.
- Création et gestion des groupes, propositions, et votes.
- Envoi d'invitations par email pour rejoindre des groupes.

### Base de Données
- Modèle relationnel pour stocker les utilisateurs, groupes, propositions, votes, et commentaires.
- Scripts SQL pour la création, insertion, et gestion des données.

## Prérequis

- **Serveur Web** : Apache ou Nginx
- **PHP** : Version 7.4 ou supérieure
- **Base de Données** : MySQL
- **Java** : JDK 8 ou supérieur
- **Librairies** :
    - `bcrypt-0.7.0.jar` pour Java
    - MySQL Connector pour Java

## Installation

1. **Cloner le dépôt** :
     ```bash
     git clone <URL_DU_DEPOT>
     cd <NOM_DU_PROJET>
     ```

2. **Configurer la base de données** :
     - Importez les scripts SQL situés dans `DB_Part/` dans votre base de données MySQL.

3. **Configurer l'API PHP** :
     - Modifiez le fichier `API/config/connexion.php` pour y ajouter vos informations de connexion à la base de données.

4. **Configurer l'application Java** :
     - Ajoutez les librairies nécessaires (`bcrypt-0.7.0.jar` et MySQL Connector) au classpath.
     - Compilez et exécutez les fichiers Java situés dans `appJava/src/`.

5. **Démarrer le serveur web** :
     - Placez le contenu du projet dans le répertoire racine de votre serveur web (ex. : `htdocs` pour XAMPP).

6. **Accéder à l'application** :
     - **API** : Accessible via [http://localhost/API/](http://localhost/API/).
     - **Interface Web** : Accessible via [http://localhost/Web_Part/](http://localhost/Web_Part/).

## Utilisation

- **API** : Utilisez les endpoints RESTful pour interagir avec les données.
- **Application Java** : Lancez l'application pour gérer les propositions et les groupes.
- **Interface Web** : Connectez-vous pour créer des groupes, proposer des projets, et voter.

## Licence

Ce projet est sous licence MIT.



Debug by osman tugrul
