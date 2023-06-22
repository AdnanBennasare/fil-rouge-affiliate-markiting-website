<?php
 define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '../Entities/Link.php');

class GestionLinks{
    private $Connection = Null;

    private function getConnection(){
        if(is_null($this->Connection)){
            $this->Connection = mysqli_connect('localhost', 'root', '', 'affiliateconnect');
            // Vérifier l'ouverture de la connexion avec la base de données
            if(!$this->Connection){
                $message =  'Erreur de connexion: ' . mysqli_connect_error(); 
                throw new Exception($message); 
            }
        }
        
        return $this->Connection;
        
    }


    public function Modifier($affiliate_id,$affiliate_name,$affiliate_link,$Price)
    {
        // Requête SQL
        $sql = "UPDATE affiliate SET 
        affiliate_name='$affiliate_name', affiliate_link='$affiliate_link', Price='$Price'
        WHERE affiliate_id='$affiliate_id'";

        mysqli_query($this->getConnection(), $sql);

        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    
    public function RechercherTous(){
        $sql = 'SELECT affiliate_id, affiliate_name, affiliate_link, Price, Product_Id FROM affiliate';
        $query = mysqli_query($this->getConnection() ,$sql);
        $affiliates_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $affiliates = array();
        foreach ($affiliates_data as $affiliate_data) {
            $affiliate = new link();
            $affiliate->setAffiliate_Id($affiliate_data['affiliate_id']);
            $affiliate->setAffiliate_Name($affiliate_data['affiliate_name']);
            $affiliate->setAffiliate_Link($affiliate_data['affiliate_link']);
            $affiliate->setPrice($affiliate_data['Price']);
            $affiliate->setProduct_Id($affiliate_data['Product_Id']);

            array_push($affiliates, $affiliate);
        }
        return $affiliates;
    }
    
    public function RechercherParId($affiliate_id){
        $sql = "SELECT * FROM affiliate WHERE affiliate_id= $affiliate_id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $affiliate_data = mysqli_fetch_assoc($result);
        $affiliate = new link();
        $affiliate->setAffiliate_Id($affiliate_data['affiliate_id']);
        $affiliate->setAffiliate_Name($affiliate_data['affiliate_name']);
        $affiliate->setAffiliate_Link($affiliate_data['affiliate_link']);
        $affiliate->setPrice($affiliate_data['Price']);

        
        return $affiliate;
    }


    public function AjouterAffiliateToProduct($affiliate){
        
        $affiliate_name = $affiliate->getAffiliate_Name();
        $product_id = $affiliate->getProduct_Id();
        $affiliate_link = $affiliate->getAffiliate_Link();
        $Price = $affiliate->getPrice();
    
        // requête SQL
        $sql = "INSERT INTO affiliate(affiliate_name, Product_Id, affiliate_link, Price) 
                                VALUES('$affiliate_name', '$product_id', '$affiliate_link', '$Price')";
    
        mysqli_query($this->getConnection(), $sql);
    }
    
    public function Supprimer($affiliate_id){
        $sql = "DELETE FROM affiliate WHERE affiliate_id= '$affiliate_id'";
        mysqli_query($this->getConnection(), $sql);
    }


    public function GetAfilliates() {
        $sql = 'SELECT COUNT(*) AS Afilliates_count FROM affiliate';
        $query = mysqli_query($this->getConnection(), $sql);
        
        if (!$query) {
            throw new Exception("Error executing query: " . mysqli_error($this->getConnection()));
        }
        
        $result = mysqli_fetch_assoc($query);
        $Afilliates = $result['Afilliates_count'];

        mysqli_free_result($query);

        return $Afilliates;
    }

    
}




?>