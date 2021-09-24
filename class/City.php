<?php

class City
{
    private $name;
    private $articles;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    

    public function setArticles(array $articles):void
    {
        $this->articles = $articles;
    }

    public function getArticles():string
    {
        return $this->articles;
    }
    
    public function getName():string
    {
        return $this->name;
    }
}



