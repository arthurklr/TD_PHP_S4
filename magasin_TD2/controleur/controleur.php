<?php
require_once "modele/article.class.php";
require_once "modele/client.class.php";
require_once "modele/commande.class.php";
require_once "vue/vue.class.php";
require_once "controleur/ctlArticle.php";
require_once "controleur/ctlClient.php";
require_once "controleur/ctlCommande.php";

/*******************************************************
Affichage de la page d'accueil du site
  Entrée : 

  Retour : 
    
 *******************************************************/
function accueil()
{
  $vue = new vue("Accueil");
  $vue->afficher(array("accueil"));
}


/*******************************************************
Affichage de la liste des clients dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function clients()
{
  $ctlClient = new ctlClient();
  $ctlClient->clients();
}


/*******************************************************
Affichage de la liste des articles dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function articles()
{
  $ctlArticle = new ctlArticle();
  $ctlArticle->articles();
}


/*******************************************************
Affichage de la liste des commandes dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function commandes()
{
  $ctlCommande = new ctlCommande();
  $ctlCommande->commandes();
}



/*******************************************************
Affichage des détails d'une commande et du client dans la vue concernée
  Entrée :
    idComm [int] : n° de la commande

  Retour : 
    
 *******************************************************/
function commande($idComm)
{
  $ctlCommande = new ctlCommande();
  $ctlCommande->commande($idComm);
}

/*******************************************************
Affichage d'une page d'erreur
  Entrée : 
    message [string] : message d'erreur

  Retour : 
    
 *******************************************************/
function erreur($message)
{
  require "vue/vueErreur.php";
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement