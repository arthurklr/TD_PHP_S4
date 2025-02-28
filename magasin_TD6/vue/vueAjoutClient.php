<?php
$titre = "Ajouter un client";
?>

<div class="resultat">
    <form action="index.php?action=ajoutClient" method="post">
        <?php
        require_once "includes/formulaire.class.php";
        $form = new Formulaire();
        echo $form->inputText("nom", "Nom");
        echo $form->inputText("prenom", "Prénom");
        echo $form->inputText("adresse", "Adresse");
        echo $form->inputText("ville", "Ville");
        echo $form->inputText("mail", "Adresse email");
        echo $form->inputText("age", "Age");
        echo $form->submit("ok");
        ?>
    </form>
</div>