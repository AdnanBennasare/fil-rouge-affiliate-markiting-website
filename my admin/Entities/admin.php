<?php

class Admin{
    private $Id;
   
    private $Phone;

    private $Email;

    private $Password;




    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }


    public function getPhone() {
        return $this->Phone;
    }
    public function setPhone($phone) {
        $this->Phone = $phone;
    }

    public function getEmail() {
        return $this->Email;
    }
    public function setEmail($email) {
        $this->Email = $email;
    }

    public function getPassword() {
        return $this->Password;
    }
    public function setPassword($password) {
        $this->Password = $password;
    }
}
     
?>
