<?php

namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;
use PDO;

class User
{

    private $db;
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $phone;
    private $profile;

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getProfile()
    {
        return $this->profile;
    }

    public function __construct($id, $firstname, $lastname, $email, $password, $phone, $profile)
    {
        $this->db = Connection::getInstence()->getConnect();
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->profile = $profile;
    }
  

    

 

 
   

    public function delete()
    {

        $stmt = $this->db->prepare("delete from users  where id = ? ");
        $stmt->execute([$this->id]);

    }

   


}

