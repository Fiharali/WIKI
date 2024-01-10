<?php

namespace app\controller;


include __DIR__ . '/../../vendor/autoload.php';

use  app\model\Wiki;
use  app\model\Category;

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

        $title = $_POST['title'];
        $content = $_POST['content'];
        $status = $_POST['status'];
        $photo = $_POST['photo'];
        $category_id = $_POST['category_id'];
        $writer = $_POST['writer'];
        $tag = new Wiki();
        $tag->setTitle($title);
        $tag->setContent($content);
        $tag->setStatus($status);
        $tag->setPhoto($photo);
        $tag->setCategoryId($category_id);
        $tag->setWriter($writer);
        $tag->createWiki();
        // header('location:../Tag');
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
        include_once '../../views/client/index.php';
    }
}
