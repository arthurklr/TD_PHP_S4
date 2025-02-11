<?php
require_once "modele/article.class.php";
require_once "vue/vue.class.php";

/**
 * Classe Contrôleur des articles
 * Gère les interactions entre le modèle Article et les vues
 */
class ctlArticle
{
    private $article;

    /**
     * Constructeur : initialise l'objet article
     */
    public function __construct()
    {
        $this->article = new article();
    }

    /**
     * Affiche la liste des articles dans la vue concernée
     */
    public function articles()
    {
        $article = $this->article->getArticles();
        $vue = new vue("Articles");
        $vue->afficher(array("articles" => $article));
    }
}
