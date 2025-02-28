<?php
$titre = "Liste des commandes";
?>

<div class="resultat">
  <?php
  if (count($commandes)) {

    require_once "includes/html/tableau.class.php";
    $tableau = new Tableau();
    $head = array_keys($commandes[0]);
    echo $tableau->head(array_merge([""], array_keys($commandes[0])));
    foreach($commandes as $ligne)
    {
      $ligne = array_merge(["<a class='action' href='index.php?action=commande&idComm=".$ligne["N° Commande"]."'>Afficher</a>"], $ligne);
      echo $tableau->row($ligne);
    }
    echo $tableau->foot();
  } else
    echo "<div class='reponse'>Aucune commande n'est enregistrée dans la liste</div>";
  ?>
</div>