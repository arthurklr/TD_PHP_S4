<?php
require_once "modele/client.class.php";
require_once "vue/vue.class.php";

/**
 * Classe Contrôleur des articles
 * Gère les interactions entre le modèle Article et les vues
 */
class ctlClient
{
    private $client;

    /**
     * Constructeur : initialise l'objet article
     */
    public function __construct()
    {
        $this->client = new client();
    }

    /**
     * Affiche la liste des articles dans la vue concernée
     */
    public function clients()
    {
        $client = $this->client->getClients();
        $vue = new vue("Clients");
        $vue->afficher(array("clients" => $client));
    }
}
