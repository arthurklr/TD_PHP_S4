<?php
require "includes/default_config.php";
require "controleur/ctlRouteur.class.php";

$routeur = new Routeur();
$routeur->routerRequete();
