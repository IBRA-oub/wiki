<?php

require_once('../../Models/Tag.php');
require_once('../../Services/Interface/TagInterface.php');
require_once('../../Services/Implimentation/TagImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $idTag = $_POST['idTag'];
    $nameTag = $_POST['nameTag'];
   

    try{
        
    $tag = new Tag($nameTag);
    $tag->setIdTag($idTag);
    
    $serviceTag = new TagImp();
    $serviceTag->updateTag($tag);
    
    header('location:../../Views/adminDashboard/tag/displayTag.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}
?>