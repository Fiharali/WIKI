<?php

namespace app\controller;


include __DIR__ . '/../../vendor/autoload.php';

use  app\model\Category;

session_start();

class CategoryController
{

    public function category()
    {
        $cat = new Category();
        $cats = $cat->getCategories();
        require_once '../../views/admin/category.php';
    }
    public function add()
    {

        $name = htmlspecialchars(trim($_POST['categoryName']));

        if (empty($name)) {
            $_SESSION['error_categoryName'] = "Name category is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['error_categoryName'] = "Name category must be at least 3 characters";
        } else {
            $_SESSION['error_categoryName'] = "";
            $category = new Category();
            $category->setName($name);
            $category->createCategory();
        }
        header('location:category');
    }
    public function getAll()
    {
        $category = new Category();
        $categories = $category->getCategories();
        require_once '../../views/admin/category.php';
    }

    public function update()
    {

        $id = htmlspecialchars(trim($_POST['id']));
        $name = htmlspecialchars(trim($_POST['categoryName']));

        if (empty($name)) {
            $_SESSION['error_categoryName'] = "Name category is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['error_categoryName'] = "Name category must be at least 3 characters";
        } else {
            $_SESSION['error_categoryName'] = "";
            $category = new Category($id, $name);
            $category->updateCategory();
        }

        header('location:category');
    }

    public function delete()
    {
        $id = $_GET["id"];
        $category = new Category($id);
        $category->deleteCategory();
        header('location:category');
    }

    public function getCategory()
    {
        $id = $_GET['id'];
        $category = new Category($id);
        $cats = $category->getCategories();
        $oneCategory = $category->getCategoryById();
        require_once '../../views/admin/category.php';
    }
}
