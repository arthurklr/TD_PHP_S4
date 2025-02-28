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
    }
    else
      echo "<div class='reponse'>Aucun client n'est enregistré dans la liste</div>";
  ?>
</div>