<?php

require_once('../../Models/Tag.php');
require_once('../../Services/Interface/TagInterface.php');
require_once('../../Services/Implimentation/TagImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameTag= $_POST['nameTag'];
   

    try{
        
    $tag = new Tag($nameTag);
    
    $serviceTag = new TagImp();
    $serviceTag->addTag($tag);
    
    header('location:../../Views/adminDashboard/tag/displayTag.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}

?>