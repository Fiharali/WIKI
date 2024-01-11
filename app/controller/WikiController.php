<?php

namespace app\controller;


include __DIR__ . '/../../vendor/autoload.php';

use  app\model\Wiki;
use  app\model\Category;
use  app\model\Tag;

session_start();

class WikiController
{

    // public function test()
    // {
    //     include_once '../../views/admin/index.php';
    // }


    public function addWiki()
    {

        require_once '../../views/admin/addTag.php';
    }
    public function add()
    {
        try {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $status = 'approve';
            $category_id = $_POST['category'];
            $writer = $_SESSION['id'];

            $file_name = $_FILES['photo']['name'];
            $file_temp = $_FILES['photo']['tmp_name'];
            $upload_image = "../../public/img/" . $file_name;
            move_uploaded_file($file_temp, $upload_image);

            $wiki = new Wiki(null, $title, $content, $status, $file_name, $category_id, $writer);
            $lastInsertWikiId = $wiki->createWiki();


            foreach ($_POST['tags'] as  $tag) {
                $wiki->setWikiId($lastInsertWikiId);
                $wiki->setTagId($tag);
                $wiki->addWikiTags();
            }

            header('location:../wiki2');
        } catch (\Throwable $th) {
            echo "error all champs are require ";
        }
    }
    public function getAll()
    {
        $wiki = new Wiki();
        $wikis = $wiki->getWikis();
        require_once '../../views/admin/wiki.php';
    }

    public function update()
    {

        try {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $status = 'approve';
        $category_id = $_POST['category'];
        $writer = $_SESSION['id'];

        $file_name = $_FILES['photo']['name'];
        $file_temp = $_FILES['photo']['tmp_name'];
        $upload_image = "../../public/img/" . $file_name;
        move_uploaded_file($file_temp, $upload_image);
        $wiki = new Wiki($id, $title, $content, $status, $file_name, $category_id, $writer);
        $wiki->updateWiki();


        foreach ($_POST['tags'] as  $tag) {
            $wiki->setWikiId($id);
            $wiki->setTagId($tag);
            $wiki->addWikiTags();
        }

        header("location:../wiki2");
        } catch (\Throwable $th) {
            echo "error all champs are require ";
        }
        
    }

    public function delete()
    {
        $id = $_GET["id"];
        $wiki = new Wiki($id);
        $wiki->deleteWiki();
        header('location:../wiki2');
    }

    public function getWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wiki($id);
        $category = new Category();
        $categories = $category->getCategories();
        $tag = new Tag();
        $tags = $tag->getTags();
        $wiki = $wiki->getWikiById();
        require_once '../../views/client/wiki.php';
    }

    public function archivedWiki()
    {
        $wiki = new Wiki();
        $wikisArchived = $wiki->getWikisArchived();
        require_once '../../views/admin/wikiArchived.php';
    }

    public function restoredWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wiki($id);
        $wiki->restore();
        header('location:wiki');
    }

    public function archiveWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wiki($id);
        $wiki->archive();
        header('location:wiki');
    }


    public function home()
    {

        $category = new Category();
        $categories = $category->getCategories();
        $tag = new Tag();
        $tags = $tag->getTags();
        $wiki = new Wiki();
        $wikis = $wiki->getWikis();
        if (isset($_SESSION['id'])) {
            $wiki->setId($_SESSION['id']);
            $userWikis = $wiki->getUserWikis();
        }
        include_once '../../views/client/index.php';
    }

    public function searchWiki()
    {
        // echo $_GET["select"].'   '.$_GET["input"];

        $wiki = new Wiki();
        // $wiki->setTitle($_GET["select"]);
        $wiki->setContent($_GET["input"]);
        $wikis = json_encode($wiki->search($_GET["select"]));
        // echo $wikis;
        // header('Content-Type: application/json');
        echo $wikis;
        // var_dump(json_encode($wikis));
    }
}
