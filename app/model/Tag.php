<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;


class Tag
{

    private $db;
    private $id;
    private $name;

    public function __construct($id=null, $name=null)
    {
        $this->db = Connection::getInstence()->getConnect();
        $this->id = $id;
        $this->name = $name;
     
    }

    public function getId(){
        return $this->id ;
    }
    public function getName(){
        return $this->name ;
    }
    public function setId($id){
        $this->id = $id ;
    }
    public function setName($name){
        $this->name = $name ;
    }

    public function createTag()
    {
        $stmt = $this->db->prepare("INSERT INTO tags(name)  VALUES (?)");
        $stmt->execute([$this->name]);
       
    }

    public function getTagById(){
        $stmt = $this->db->prepare("SELECT * from tags where id =?");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function getTags()
    {
        $stmt = $this->db->prepare("SELECT * from  tags");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function updateTag(){

        $stmt = $this->db->prepare("    UPDATE tags  set  name = ?  where id= ?");
        $stmt->execute([$this->id,$this->name]);
    }

    public function deleteTag(){
        $stmt = $this->db->prepare("DELETE from tags where id=?");
        $stmt->execute([$this->id]);
    }
}