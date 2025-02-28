  <?php
$titre = "Liste des articles";
?>

<div class="resultat">
  <?php
  if (count($articles)) {
    // Affichage des titres de colonnes du tableau
    require_once "includes/html/tableau.class.php";

    $tableau = new Tableau();
    $head = array_keys($articles[0]);
    echo $tableau->head($head);
    echo $tableau->body($articles);
    echo $tableau->foot();
    
  } else
    echo "<div class='reponse'>Aucun article n'est enregistré dans la liste</div>";
  ?>
</div>