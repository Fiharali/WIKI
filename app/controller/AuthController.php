<?php

namespace app\controller;

include __DIR__ . '/../../vendor/autoload.php';

use app\model\User;

session_start();











class AuthController
{

    
    public function registerPage()
    {
        include_once '../../views/auth/register.php';
    }
    public function loginPage()
    {
        include_once '../../views/auth/login.php';
    }

    public function register()
    {

        extract($_POST);

        if (empty($name)) {
            $_SESSION['name'] = "Name is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['name'] = "Name must be at least 3 characters";
        } else {
            $_SESSION['name'] = "";
        }

        if (empty($email)) {
            $_SESSION['email'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email'] = "email must be valid";
        } else {
            $_SESSION['email'] = "";
        }

        if (empty($password)) {
            $_SESSION['password'] = "password is required";
        } elseif (strlen($password) < 7) {
            $_SESSION['password'] = "password  must be >= 8";
        } else {
            $_SESSION['password'] = "";
        }

        if ($password != $confirm_password) {
            $_SESSION['confirm_password'] = "password doesn't match";
        } else {
            $_SESSION['confirm_password'] = "";
        }

        $checkUser = new User();
        $checkUser->setEmail($email);
        $check = $checkUser->UserByGmail();
        if ($check) {
            $_SESSION['email'] = "email exist ";
        }


        if (empty($_SESSION['name']) &&  empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['confirm_password'])) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user = new User();
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRoleId(2);
            $lastInsertId = $user->createUser();
            $_SESSION['username'] = $name;
            $_SESSION['isAdmin'] = false;
            $_SESSION['id'] = $lastInsertId;
            header('location:../wiki2');
        }



        // echo $_SESSION['username'] . $_SESSION['isAdmin'] . $_SESSION['id'];

        header('location:register');
    }


    public function login()
    {

        extract($_POST);


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




        if (empty($_SESSION['email']) &&  empty($_SESSION['password'])) {
            $checkUser = new User();
            $checkUser->setEmail($email);
            $checkUser->setPassword($password);
            $check = $checkUser->UserByGmail();
            if ($check) {
                if (password_verify($password, $check->password)) {
                    $_SESSION['username'] = $check->name;
                    $_SESSION['id'] = $check->id;
                    if ($check->rolename == "admin") {
                        $_SESSION['isAdmin'] = true;
                        header('location:tag');
                    } else {
                        $_SESSION['isAdmin'] = false;
                        header('location:../wiki2');
                    }
                } else {
                    $_SESSION['password'] = "password is incorrect";
                    header('location:login');
                }
            } else {
                $_SESSION['email'] = " this email  not exist ";
                header('location:login');
            }
        } else {
            header('location:login');
        }
    }

    public function AllUsers()
    {
        $allUsers = new User();
        $users = $allUsers->getUsers();
        require_once '../../views/admin/users.php';
    }

    public function delete()
    {
        $id = $_GET["id"];
        $user = new User($id);
        $user->delete();
        header('location:users');
    }

    public function getUser()
    {
        $id = $_GET["id"];
        $user = new User($id);
        $user = $user->UserById();
        require_once '../../views/admin/userEdit.php';
    }

    public function update()
    {

        $id = htmlspecialchars(trim($_POST['id']));
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $role = htmlspecialchars(trim($_POST['role']));





        if (empty($name)) {
            $_SESSION['error_name'] = "Name  is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['error_name'] = "Name must be at least 3 characters";
        } else {
            $_SESSION['error_name'] = "";
        }

        if (empty($email)) {
            $_SESSION['error_email'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_email'] = "email must be valid";
        } else {
            $_SESSION['error_email'] = "";
        }

        if (empty($role)) {
            $_SESSION['error_role'] = "role  is required";
        }


        if (empty($_SESSION['error_name']) &&  empty($_SESSION['error_email']) && empty($_SESSION['error_role'])) {

            $user = new User($id, $name, $email, null, $role);
            $user->updateUsers();
            header('location:users');

        } else {
            header("location:edit-user?id=$id");
        }
    }

    public function logout(){
    session_destroy();
    header('location:../wiki2');


    }

    
}
