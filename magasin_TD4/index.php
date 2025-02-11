<?php
require "config/config.class.php";
require "controleur/ctlRouteur.class.php";


$Conf = new Config();
global $Conf;

$routeur = new Routeur();
$routeur->routerRequete();
