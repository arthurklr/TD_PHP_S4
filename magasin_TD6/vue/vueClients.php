<?php
$titre = "Liste des clients";
?>

<div class="resultat">
  <?php
  if (count($clients)) {
    // Affichage des titres de colonnes du tableau
    require_once "includes/html/tableau.class.php";

    $tableau = new Tableau();
    $head = array_keys($clients[0]);
    echo $tableau->head($head);
    echo $tableau->body($clients);
    echo $tableau->foot();
    echo "<a href='index.php?action=ajoutClient'><p class='valid'>Ajouter un client</p></a>";
  } else
    echo "<div class='reponse'>Aucun client n'est enregistré dans la liste</div>";
  ?>
</div>