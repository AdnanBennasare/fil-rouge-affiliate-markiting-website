<?php

require_once(__DIR__.'/../Entities/Product.php');
require_once(__DIR__.'/../Entities/Link.php');



class GestionProduct
{

    private $Connection = Null;
// ------ DATABASE CONNECTION ------

    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'affiliateconnect');
            // Vérifier l'ouverture de la connexion avec la base de données
            if (!$this->Connection) {
                $message = 'Erreur de connexion: ' . mysqli_connect_error();
                throw new Exception($message);
            }
        }

        return $this->Connection;

    }

    
// Get the Category Details that the type belows to
    public function getCategoryDetails($typeId) {
        $query = "
            SELECT c.Category_ID, c.Category_Name
            FROM products p
            JOIN type t ON p.Type_Id = t.Type_Id
            JOIN category c ON t.Category_ID = c.Category_ID
            WHERE p.Type_Id = $typeId
        ";
    
        $result = mysqli_query($this->getConnection(), $query);
    
        if (!$result) {
            throw new Exception("Error retrieving category details: " . mysqli_error($this->getConnection()));
        }
    
        $row = mysqli_fetch_assoc($result);
    
        if (!$row) {
            throw new Exception("Type not found with ID: $typeId");
        }
    
        return $row;
    }





// get all Product in a specific type
    public function getProductsByType($typeId) {
        $sql = "SELECT * FROM Products 
                INNER JOIN Type ON Products.Type_Id = Type.Type_Id 
                INNER JOIN category ON Type.Category_ID = category.Category_ID 
                WHERE Type.Type_Id = '$typeId'";
        
        $result = mysqli_query($this->getConnection(), $sql);
    
        $products = array();
    
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        $result->close();
    
        return $products;
    }




//  get all Product in a specific category

    public function getProductsByCategory($categoryId) {
        // Assuming you have an established mysqli connection
    
        $sql = "SELECT * FROM Products 
                INNER JOIN Type ON Products.Type_Id = Type.Type_Id 
                INNER JOIN category ON Type.Category_ID = category.Category_ID 
                WHERE category.Category_ID = '$categoryId'";
    

    $result = mysqli_query($this->getConnection(), $sql);
    
        $products = array();

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        $result->close();
    
        return $products;
    }



//  get one Product from each type in a specific category

    public function getOneProductPerType($categoryId) {
        // Assuming you have an established mysqli connection
    
    
        $sql = "SELECT * FROM Products 
                INNER JOIN Type ON Products.Type_Id = Type.Type_Id 
                INNER JOIN category ON Type.Category_ID = category.Category_ID 
                WHERE category.Category_ID = '$categoryId'
                GROUP BY Type.Type_Id";
    

    $result = mysqli_query($this->getConnection(), $sql);

    
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        $result->close();
    
        return $products;
    }
    





// ------ AJOUTER ------

    public function Ajouter($product)
    {
        $name = $product->getName(); 
        $brand = $product->getBrand();   
        $image_url = $product->getImage_URL();      
        $date_added = $product->getDate_Added();              
        $tag = $product->getTag(); 
        $bottom_Line = $product->getBottom_Line(); 
        $pros = $product->getPROS(); 
        $cons = $product->getCONS(); 
        $typeid = $product->getTypeID(); 
        

        // requête SQL
        $sql = "INSERT INTO products(Product_Name, Brand, Image_URL, Date_Added, Tag, Bottom_Line, PROS, CONS, Type_Id) 
                                VALUES('$name', '$brand', '$image_url', '$date_added', '$tag', '$bottom_Line', '$pros', '$cons', '$typeid')";

        mysqli_query($this->getConnection(), $sql);
    }



// ------ SUPRIMMER ------

    public function Supprimer($id)
    {
        $sql_tasks = "DELETE FROM products WHERE Product_Id = '$id'";
        mysqli_query($this->getConnection(), $sql_tasks);
    }

// ------ MODIFICATION ------
    public function Modifier($id, $newTypeId, $newCategoryId, $name, $brand, $image_url, $date_added, $tag, $bottom_Line, $pros, $cons)
    {

        $stmt = "UPDATE Products SET Type_Id = $newTypeId WHERE Product_Id = $id";
        mysqli_query($this->getConnection(), $stmt);

        $query = "UPDATE Type SET Category_ID = $newCategoryId WHERE Type_Id = $newTypeId";
        mysqli_query($this->getConnection(), $query);


        $sql = "UPDATE products SET 
        Product_Name='$name', Brand='$brand', Brand='$brand', Image_URL='$image_url', Date_Added='$date_added', Tag='$tag', Bottom_Line='$bottom_Line',
         PROS='$pros', CONS='$cons'
        WHERE Product_Id= $id";

        //  
        mysqli_query($this->getConnection(), $sql);

        //
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }


