<?php
  $titre = "Commande n°$idComm";
?>

<div class="resultat">
  <div class="titreCommande">Client :</div>
  <div><?= $client["nom"]." ".$client["prenom"] ?></div>
  <div><?= $client["adresse"] ?></div>
  <div><?= $client["ville"] ?></div>
  <div class="titreCommande">Articles :</div>
  <?php
    if (count($articles)) {
      // Affichage des titres de colonnes du tableau
      require_once "includes/html/tableau.class.php";
      $tableau = new Tableau();
      $head = array_keys($articles[0]);
      echo $tableau->head($head);
      echo $tableau->body($articles);
      echo $tableau->foot(["", "", "Total :", "$total &euro;"]);
    }
    else
      echo "<div class='reponse'>La commande ne contient pas d'article</div>";
  ?>
</div>