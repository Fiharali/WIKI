<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;


class Wiki
{

    private $db;
    private $id;
    private $title;
    private $content;
    private $status;
    private $photo;
    private $category_id;
    private $writer;
   

    public function __construct($id=null, $title=null, $content=null, $status=null, $photo=null,$category_id=null,$writer=null)
    {
        $this->db = Connection::getInstence()->getConnect();
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->photo = $photo;
        $this->category_id = $category_id;
        $this->writer = $writer;
     
    }

    public function getId(){
        return $this->id ;
    }
    public function getTitle(){
        return $this->title ;
    }
    public function getContent(){
        return $this->content ;
    }
    public function getStatus(){
        return $this->status ;
    }
    public function getPhoto(){
        return $this->photo ;
    }
    public function getCategoryId(){
        return $this->category_id ;
    }
    public function getWriter(){
        return $this->writer ;
    }
    
    public function setTitle($title){
        $this->title = $title;
    }
    public function setContent($content){
        $this->title = $content;
    }
    public function setStatus($status){
        $this->title = $status;
    }
    public function setPhoto($photo){
        $this->title = $photo;
    }
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    public function setWriter($writer){
        $this->writer = $writer;
    }

    public function createWiki()
    {
        $stmt = $this->db->prepare("INSERT INTO wikis(title,content,status,photo,category_id,writer)  VALUES (?,?,?,?,?,?)");
        $stmt->execute([$this->title,$this->content,$this->status,$this->photo,$this->category_id,$this->writer]);
       
    }

    public function getWikiById(){
        $stmt = $this->db->prepare("SELECT * from wikis where id =?");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function getWikis()
    {
        $stmt = $this->db->prepare("select wikis.*,users.name as 'writer',categories.name as 'category' from wikis INNER JOIN users on wikis.writer = users.id INNER JOIN categories on wikis.category_id= categories.id where wikis.status = 'approve'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getWikisArchived()
    {
        $stmt = $this->db->prepare("select wikis.*,users.name as 'writer',categories.name as 'category' from wikis INNER JOIN users on wikis.writer = users.id INNER JOIN categories on wikis.category_id= categories.id where wikis.status = 'pending'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function updateWiki(){

        $stmt = $this->db->prepare("UPDATE wikis  set  title = ? ,content=?,status=? , photo=?, category_id=? , writer=?   where id= ?");
        $stmt->execute([$this->title,$this->content,$this->status,$this->photo,$this->category_id,$this->writer,$this->id]);

    }

    public function deleteWiki(){
        $stmt = $this->db->prepare("DELETE from wikis where id=?");
        $stmt->execute($this->id);
    }

    public function archive(){
        $stmt = $this->db->prepare("update wikis set status ='pending' where id =?");
        $stmt->execute([$this->id]);
    }

    public function restore(){
        $stmt = $this->db->prepare("update wikis set status ='approve' where id =?");
        $stmt->execute([$this->id]);
    }
}