<?php

require_once('../../Models/Category.php');
require_once('../../Services/Interface/CategoryInterface.php');
require_once('../../Services/Implimentation/CategoryImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameCategory= $_POST['nameCategory'];
    $description = $_POST['description'];
    $nomImage = $_FILES['pictureCategory']['name'];
    $tmpImage = $_FILES['pictureCategory']['tmp_name'];
    
    // path for insert into base de donnes
    $path = "../../../public/uploads/";
    
    $pictureCategory = $path .  $nomImage ;
    
    //for checking if the image was uploaded
    $result = move_uploaded_file($tmpImage , $pictureCategory);

    // path for affichage
    $path = "../../../../public/uploads/";
    
    $pictureCategory = $path .  $nomImage ;

    try{
        
    $Category = new Category($nameCategory,$description,$pictureCategory);
    
    $serviceCategory = new CategoryImp();
    $serviceCategory->addCategory($Category);
    
    header('location:../../Views/adminDashboard/category/displayCategory.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}