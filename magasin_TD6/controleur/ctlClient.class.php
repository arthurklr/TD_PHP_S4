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

    public function ajoutClient()
    {
        $vue = new vue("AjoutClient");
        $vue->afficher(array());
    }

    public function enregClient()
    {
        extract($_POST);

        $message = "";

        if (empty($nom)) $message = "Veuillez indiquer un nom <br>";
        if (empty($prenom)) $message .= "Veuillez indiquer un prenom <br>";
        if (empty($age) && !is_numeric($age) && $age > 0) $message .= "Veuillez indiquer un age <br>";
        if (empty($adresse)) $message .= "Veuillez indiquer une adresse <br>";
        if (empty($ville)) $message .= "Veuillez indiquer une ville <br>";
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) $message .= "Veuillez indiquer une adresse mail";

        if (empty($message)) {
            if ($this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail))
                $this->clients();
            else
                throw new Exception("Erreur lors de l'ajout du client");
        } else {
            $vue = new vue("AjoutClient");
            $vue->afficher(array("message" => $message));
        }
    }
}
