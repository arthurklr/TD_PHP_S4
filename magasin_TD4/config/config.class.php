<?php
abstract class Config
{

    // Paramètres d'application (constants)
    const TITRE_ONGLET = "Mon Site";
    const NOM_SITE = "Site Web";

    // Configuration spécifique à l'application
    public static $MENU = "<a class='lien' href='index.php?action=clients'>Clients</a>
    <a class='lien' href='index.php?action=articles'>Articles</a>
    <a class='lien' href='index.php?action=commandes'>Commandes</a>";
}
