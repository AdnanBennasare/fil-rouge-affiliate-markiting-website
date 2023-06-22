<?php

class Product{
    private $Id;
    private $Name;
    private $Brand;
    private $Price;
    private $Image_URL;

    private $Date_Added;


    private $Tag;
    private $Bottom_Line;
    private $PROS;	
    private $CONS;									
    private $Typeid;


    
    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getName() {
        return $this->Name;
    }
    public function setName($name) {
        $this->Name = $name;
    }

    public function getBrand() {
        return $this->Brand;
    }
    public function setBrand($brand) {
        $this->Brand = $brand;
    }

    
    public function getImage_URL() {
        return $this->Image_URL;
    }
    public function setImage_URL($image_URL) {
        $this->Image_URL = $image_URL;
    }


    public function getDate_Added() {
        return $this->Date_Added;
    }
    public function setDate_Added($date_Added) {
        $this->Date_Added = $date_Added;
    }


  

    public function getTag() {
        return $this->Tag;
    }
    public function setTag($tag) {
        $this->Tag = $tag;
    }

    public function getBottom_Line() {
        return $this->Bottom_Line;
    }
    public function setBottom_Line($bottom_Line) {
        $this->Bottom_Line = $bottom_Line;
    }
    public function getPROS() {
        return $this->PROS;
    }
    public function setPROS($pros) {
        $this->PROS = $pros;
    }

    public function getCONS() {
        return $this->CONS;
    }
    public function setCONS($cons) {
        $this->CONS = $cons;
    }

    public function getTypeID() {
        return $this->Typeid;
    }
    public function setTypeID($typeid) {
        $this->Typeid = $typeid;
    }

}
     
?>
