<?php

class Type{
    private $Id;
    private $Type;

    private $Category_id;

    

    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getType() {
        return $this->Type;
    }
    public function setType($type) {
        $this->Type = $type;
    }

    public function getCategory() {
        return $this->Category_id;
    }
    public function setCategory($category_id) {
        $this->Category_id = $category_id;
    }
}
     
?>