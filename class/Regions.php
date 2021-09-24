<?php
require "class/Region.php";

class Regions{
    private $filePath;
    private $regions;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->setData();
    }

    public function getFilePath():string
    {
        return $this->filePath;
    }

    public function getData():array
    {
        return $this->regions;
    }

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