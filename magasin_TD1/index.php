<?php
require "config/config.php";
require "controleur/controleur.php";

try {
  if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
      case "clients":
        clients();                                                            // Affichage de la liste des clients
        break;
      case "articles":
        articles();                                                           // Affichage de la liste des articles
        break;
      case "commandes":
        commandes();                                                          // Affichage de la liste des commandes
        break;
      case "commande":
        if (isset($_GET["idComm"])) {
          $idComm = (int)$_GET["idComm"];
          if ($idComm > 0)
            commande($idComm);                                                // Affichage d'une commande
        } else
          throw new Exception("Aucun identifiant de commande");
        break;
      default:
        throw new Exception("Action non valide");
    }
  } else
    accueil();
} catch (Exception $e) {
  erreur($e->getMessage());
}
