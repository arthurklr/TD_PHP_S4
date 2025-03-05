<?php
$titre = "Ajouter un client";
?>

<div class="resultat">
    <?php if (isset($message) && !empty($message)) : ?>
        <div class="erreur">
            Erreur : <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form action="index.php?action=enregClient" method="post">
        <?php
        require_once "includes/formulaire.class.php";
        $form = new Formulaire($_POST);
        echo $form->inputText("nom", "Nom");
        echo $form->inputText("prenom", "Prénom");
        echo $form->inputText("age", "Age");
        echo $form->inputText("adresse", "Adresse");
        echo $form->inputText("ville", "Ville");
        echo $form->inputText("mail", "Adresse email");
        echo $form->submit("ok");
        ?>
    </form>
</div>