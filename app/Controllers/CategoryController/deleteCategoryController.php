<?php

require_once(__DIR__. '/../../Services/Interface/CategoryInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/CategoryImp.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idCategory = $_GET['idCategory'];
    
    $deleteCategory = new CategoryImp();
    $result = $deleteCategory->deleteCategory($idCategory);

    if($result){
        header('location:../../Views/adminDashboard/category/displayCategory.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}





?>