<?php

namespace app\controller;


include __DIR__ . '/../../vendor/autoload.php';

use  app\model\Tag;

session_start();

class TagController
{

    public function addTag()
    {

        require_once '../../views/admin/addTag.php';
    }
    public function add()
    {

        $name = $_POST['name'];
        $tag = new Tag();
        $tag->setName($name);
        $tag->createTag();
        header('location:../Tag');
    }
    public function getAll()
    {
        $tag = new Tag();
        $categories = $tag->getTags();
        require_once '../../views/admin/Tag.php';
    }

    public function update()
    {

        $id = $_POST['id'];
        $name = $_POST['name'];

        if (empty($name)) {
            $_SESSION['error_name'] = "Name Tag is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['error_name'] = "Name must be at least 3 characters";
        } else {
            $_SESSION['error_name'] = "";
        }
        $tag = new Tag($id, $name);
        // $row = $tag->getTagById($id);
        // if($row){
        $tag->updateTag();
        // }
        header('location:../Tag');
    }

    public function delete()
    {
        $id = $_GET["id"];
        $tag = new Tag($id);
        $tag->deleteTag();
        header('location:../Tag');
    }

    public function getTag()
    {
        $id = $_GET['id'];
        $tag = new Tag($id);
        $cat = $tag->getTagById();
        require_once '../../views/admin/TagEdit.php';
    }
}
