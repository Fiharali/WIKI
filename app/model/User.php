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
    public  function getUserByEmail($email)
    {
        $sql = "SELECT users.*, roles.name as role FROM users
        LEFT JOIN roles ON users.role_id = roles.id
        WHERE users.email = :email";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        if ($statement) {
            $statement->execute();
            $resultInstances = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $resultInstances;
            } else {
                return null;
            }
        }

    

    public function createUser()
    {

        $query = "INSERT INTO `users` (firstname, lastname, email, password,role_id) VALUES (?, ?, ?, ?,3 )";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(1, $this->firstname);
        $stmt->bindParam(2, $this->lastname);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->password);
        $stmt->execute();

    }

    public static function getAllUsers()
    {
        $sql = "SELECT users.*, roles.name as rolename FROM users
        LEFT JOIN roles ON users.role_id = roles.id";
        $db = Connection::getInstence()->getConnect();
        $statement = $db->prepare($sql);
        if ($statement) {
            $statement->execute();
            $resultInstances = $statement->fetchAll(PDO::FETCH_OBJ);
            return $resultInstances;
            // if ($resultInstances) {
            //     $users = [];
            //     foreach ($resultInstances as $key => $result) {
            //         $userInstance = new User($result['id'], $result['firstname'], $result['lastname'],
            //             $result['email'], $result['password'], $result['phone'], $result['profile']);
            //         $users[] = $userInstance;
            //     }
            //     return $users;
            // } else {
            //     return null;
            // }
        }
    }
    public static function updateUser($id,$firstname , $lastname,$email , $password , $phone , $profile,$emailHiden)
    {
        $db = Connection::getInstence()->getConnect();
        $select = "SELECT * FROM users WHERE email = ?";
        $statemnt2 = $db->prepare($select);
        $statemnt2->execute([$emailHiden]);
        $userInfo = $statemnt2->fetchAll(PDO::FETCH_ASSOC);
        $idUser = $userInfo[0]['id'];
        $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password,
            phone = :phone, profile = :profile WHERE id = :idUser";
        $statemnt = $db->prepare($sql);
        $statemnt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $statemnt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $statemnt->bindParam(':email', $email, PDO::PARAM_STR);
        $statemnt->bindParam(':password', $password, PDO::PARAM_STR);
        $statemnt->bindParam(':phone', $phone, PDO::PARAM_INT);
        $statemnt->bindParam(':profile', $profile, PDO::PARAM_INT);
        $statemnt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $statemnt->execute();
        $_SESSION['email']=$email;
    }

    public function delete()
    {

        $stmt = $this->db->prepare("delete from users  where id = ? ");
        $stmt->execute([$this->id]);

    }

    public function getUserByUsername(){ 
        $sql="SELECT u.*, r.name AS role_name FROM users as u
        INNER JOIN roles as r ON r.id = u.role_id WHERE u.email =? ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->email]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        // $stmt->closeCursor();
        return $row;
        
    }


}

