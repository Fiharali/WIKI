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
            echo "error";
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

        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $status = $_POST['status'];
        $photo = $_POST['photo'];
        $category_id = $_POST['category_id'];
        $writer = $_POST['writer'];
        $tag = new Wiki($id, $title, $content, $status, $photo, $category_id, $writer);

        $tag->createWiki();
    }

    public function delete()
    {
        $id = $_GET["id"];
        $wiki = new Wiki($id);
        $wiki->deleteWiki();
        header('location:../Tag');
    }

    public function getWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wiki($id);
        $cat = $wiki->getWikiById();
        require_once '../../views/admin/TagEdit.php';
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
}
