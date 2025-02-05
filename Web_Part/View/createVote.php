<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <link rel="stylesheet" href="../CSS/default.css">
    <title>Créer vote</title>
</head>

<body>
    <header>
        <?php include(__DIR__ . "/../View/navbar_connecte.php"); ?>
    </header>
    <main>
        <div>
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="VoteController">
                <input type="hidden" name="action" value="createVote">
                <input type="hidden" name="idProposition" value=<?php echo $_POST['idProposition']; ?>>
                <?php
                echo ' <input type="hidden" name="idMembre" value="' . $_POST["idMembre"] . '">';
                echo ' <input type="hidden" name="idGroupe" value="' . $_POST["idGroupe"] . '">';
                echo '<input type="hidden" name="titre" value="' . $_POST["titre"] . '">';
                echo '<input type="hidden" name="description" value="' . $_POST["description"] . '">';
                echo '<input type="hidden" name="dateCreation" value="' . $_POST["dateCreation"] . '">';
                echo '<input type="hidden" name="theme" value="' . $_POST["theme"] . '">';
                ?>
                <div>
                    <label for="typeScrutin">Type de Scrutin</label>
                    <input type="text" name="typeScrutin" id="typeScrutin" required>
                </div>
                <div>
                    <label for="dateFin">Date de fin </label>
                    <input type="date" name="dateFin" id="dateFin" required>
                </div>

                <div>
                    <label for="choixVote">Choix du vote</label>
                    <input type="text" id="choixVote" name="choixVotes" list="choixVote-vote"
                        placeholder="Ajoutez un choix de vote">
                    <datalist id="choixVote-vote">
                        <option value="Technologie"></option>
                        <option value="Sport"></option>
                        <option value="Musique"></option>
                        <option value="Cinéma"></option>
                        <option value="Voyage"></option>
                        <option value="Cuisine"></option>
                        <option value="Lecture"></option>
                        <option value="Jeux Vidéo"></option>
                    </datalist>
                    <button type="button" id="add-choixVote">Ajouter</button>

                    <ul id="choixVote-container"></ul>

                    <input type="hidden" name="choixVote" id="choixVotes-input">
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>
            </form>
        </div>
    </main>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const choixVoteInput = document.getElementById("choixVote");
        const addChoixVoteBtn = document.getElementById("add-choixVote");
        const choixVoteContainer = document.getElementById("choixVote-container");
        const choixVotesInput = document.getElementById("choixVotes-input");

        let choixVotes = [];

        addChoixVoteBtn.addEventListener("click", function() {
            let choixVoteValue = choixVoteInput.value.trim();

            if (choixVoteValue !== "" && !choixVotes.includes(choixVoteValue)) {
                choixVotes.push(choixVoteValue);

                let li = document.createElement("li");
                li.textContent = choixVoteValue;

                let removeBtn = document.createElement("button");
                removeBtn.textContent = "❌";
                removeBtn.style.marginLeft = "10px";
                removeBtn.style.cursor = "pointer";

                removeBtn.addEventListener("click", function() {
                    choixVotes = choixVotes.filter(t => t !== choixVoteValue);
                    li.remove();
                    updateChoixVotesInput();
                });

                li.appendChild(removeBtn);
                choixVoteContainer.appendChild(li);

                updateChoixVotesInput();

                choixVoteInput.value = "";
            }
        });

        function updateChoixVotesInput() {
            choixVotesInput.value = JSON.stringify(choixVotes);
        }
    });
    </script>

</body>

</html>