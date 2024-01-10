<?php


require_once('../../Services/Interface/TagInterface.php');
require_once('../../Services/Implimentation/TagImp.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idTag = $_GET['idTag'];
    
    $deleteTag= new TagImp();
    $result = $deleteTag->deleteTag($idTag);

    if($result){
        header('location:../../Views/adminDashboard/tag/displayTag.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}