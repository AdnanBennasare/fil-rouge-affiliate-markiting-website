<?php
class Link{
    private $Affiliate_Id;
    private $Affiliate_Name;
    private $Affiliate_Link;
    private $Product_Id;
    private $Price;




    public function getAffiliate_Id() {
        return $this->Affiliate_Id;
    }
    public function setAffiliate_Id($affiliate_id) {
        $this->Affiliate_Id = $affiliate_id;
    }

    public function getAffiliate_Name() {
        return $this->Affiliate_Name;
    }
    public function setAffiliate_Name($affiliate_name) {
        $this->Affiliate_Name = $affiliate_name;
    }



 
    public function getAffiliate_Link() {
        return $this->Affiliate_Link;
    }
    public function setAffiliate_Link($affiliate_link) {
        $this->Affiliate_Link = $affiliate_link;
    }

    public function getProduct_Id() {
        return $this->Product_Id;
    }
    public function setProduct_Id($product_id) {
        $this->Product_Id = $product_id;
    }
    
    public function getPrice() {
        return $this->Price;
    }
    public function setPrice($price) {
        $this->Price = $price;
    }



}
     
?>



