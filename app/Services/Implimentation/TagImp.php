<?php

require_once(__DIR__.'/../../config/DataBase.php');
require_once(__DIR__.'/../../Models/Tag.php');
require_once(dirname(dirname(__FILE__)) .'/Interface/TagInterface.php');

class TagImp extends DataBase implements TagInterface{
    
    public function addTag(Tag $tag){
        $pdo = $this->connection();
        
      
        $nameTag = $tag->getNameTag();
        
        $sql = "INSERT INTO tag (nameTag) VALUES (:nameTag);";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nameTag',$nameTag);

        $stmt->execute();
    }
    public function displayTag(){
        $pdo = $this->connection();

        $sql = "SELECT * FROM tag";
        
        $data = $pdo->query($sql);
        $tagData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $tagData;
        
    }
    public function updateTag(Tag $tag){
        $pdo = $this->connection();
        
        $idTag = $tag->getIdTag();
        $nameTag = $tag->getNameTag();
      

        $sql = "UPDATE tag SET nameTag = :nameTag   WHERE idTag = :idTag";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':idTag',$idTag);
        $stmt->bindParam(':nameTag',$nameTag);

        $stmt->execute();
        
    }
    public function deleteTag($id){
        $pdo = $this->connection();
       
        $sql = "DELETE FROM tag WHERE idTag = :id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
       
        $DeletTag= $stmt->execute();
        return  $DeletTag;
    }
    public function fetchTag($idTag){
        $pdo = $this->connection();

        $sql = "SELECT * FROM tag WHERE idTag = :idTag";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idTag',$idTag);
        
        $stmt->execute();
        $fetchTag = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchTag;
    }

    public function countTag(){
        $pdo = $this->connection();

        $sql = "SELECT count(*) AS count FROM tag";
        
        $data = $pdo->query($sql);
        $countTag = $data->fetch(PDO::FETCH_ASSOC);

        return  $countTag;
    }
    public function search($string){
        $string = '%'.$string.'%';
        $pdo = $this->connection();

        $sql = "SELECT * FROM tag WHERE nameTag LIKE :string ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':string', $string);
        
        $stmt->execute();
        $fetchTag = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return  $fetchTag;
    }
}



?>