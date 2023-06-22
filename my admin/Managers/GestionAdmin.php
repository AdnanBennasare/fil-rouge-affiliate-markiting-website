<?php


define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '../Entities/admin.php');



class GestionAdmins {

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

    public function Ajouter($admin){

        $admin_Id = $admin->getId();
        $admin_Password = $admin->getPassword();
        $admin_Email = $admin->getEmail();
        $admin_Phone = $admin->getPhone();

        // requête SQL
        $sql = "INSERT INTO admin_panel(admin_Id, phone, email, password) 
                                VALUES('$admin_Id', '$admin_Phone', '$admin_Email', '$admin_Password')";

        mysqli_query($this->getConnection(), $sql);
    }

    public function Supprimer($id){
        $sql = "DELETE FROM admin_panel WHERE admin_Id = '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($admin_Id, $admin_Password, $admin_Email, $admin_Phone)
    {
        $sql = "UPDATE admin_panel SET admin_Id='$admin_Id', phone='$admin_Phone', email='$admin_Email', password='$admin_Password'
        WHERE admin_Id = $admin_Id";

        mysqli_query($this->getConnection(), $sql);

        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    
    public function RechercherTous() {
        $sql = 'SELECT admin_Id, phone, email, password FROM admin_panel';
        $query = mysqli_query($this->getConnection(), $sql);
        $admins_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
        $admins = array();
        foreach ($admins_data as $admin_data) {
            $admin = new admin();
            $admin->setId($admin_data['admin_Id']);
            $admin->setPhone($admin_data['phone']);
            $admin->setEmail($admin_data['email']);
            $admin->setPassword($admin_data['password']);

            array_push($admins, $admin);
        }
        return $admins;
    }


    public function RechercherParId($id){
        $sql = "SELECT * FROM admin_panel WHERE admin_Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $admins_data = mysqli_fetch_assoc($result);
        $admin = new admin();
        $admin->setId($admins_data['admin_Id']);
        $admin->setPhone($admins_data['phone']);
        $admin->setEmail($admins_data['email']);
        $admin->setPassword($admins_data['password']);


        return $admin;
    }


    public function getUserByCredentials($phone, $email) {
        $sql = "SELECT * FROM admin_panel WHERE phone = '$phone' OR email = '$email'";
        $result = mysqli_query($this->getConnection(), $sql);

        $users = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $user = array(
                'admin_Id' => $row['admin_Id'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'password' => $row['password'],
                // Add any other fields you want to retrieve
            );
    
            $users[] = $user;
        }

    
        return $users;
    }

    public function logingcheckPhone($phone) {
        $sql = "SELECT * FROM admin_panel WHERE phone = '$phone'";
        $result = mysqli_query($this->getConnection(), $sql);
        $users = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $user = array(
                'admin_Id' => $row['admin_Id'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'password' => $row['password'],
                // Add any other fields you want to retrieve
            );
    
            $users[] = $user;
        }

    
        return $users;
    }

   
    
}




?>