<?php
require_once "m2a.class.php";

// Traitement du formulaire s'il est soumis
if (isset($_POST['api_url']) && !empty($_POST['api_url'])) {
    $api_url = $_POST['api_url'];

    try {
        // Instanciation avec les paramètres fournis par l'utilisateur
        $m2a = new M2A($api_url);

        echo "<h2>Résultat</h2>";
        echo "<pre>";
        print_r($m2a->result);
        echo "</pre>";

        // Observation de la propriété links
        if (isset($m2a->result->links)) {
            echo "<h3>Propriété links</h3>";
            echo "<p>Les éléments du tableau 'links' servent à la pagination des résultats. Ils contiennent les liens vers les pages précédentes, suivantes, etc.</p>";
            echo "<pre>";
            print_r($m2a->result->links);
            echo "</pre>";
        }
    } catch (Exception $e) {
        echo "ERREUR : " . $e->getMessage();
    }
}

// Affichage du formulaire
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Interrogation de l'API M2A</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 500px;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
        }

        pre {
            background-color: #f5f5f5;
            padding: 10px;
            overflow: auto;
        }
    </style>
</head>

<body>
    <h1>Interrogation de l'API M2A</h1>

    <form method="post" action="">
        <input type="text" name="api_url" placeholder="/catalog/datasets" value="<?php echo isset($_POST['api_url']) ? htmlspecialchars($_POST['api_url']) : ''; ?>">
        <input type="submit" value="Valider">
    </form>

    <?php
    // Le code existant pour afficher les cantons peut être conservé ou supprimé selon les besoins
    if (!isset($_POST['api_url'])) {
        try {
            // Instanciation avec les paramètres pour obtenir tous les cantons triés
            $m2a = new M2A("/catalog/datasets/m2a_cantons-du-departement-du-haut-rhin/records?select=cant_nom,popu_total&limit=100&order_by=cant_nom");

            echo "<h1>Liste des cantons du Haut-Rhin</h1>";
            echo "<ul>";

            // Initialisation d'un objet vide pour stocker les données
            $cantons_data = new stdClass();

            // Parcours des résultats qui se trouvent dans la propriété "results"
            foreach ($m2a->result->results as $canton) {
                echo "<li>" . htmlspecialchars($canton->cant_nom) . " : " . htmlspecialchars($canton->popu_total) . "</li>";

                // Ajout des données dans l'objet
                $cantons_data->{$canton->cant_nom} = intval($canton->popu_total);
            }
            echo "</ul>";

            // Conversion de l'objet en JSON
            $json_data = json_encode($cantons_data, JSON_PRETTY_PRINT);

            // Enregistrement dans le fichier liste.json
            file_put_contents('liste.json', $json_data);

            echo "<p>Les données ont été enregistrées dans le fichier liste.json</p>";
        } catch (Exception $e) {
            echo "ERREUR : " . $e->getMessage();
        }
    }
    ?>
</body>

</html>