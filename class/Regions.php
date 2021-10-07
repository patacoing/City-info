<?php
require "class/Region.php";

class Regions{
    /**
     * Chemin d'accès au fichier des régions
     */
    private $filePath;
    /**
     * tableau des régions
     */
    private $regions;

    /**
     * Constrcuteur
     * @filePath : chemin du fichier des régions
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->setData();
    }

    /**
     * Récupérer le chemin du fichier
     */
    public function getFilePath():string
    {
        return $this->filePath;
    }

    /**
     * Récupérer les régions
     */
    public function getData():array
    {
        return $this->regions;
    }

    /**
     * Définir les régions présentes dans data/regions.csv dans l'attribut regions
     */
    public function setData()
    {
        $csv = array_map('str_getcsv', file($this->getFilePath()));
        $firstCol = $csv[0][0];
        $secondCol = $csv[0][1];
        unset($csv[0]);
        $regions = [];
        foreach ($csv as $region){
            $regions[] = new Region($region[1],$region[0]);
        }
        $this->regions = $regions;
    }

    /**
     * Afficher la balise select correspondant à toutes les régions
     */
    public function showSelect()
    {
        $select = '<select name="region">';
        foreach ($this->regions as $region){
            $select .= '<option value="'.$region->getCode().'">'.$region->getName().'</option>';
        }
        $select .= '</select>';
        echo $select;
    }

}