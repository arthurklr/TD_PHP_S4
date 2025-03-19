<?php
require_once "m2a.class.php";
try {
    $m2a = new M2A("/catalog/datasets");
    echo "<h1>Résultat</h1><pre>";
    print_r($m2a->result);
    echo "</pre>";
} catch (Exception $e) {
    echo "ERREUR : " . $e->getMessage();
}
