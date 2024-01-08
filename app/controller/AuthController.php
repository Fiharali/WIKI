<?php

namespace app\controller;


include __DIR__ . '/../../vendor/autoload.php';

use app\model\User;
use app\model\Annonce;

session_start();


class AuthController
{

    // public function landing(){

    //     $annonce = new Annonce(null, null,null,null,null,null);
    //      $annonces = $annonce->getAnnonces();
    //     include "../../views/client/landing.php";
    // }


    // public function Register()
    // {
    //     $email = $_POST['email'];
    //     $firstname = $_POST['firstname'];
    //     $lastname = $_POST['lastname'];
    //     $password = $_POST['password'];

    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $objuser = new User(null, $firstname, $lastname, $email, $password, null, null);
    //     $objuser->createUser();

    //     $_SESSION['email'] = $email;
    //     $_SESSION['firstname'] = $firstname;
    //     $_SESSION['lastname'] = $lastname;
    //     $_SESSION['password'] = $password;

    //     header('location:../login   ');
    // }


    // public function login()
    // {

    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     if (empty($email) || empty($password)) {
    //         echo "von avez pas enregistrer le nom et prenom";
    //     } else {
    //         $obj = new User(null, null, null, $email, $password, null, null);
    //         $data = $obj->getUserByUsername();
    //     }

    //     if (empty($data)) {
    //         echo "email not on data base";
    //     } elseif (password_verify($password, $data->password)) {

    //         $_SESSION['email'] = $email;
    //         $_SESSION['role'] = $data->role_name;
    //         $_SESSION['id'] = $data->id;
    //         if ($data->role_name == 'admin') {
    //             echo "admin";
    //         } elseif ($data->role_name == 'user') {
    //             echo "user";
    //             header('location: client/landing');
    //         } elseif ($data->role_name == 'seller') {
    //             echo "seller";
    //             header('location:../Profile');
    //         }
    //     }
    // }


    public static function AllUsers()
    {
        $allUsers = new User(null, null, null, null, null, null, null);
        return   $allUsers->getAllUsers();
    }
    public static function updateUser()
    {

        $id = $_POST['id'];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST['phone'];
        $profile = $_POST['profile'];
        $emailHiden = $_POST['emailHiden'];

        User::updateUser($id, $firstname, $lastname, $email, null, $phone, $profile, $emailHiden);
        header('location:../../Profile');
    }




    public  function showUserByEmail()
    {
        $email = $_SESSION['email'];
        $userModel = new User(null, null, null, $email, null, null, null);
        $user = $userModel->getUserByEmail($email)[0];
        include '../../views/client/sellerProfileEdit.php';
    }
    public  function deleteUser()
    {
        $id = $_GET["id"];
        $user = new User($id, null, null, null, null, null, null);
        $user->delete();
        header('location:../users');
    }


    public  function test()
    {
        echo "test";
        echo "<a href='/wiki2/user/client/landing'>test2</a>";
    }
    public  function test_test()
    {
        echo "test2";
        echo "<a href='/wiki2/user/client/detail/annonce'>test3</a>";
    }
    public  function test_test_test()
    {
        echo "<a href='/wiki2/user/client/landing'>test2</a>";
        echo "<a href='/'>test2</a>";
    }

    public function login(){
        include_once '../../views/auth/login.php';
        exit();
    }

    public function register(){
        include_once '../../views/auth/register.php';
        exit();
    }
}
