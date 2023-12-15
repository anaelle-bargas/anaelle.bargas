

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transition Enchantée</title>
    <style>
        body{
            background-color:#000;
        }
        #maDiv {
            background-color:#fff;
            opacity: 1;
            max-height: 500px; /* Une valeur suffisamment grande pour couvrir le contenu */
            overflow: hidden;
            transition: opacity 1s ease-in-out, max-height 1s ease-in-out; /* Transition de l'opacité et de la hauteur maximale */
        }

        .cacher {
            opacity: 0;
            max-height: 0;
        }
    </style>
</head>
<body>

    <div id="maDiv" class="cacher">
        <!-- Le contenu de votre div ici -->
        <p>Ceci est le contenu de la div.</p>
    </div>

    <button onclick="toggleVisibility()">Basculer la Visibilité</button>

    <script>
        function toggleVisibility() {
            var maDiv = document.getElementById("maDiv");
            maDiv.classList.toggle("cacher");

            // Ajuster la hauteur dynamiquement
            if (maDiv.classList.contains("cacher")) {
                maDiv.style.maxHeight = '0';
            } else {
                maDiv.style.maxHeight = '500px'; // Ou une valeur suffisamment grande pour couvrir le contenu
            }
        }
    </script>

</body>
</html>

