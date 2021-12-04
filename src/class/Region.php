<?php


class Region
{
    /**
     * Nom de la région
     */
    private $name;
    /**
     * Code de la région
     */
    private $code;
    /**
     * Chemin d'accès à l'image de la région
     */
    private $imgPath;
    /**
     * constant de classe : tableau des paths des images
     */
    const PATH_IMAGES = ["1.jpg", "2.jpg", "3.jpg", "4.jpg","6.jpg","11.jpg","24.jpg","27.jpg","28.jpg","32.jpg","44.jpg","52.jpg","53.jpg","75.jpg","76.jpg","84.jpg","93.jpg","94.jpg"];

    /**
     * Constructeur
     * @name : nom de la region
     * @code : code de la région pour l'identifier
     */
    public function __construct(string $name, int $code)
    {
        $this->name = $name;
        $this->code = $code;
        $this->imgPath = self::PATH_IMAGES[array_search($this->code,self::PATH_IMAGES)];

    }

    /**
     * Récupérer le nom de la région
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Récupérer le code de la région
     */
    public function getCode():string
    {
        return $this->code;
    }

    /**
     * Récupérer le chemin de l'image de la région
     */
    public function getImgPath():string
    {
        return $this->imgPath;
    }

    /**
     * Afficher l'image
     */
    public function showImg($display = false):void
    {   
        echo '<img src="data/img/'.$this->getImgPath().'" alt="'.$this->getName().'"';
        if($display) echo 'style="display:none">';
        else echo '>';
    }

}