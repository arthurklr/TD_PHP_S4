<?php
require_once 'config/config.class.php';

$Conf = new stdClass();

// Paramètres d'environnement avec valeurs par défaut
$Conf->DBHOST = Config::$DBHOST ?? "localhost";
$Conf->DBNAME = Config::$DBNAME ?? "magasin";
$Conf->DBUSER = Config::$DBUSER ?? "root";
$Conf->DBPWD = Config::$DBPWD ?? "";

global $Conf;

