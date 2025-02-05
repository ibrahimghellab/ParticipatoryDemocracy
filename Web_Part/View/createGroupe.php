<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <link rel="stylesheet" href="../CSS/default.css">
    <title>Créer un groupe</title>
</head>

<body>

    <header>
        <?php include(__DIR__ . "/../View/navbar_connecte.php") ?>

    </header>

    <main>
        <div>
            <form method="POST" action="./../Controller/routeur.php" enctype="multipart/form-data">
                <input type="hidden" name="controleur" value="GroupeController">
                <input type="hidden" name="action" value="createGroupe">

                <div>
                    <label for="nom">Nom du groupe :</label>
                    <input type="text" name="nom" id="nom" required>
                </div>

                <div>
                    <label for="description">Description :</label>
                    <input type="text" name="description" id="description" required>
                </div>

                <div>
                    <label for="fileInput">Choisissez un fichier :</label>
                    <input type="file" id="fileInput" name="fileInput" required>
                </div>

                <div>
                    <label for="couleur">Choisissez une couleur :</label>
                    <input type="color" id="couleur" name="couleur" value="#000000" required>
                </div>

                <div>
                    <label for="theme">Thèmes :</label>
                    <input type="text" id="theme" list="theme-list" placeholder="Ajoutez un thème">
                    <datalist id="theme-list">
                        <option value="Technologie"></option>
                        <option value="Sport"></option>
                        <option value="Musique"></option>
                        <option value="Cinéma"></option>
                        <option value="Voyage"></option>
                        <option value="Cuisine"></option>
                        <option value="Lecture"></option>
                        <option value="Jeux Vidéo"></option>
                    </datalist>
                    <button type="button" id="add-theme">Ajouter</button>

                    <ul id="theme-container"></ul>

                    <input type="hidden" name="themes" id="themes-input">
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>
            </form>
        </div>
    </main>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const themeInput = document.getElementById("theme");
        const addThemeBtn = document.getElementById("add-theme");
        const themeContainer = document.getElementById("theme-container");
        const themesInput = document.getElementById("themes-input");

        let themes = []; 

        addThemeBtn.addEventListener("click", function() {
            let themeValue = themeInput.value.trim();

            if (themeValue !== "" && !themes.includes(themeValue)) {
                themes.push(themeValue);

                let li = document.createElement("li");
                li.textContent = themeValue;

                let removeBtn = document.createElement("button");
                removeBtn.textContent = "❌";
                removeBtn.style.marginLeft = "10px";
                removeBtn.style.cursor = "pointer";

                removeBtn.addEventListener("click", function() {
                    themes = themes.filter(t => t !== themeValue);
                    li.remove();
                    updateThemesInput();
                });

                li.appendChild(removeBtn);
                themeContainer.appendChild(li);

                updateThemesInput();

                themeInput.value = "";
            }
        });

        function updateThemesInput() {
            themesInput.value = JSON.stringify(themes);
        }
    });
    </script>

</body>

</html>