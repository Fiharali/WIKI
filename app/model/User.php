<?php

namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;

class User
{

    private $db;
    private $id;
    private $name;
    private $role_id;
    private $email;
    private $password;
    private $profile;

    public function getRoleId()
    {
        return $this->role_id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getProfile()
    {
        return $this->profile;
    }

    public function setRoleId($role_id)
    {
         $this->role_id=$role_id;
    }
    public function setName($name)
    {
         $this->name=$name;
    }
    public function setEmail($email)
    {
         $this->email=$email;
    }
    public function setPassword($password)
    {
         $this->password=$password;
    }
    public function setProfile($profile)
    {
         $this->profile=$profile;
    }

    public function __construct($id=null, $name=null, $email=null, $password=null, $role_id=null, $profile=null)
    {
        $this->db = Connection::getInstence()->getConnect();
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = $role_id;
        $this->profile = $profile;
    }


    public function createUser()
    {

        $query = "INSERT INTO `users` (name, email, password,profile,role_id) VALUES (?, ?, ?, ?, ? )";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name, $this->email, $this->password, $this->profile, $this->role_id]);
    }

    public function getUsers()
    {
        $query = "SELECT users.*, roles.name as rolename FROM users  inner JOIN roles ON users.role_id = roles.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateUsers()
    {
        $query = "update users set name = ? , email=?, role_id=? , profile=? where id = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name, $this->email, $this->role_id, $this->profile, $this->id]);

    }

    public function UsersByGmail()
    {
        $query = "select * from users where email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->email]);
        return  $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function delete()
    {

        $stmt = $this->db->prepare("delete from users  where id = ? ");
        $stmt->execute([$this->id]);
    }
}
