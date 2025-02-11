<?php
require "config/config.php";
require "controleur/ctlRouteur.class.php";

$routeur = new Routeur();
$routeur->routerRequete();
