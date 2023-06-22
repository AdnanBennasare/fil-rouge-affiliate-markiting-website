<?php


define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entities/User.php');



class GestionUsers {

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


    public function Ajouter($user){

        $User_Email = $user->getEmail();
        // requête SQL
        $sql = "INSERT INTO user(User_Email) 
                                VALUES('$User_Email')";

        mysqli_query($this->getConnection(), $sql);
    }




    public function Supprimer($id){
        $sql = "DELETE FROM user WHERE User_Id = '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($User_Id,$User_Email)
    {
        $sql = "UPDATE user SET User_Email='$User_Email'
        WHERE User_Id= $User_Id";

        mysqli_query($this->getConnection(), $sql);

        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }


    public function RechercherTous(){
        $sql = 'SELECT User_Id, User_Email FROM user';
        $query = mysqli_query($this->getConnection() ,$sql);
        $users_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $users = array();
        foreach ($users_data as $user_data) {
            $user = new user();
            $user->setId($user_data['User_Id']);
            $user->setEmail($user_data['User_Email']);
            array_push($users, $user);
        }
        return $users;
    }

   

    public function RechercherParId($id){
        $sql = "SELECT * FROM user WHERE User_Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $users_data = mysqli_fetch_assoc($result);
        $user = new user();
        $user->setId($users_data['User_Id']);
        $user->setEmail($users_data['User_Email']);
        
        return $user;
    }


    public function GetSubscription() {
        $sql = 'SELECT COUNT(*) AS Subscription_count FROM user';
        $query = mysqli_query($this->getConnection(), $sql);
        
        if (!$query) {
            throw new Exception("Error executing query: " . mysqli_error($this->getConnection()));
        }
        
        $result = mysqli_fetch_assoc($query);
        $Subscription = $result['Subscription_count'];

        mysqli_free_result($query);

        return $Subscription;
    }

    
}




?>