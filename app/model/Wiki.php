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
    private $wiki_id;
    private $tag_id;
   

    public function __construct($id=null, $title=null, $content=null, $status=null, $photo=null,$category_id=null,$writer=null,$wiki_id=null,$tag_id=null)
    {
        $this->db = Connection::getInstence()->getConnect();
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->photo = $photo;
        $this->category_id = $category_id;
        $this->writer = $writer;
        $this->wiki_id = $wiki_id;
        $this->tag_id = $tag_id;
     
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

    public function getWikiId(){
        return $this->wiki_id ;
    }
    public function getTagId(){
        return $this->tag_id ;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    public function setWriter($writer){
        $this->writer = $writer;
    }

    public function setWikiId($wiki_id){
        $this->wiki_id=$wiki_id ;
    }
    public function setTagId($tag_id){
        $this->tag_id=$tag_id ;
    }

    public function createWiki()
    {
        $stmt = $this->db->prepare("INSERT INTO wikis(title,content,status,photo,category_id,writer)  VALUES (?,?,?,?,?,?)");
        $stmt->execute([$this->title,$this->content,$this->status,$this->photo,$this->category_id,$this->writer]);

        $lastInsertWikiId = $this->db->lastInsertId();
        return $lastInsertWikiId;
       
    }

    public function addWikiTags()
    {
        $stmt = $this->db->prepare("INSERT INTO wiki_tags(wiki_id,tag_id)  VALUES (?,?)");
        $stmt->execute([$this->wiki_id,$this->tag_id]);
        
       
    }

    public function getWikiById(){
        $stmt = $this->db->prepare("SELECT wikis.*,users.name as 'username' , categories.name ,categories.id as 'category', GROUP_CONCAT(tags.name) AS tagNames FROM wikis INNER JOIN categories ON wikis.category_id = categories.id LEFT JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id LEFT JOIN tags ON wiki_tags.tag_id = tags.id INNER JOIN users on users.id = wikis.writer  WHERE wikis.id = ? GROUP BY wikis.id");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function getWikis()
    {
        $stmt = $this->db->prepare("select wikis.*,users.name as 'writer',categories.name as 'category' from wikis INNER JOIN users on wikis.writer = users.id INNER JOIN categories on wikis.category_id= categories.id where wikis.status = 'approve' ORDER by id desc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getUserWikis()
    {
        $stmt = $this->db->prepare("select wikis.* ,users.name as 'writer',categories.name as 'category' from wikis INNER JOIN users on wikis.writer = users.id INNER JOIN categories on wikis.category_id= categories.id where wikis.status = 'approve' and users.id= ?");
        $stmt->execute([$this->id]);
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
        $stmt->execute([$this->id]);
    }

    public function archive(){
        $stmt = $this->db->prepare("update wikis set status ='pending' where id =?");
        $stmt->execute([$this->id]);
    }

    public function restore(){
        $stmt = $this->db->prepare("update wikis set status ='approve' where id =?");
        $stmt->execute([$this->id]);
    }


    public function search(){
        $stmt = $this->db->prepare("SELECT wikis.*, users.name as 'writer', tags.name as 'tags', categories.name as 'category' FROM wikis INNER JOIN users ON wikis.writer = users.id INNER JOIN categories ON wikis.category_id = categories.id INNER JOIN wiki_tags ON wiki_tags.wiki_id = wikis.id INNER JOIN tags ON tags.id = wiki_tags.tag_id WHERE wikis.status = 'approve' AND ? LIKE ? ORDER BY id DESC");
        $result = $stmt->execute([$this->title, "%$this->content%"]);
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}