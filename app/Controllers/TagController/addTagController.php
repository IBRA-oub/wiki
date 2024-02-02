<?php
session_start();
require_once('../../Models/Tag.php');
require_once('../../Services/Interface/TagInterface.php');
require_once('../../Services/Implimentation/TagImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameTag= $_POST['nameTag'];
   
    if (empty($nameTag)) {
        $_SESSION['error'] = "Veuillez remplir tous les champs du formulaire.";
        header('location:../../Views/adminDashboard/tag/addTag.php');
        exit();
    }

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