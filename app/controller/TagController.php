<?php

namespace app\controller;


include __DIR__ . '/../../vendor/autoload.php';

use  app\model\Tag;

session_start();

class TagController
{

    public function tag()
    {
        $tag = new Tag();
        $tags = $tag->getTags();
        require_once '../../views/admin/tags.php';
    }
    public function add()
    {

        $name = htmlspecialchars(trim($_POST['tagName']));


        if (empty($name)) {
            $_SESSION['error_tagName'] = "Name Tag is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['error_tagName'] = "Name tag  must be at least 3 characters";
        } else {
            $_SESSION['error_tagName'] = "";
            $tag = new Tag();
            $tag->setName($name);
            $tag->createTag();
        }

        header('location:tag');
    }
    public function getAll()
    {
        $tag = new Tag();
        $tags = $tag->getTags();
        require_once '../../views/admin/tags.php';
    }

    public function update()
    {

        $id = htmlspecialchars(trim($_POST['id']));
        $name = htmlspecialchars(trim($_POST['tagName']));



        // if (empty($name)) {
        //     $_SESSION['error_name'] = "Name Tag is required";
        // } elseif (strlen($name) < 3) {
        //     $_SESSION['error_name'] = "Name must be at least 3 characters";
        // } else {
        //     $_SESSION['error_name'] = "";
        // }
        $tags = new Tag($id, $name);
        // $row = $tag->getTagById($id);
        // if($row){
        $tags->updateTag();
        // }
        header('location:tag');
    }

    public function delete()
    {
        $id = $_GET["id"];
        $tag = new Tag($id);
        $tag->deleteTag();
        header('location:tag');
    }

    public function getTag()
    {
        $id = $_GET['id'];
        $tag = new Tag($id);
        $tags = $tag->getTags();
        $oneTag = $tag->getTagById();
        require_once '../../views/admin/tags.php';
    }
}
