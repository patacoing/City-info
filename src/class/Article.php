<?php


class Article
{
    /**
     * Titre de l'article
     */
    private $title;
    /**
     * lien de l'article
     */
    private $link;

    /**
     * Constructeur
     * @title : titre de l'article
     * @link : lien vers l'article
     */
    public function __construct($title, $link){
        $this->title = $title;
        $this->link = $link;
    }

    /**
     * Fonction pour afficher dans le DOM, un lien vers l'article
     */
    public function showArticle(){
        $html = '<div class="article">';
            $html .= "\n\t".'<a href="' . $this->link.'">'.$this->title.'</a>';
        $html .= '</div>';
        return $html;
    }
}