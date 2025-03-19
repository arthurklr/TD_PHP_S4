<?php
require_once "m2a.class.php";
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
