<?php

class City
{
    /**
     * Nom de la ville
     */
    private $name;
    /**
     * Articles présents dans la ville
     */
    private $articles;

    /**
     * Constructeur
     * @name : nom de la ville
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    

    /**
     * Assigner un tableau d'articles
     * @articles : tableau d'articles
     */
    public function setArticles(array $articles):void
    {
        $this->articles = $articles;
    }

    /**
     * Récupérer les articles
     */
    public function getArticles():string
    {
        return $this->articles;
    }
    
    /**
     * Récupérer le nom de la ville
     */
    public function getName():string
    {
        return $this->name;
    }
}



