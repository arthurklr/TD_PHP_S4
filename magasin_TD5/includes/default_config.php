<?php
require_once 'config/config.class.php';

$Conf = new stdClass();

// Paramètres d'environnement avec valeurs par défaut
$Conf->DBHOST = Config::$DBHOST ?? "localhost";
$Conf->DBNAME = Config::$DBNAME ?? "magasin";
$Conf->DBUSER = Config::$DBUSER ?? "root";
$Conf->DBPWD = Config::$DBPWD ?? "";

$Conf->MENU = "<a class='lien' href='index.php?action=clients'>Clients</a>
    <a class='lien' href='index.php?action=articles'>Articles</a>
    <a class='lien' href='index.php?action=commandes'>Commandes</a>";

$Conf->TITRE_ONGLET = Config::TITRE_ONGLET;
$Conf->NOM_SITE = Config::NOM_SITE;


global $Conf;
