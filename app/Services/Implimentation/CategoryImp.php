<?php

require_once('../../config/DataBase.php');
require_once('../../Models/Category.php');
require_once(dirname(dirname(__FILE__)) .'/Interface/CategoryInterface.php');

class CategoryImp extends DataBase implements CategoryInterface{


    public function addCategory(Category $category){
        $pdo = $this->connection();
        
      
        $nameCategory = $category->getNameCategory();
        $description = $category->getDescription();
        $pictureCategory =$category ->getPictureCategory();
      

        $sql = "INSERT INTO category (nameCategory,description,pictureCategory) VALUES (:nameCategory,:description,:pictureCategory);";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nameCategory',$nameCategory);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':pictureCategory',$pictureCategory);
       

        $stmt->execute();
    }
    public function displayCategory(){
        $pdo = $this->connection();

        $sql = "SELECT * FROM category";
        
        $data = $pdo->query($sql);
        $categoryData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $categoryData;
    }
    public function updateCategory(Category $category){
        $pdo = $this->connection();
        
        $idCategory = $category->getIdCategory();
        $nameCategory = $category->getNameCategory();
        $description = $category->getDescription();
        $pictureCategory =$category ->getPictureCategory();
      

        $sql = "UPDATE category SET nameCategory = :nameCategory, description = :description,pictureCategory = :pictureCategory   WHERE idCategory = :idCategory";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nameCategory',$nameCategory);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':pictureCategory',$pictureCategory);
        $stmt->bindParam(':idCategory',$idCategory);
       

        $stmt->execute();
    }
    public function deleteCategory($id){
        $pdo = $this->connection();
       
        $sql = "DELETE FROM category WHERE idCategory = :id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
       
        $DeletCategory= $stmt->execute();
        return  $DeletCategory;
    }
    public function fetchCategory($id){
        $pdo = $this->connection();

        $sql = "SELECT * FROM category WHERE idCategory = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
        $fetchCategory = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchCategory;
    }
}






?>