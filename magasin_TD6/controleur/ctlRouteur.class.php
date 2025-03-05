<?php
require_once "ctlClient.class.php";
require_once "ctlArticle.class.php";
require_once "ctlCommande.class.php";
require_once "ctlPage.class.php";

class Routeur
{
    private $ctlClient;
    private $ctlArticle;
    private $ctlCommande;
    private $ctlPage;

    public function __construct()
    {
        $this->ctlClient = new ctlClient();
        $this->ctlArticle = new ctlArticle();
        $this->ctlCommande = new ctlCommande();
        $this->ctlPage = new ctlPage();
    }

    public function routerRequete()
    {
        try {
            if (isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case "clients":
                        $this->ctlClient->clients();
                        break;
                    case "articles":
                        $this->ctlArticle->articles();
                        break;
                    case "commandes":
                        $this->ctlCommande->commandes();
                        break;
                    case "commande":
                        if (isset($_GET["idComm"])) {
                            $idComm = (int)$_GET["idComm"];
                            if ($idComm > 0)
                                $this->ctlCommande->commande($idComm);
                        } else
                            throw new Exception("Aucun identifiant de commande");
                        break;
                    case "ajoutClient":
                        $this->ctlClient->ajoutClient();
                        break;
                    case "enregClient":
                        $this->ctlClient->enregClient();
                        break;
                    default:
                        throw new Exception("Action non valide");
                }
            } else {
                $this->ctlPage->accueil();
            }
        } catch (Exception $e) {
            $this->ctlPage->erreur($e->getMessage());
        }
    }
}
