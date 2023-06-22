<?php

class Category{
    private $Id;
    private $Category;
    private $CategoryImg;

    

    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getCategory() {
        return $this->Category;
    }
    public function setCategory($category) {
        $this->Category = $category;
    }


    
    public function getCategoryImg() {
        return $this->CategoryImg;
    }
    public function setCategoryImg($category_img) {
        $this->CategoryImg = $category_img;
    }
    

}
     
?>