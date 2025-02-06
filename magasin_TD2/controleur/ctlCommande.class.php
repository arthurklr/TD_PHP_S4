<?php
require_once "modele/commande.class.php";
require_once "vue/vue.class.php";

/**
 * Classe Contrôleur des commandes
 * Gère les interactions entre le modèle Commande et les vues
 */
class ctlCommande
{
    private $commande;

    /**
     * Constructeur : initialise l'objet commande
     */
    public function __construct()
    {
        $this->commande = new commande();
    }

    /**
     * Affiche la liste des commandes dans la vue concernée
     */
    public function commandes()
    {
        $commande = $this->commande->getCommandes();
        $vue = new vue("Commandes");
        $vue->afficher(array("commandes" => $commande));
    }

    /**
     * Affiche les détails d'une commande spécifique
     */
    public function commande($idComm)
    {
        $articles = $this->commande->getArticlesCommande($idComm);
        if (!empty($articles)) {
            $objClient = new client();
            $client = $objClient->getClient($this->commande->getIdClientCommande($idComm));
            $total = $this->commande->getTotalCommande($idComm);
            $vue = new vue("Commande");
            $vue->afficher(array(
                "client" => $client,
                "articles" => $articles,
                "total" => $total,
                "idComm" => $idComm
            ));
        } else {
            throw new Exception("Echec de l'affichage de la commande N°$idComm");
        }
    }
}
