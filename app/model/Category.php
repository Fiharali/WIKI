<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;


class Category
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

    public function createCategory()
    {
        $stmt = $this->db->prepare("INSERT INTO categories(name)  VALUES (?)");
        $stmt->execute([$this->name]);
       
    }

    public function getCategoryById(){
        $stmt = $this->db->prepare("SELECT * from categories where id =?");
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT * from  categories");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function updateCategory(){

        $stmt = $this->db->prepare("UPDATE categories  set  name = ?  where id= ?");
        $stmt->execute([$this->name,$this->id]);
    }

    public function deleteCategory(){
        $stmt = $this->db->prepare("DELETE from categories where id=?");
        $stmt->execute([$this->id]);
    }
}