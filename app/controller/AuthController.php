<?php

namespace app\controller;

include __DIR__ . '/../../vendor/autoload.php';

use app\model\User;

session_start();











class AuthController
{



    public function Register($name, $email, $password, $confirm_password)
    {
        // return  $this->check($email);
        // session_start();

        // if (empty($name)) {
        //     $_SESSION['name'] = "Name is required";
        // } elseif (strlen($name) < 3) {
        //     $_SESSION['name'] = "Name must be at least 3 characters";
        // } else {
        //     $_SESSION['name'] = "";
        // }
        // if (empty($email)) {
        //     $_SESSION['email'] = "email is required";
        // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $_SESSION['email'] = "email must be valid";
        // } else {
        //     $_SESSION['email'] = "";
        // }

        // if (empty($password)) {
        //     $_SESSION['password'] = "password is required";
        // } elseif (strlen($password) < 7) {
        //     $_SESSION['password'] = "password  must be >= 8";
        // } else {
        //     $_SESSION['password'] = "";
        // }
        // if ($password != $confirm_password) {
        //     $_SESSION['confirm_password'] = "password doesn't match";
        // } else {
        //     $_SESSION['confirm_password'] = "";
        // }
        // $checkUser = new User(null, $email, null);
        // $check = $checkUser->CheckUser();
        // if (count($check)  > 0) {
        //     $_SESSION['email'] = "email exist ";
        // }


        // if (empty($_SESSION['name']) &&  empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['confirm_password'])) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user = new User();
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);
            if ($user->UsersByGmail()) {
                $user->createUser();
            }

            // $lastInsertId=$checkUser->createUser();
            // $_SESSION['username'] = $name;
            // $_SESSION['isAdmin'] = false;
            // $_SESSION['id'] = $lastInsertId;
            // header("location:../../views/client/home/index.php");
            // exit();
        // } else {
        //     header("location:../../views/auth/register.php");
        //     exit();
        // }
    }


    public function login($email, $password)
    {

        if (empty($email)) {
            $_SESSION['email'] = "email is required";
        } else {
            $_SESSION['email'] = "";
        }

        if (empty($password)) {
            $_SESSION['password'] = "password is required";
        } else {
            $_SESSION['password'] = "";
        }


        $checkUser = new User();
        $checkUser->setEmail($email);
        $checkUser->setPassword($password);
        if ($checkUser->UsersByGmail()) {

        }

        // if (empty($_SESSION['email']) &&  empty($_SESSION['password'])) {
        //     // $checkUser = new User(null, $email, $password);
        //     // $check = $checkUser->CheckUser();
        //     if (count($check)  > 0) {
        //         $user = $check[0];
        //         if (password_verify($password, $user["password"])) {
        //             // header("location:../../views/produit/index.php");
        //             //    var_dump( $user["name"]);
        //             $_SESSION['username'] = $user["firstName"];
        //             $_SESSION['id'] = $user["id"];
        //             if ($user["name"] == "admin") {
        //                 $_SESSION['isAdmin'] = true;
        //                 header("location:../../views/admin/books/index.php");
        //             } else {
        //                 $_SESSION['isAdmin'] = false;
        //                 header("location:../../views/client/home/index.php");
        //             }
        //         } else {
        //             $_SESSION['password'] = "password is incorrect";
        //             header("location:../../views/auth/login.php");
        //         }
        //     } else {
        //         $_SESSION['email'] = "email  doesn't exist ";
        //         header("location:../../views/auth/login.php");
        //     }
        // } else {
        //     header("location:../../views/auth/login.php");
        //     exit();
        // }
    }

    public function AllUsers()
    {
        $allUsers = new User();
        return   $allUsers->getUsers();
    }

    public function update(){

        // $id=$_POST['id'];
        // $name=$_POST['name'];
        // $name=$_POST['name'];
        // $name=$_POST['name'];
        // $name=$_POST['name'];
        // $name=$_POST['name'];

        // if (empty($name)) {
        //     $_SESSION['error_name'] = "Name category is required";
        // } elseif (strlen($name) < 3) {
        //     $_SESSION['error_name'] = "Name must be at least 3 characters";
        // } else {
        //     $_SESSION['error_name'] = "";
        // }
        $category= new user($id,$name);
        // $row = $category->getCategoryById($id);
        // if($row){
            // $category->updateCategory();
        // }
        header('location:../category');
        
    }

//     <?php
// session_start();
// $_SESSION[ 'username' ] = '';
// $_SESSION[ 'id' ] = '';
// $_SESSION[ 'isAdmin' ] = '';
// unset($_SESSION['username']);
// unset($_SESSION['id']);
// unset($_SESSION['isAdmin']);
// session_destroy();
// header('Location:../../views/auth/login.php');
// ?
}





