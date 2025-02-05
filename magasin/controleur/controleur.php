<?php
require_once "modele/article.class.php";
require_once "modele/client.class.php";
require_once "modele/commande.class.php";
require_once "vue/vue.class.php";

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
  $objClient = new client();
  $clients = $objClient->getClients();
  $vue = new vue("Clients");
  $vue->afficher(array("clients" => $clients));
}

/*******************************************************
Affichage de la liste des articles dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function articles()
{
  $objArt = new article();
  $articles = $objArt->getArticles();
  $vue = new vue("Articles");
  $vue->afficher(array("articles" => $articles));
}


/*******************************************************
Affichage de la liste des commandes dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function commandes()
{
  $objCommande = new commande();
  $commandes = $objCommande->getCommandes();
  $vue = new vue("Commandes");
  $vue->afficher(array("commandes" => $commandes));
}


/*******************************************************
Affichage des détails d'une commande et du client dans la vue concernée
  Entrée :
    idComm [int] : n° de la commande

  Retour : 
    
 *******************************************************/
function commande($idComm)
{
  $objCommande = new commande();
  $articles = $objCommande->getArticlesCommande($idComm);
  if (!empty($articles)) {
    $objClient = new client();
    $client = $objClient->getClient($objCommande->getIdClientCommande($idComm));
    $total = $objCommande->getTotalCommande($idComm);
    $vue = new vue("Commande");
    $vue->afficher(array("client" => $client, "articles" => $articles, "total" => $total, "idComm" => $idComm));
  } else
    throw new Exception("Echec de l'affichage de la commande N°$idComm");
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