// ------ RECHERCHERTOUS ------
    public function RechercherTous()
    {
        $sql = 'SELECT Product_Id, Product_Name, Brand, Image_URL, Date_Added, Tag, Bottom_Line, PROS, CONS, Type_Id FROM products';
        $query = mysqli_query($this->getConnection(), $sql);
        $products_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $products = array();
        foreach ($products_data as $product_data) {
            $product = new Product();
            $product->setId($product_data['Product_Id']);
            $product->setName($product_data['Product_Name']);
            $product->setTag($product_data['Tag']);
            $product->setBrand($product_data['Brand']);
            $product->setImage_URL($product_data['Image_URL']);
            $product->setDate_Added($product_data['Date_Added']);
            $product->setBottom_Line($product_data['Bottom_Line']);
            $product->setPROS($product_data['PROS']);
            $product->setCONS($product_data['CONS']);
            $product->setTypeID($product_data['Type_Id']);


            array_push($products, $product);

        }
        return $products;
    }

// ------ RECHERCHERTOUS ------



    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM products WHERE Product_Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $product_data = mysqli_fetch_assoc($result);
        $product = new Product();
            $product->setId($product_data['Product_Id']);
            $product->setName($product_data['Product_Name']);
            $product->setTag($product_data['Tag']);
            $product->setBrand($product_data['Brand']);
            $product->setImage_URL($product_data['Image_URL']);
            $product->setDate_Added($product_data['Date_Added']);
            $product->setBottom_Line($product_data['Bottom_Line']);
            $product->setPROS($product_data['PROS']);
            $product->setCONS($product_data['CONS']);
            $product->setTypeID($product_data['Type_Id']);
           

        return $product;
    }
    public function Getallaffiliateslinks($affiliate_id) {
        $sql = "SELECT * FROM affiliate WHERE Product_Id = $affiliate_id";
        $result = mysqli_query($this->getConnection(), $sql);
    
        $links = []; // Create an empty array to store the link objects
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($affiliate_data = mysqli_fetch_assoc($result)) {
                $affiliate = new link();
                $affiliate->setAffiliate_Id($affiliate_data['affiliate_id']);
                $affiliate->setAffiliate_Name($affiliate_data['affiliate_name']);
                $affiliate->setAffiliate_Link($affiliate_data['affiliate_link']);
                $affiliate->setPrice($affiliate_data['Price']);             
                $affiliate->setProduct_Id($affiliate_data['Product_Id']);
                $links[] = $affiliate; // Add the link object to the array
            }
        }
    
        return $links;
    }
    

    public function searchProducts($filterValue) {
        // Build the SQL query based on the filter value
        $sql = "SELECT Products.Product_Id, Products.Product_Name, Products.Bottom_Line, Products.Type_Id, Products.Image_URL
                FROM Products
                INNER JOIN Type ON Products.Type_Id = Type.Type_Id
                WHERE Products.Product_Name LIKE '%$filterValue%'
                OR Type.Type_Name LIKE '%$filterValue%'";
    
        // Execute the SQL query and fetch the results
        $results = mysqli_query($this->getConnection(), $sql);
    
        // Generate the product list array
        $productList = array();
        while ($row = mysqli_fetch_assoc($results)) {
            $productId = $row['Product_Id'];
            $productName = $row['Product_Name'];
            $bottomLine = $row['Bottom_Line'];
            $typeId = $row['Type_Id'];
            $Image_URL = $row['Image_URL'];
    
            // Create a product array with the fetched data
            $product = array(
                'Product_Id' => $productId,
                'Product_Name' => $productName,
                'Bottom_Line' => $bottomLine,
                'Type_Id' => $typeId,
                'Image_URL' => $Image_URL
            );
    
            // Add the product to the product list array
            $productList[] = $product;
        }
    
        // Return the product list array
        return $productList;
    }




    public function GetProductCount($table) {
        $sql = "SELECT COUNT(*) AS product_count FROM `$table`";
        $query = mysqli_query($this->getConnection(), $sql);
        
        if (!$query) {
            throw new Exception("Error executing query: " . mysqli_error($this->getConnection()));
        }
        
        $result = mysqli_fetch_assoc($query);
        $productCount = $result['product_count'];
    
        mysqli_free_result($query);
    
        return $productCount;
    }
    

 

    
}

?>
