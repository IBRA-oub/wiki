<?php

require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idWiki = $_GET['idWiki'];
    
    $NonArchivedWiki = new WikiImp();
    $result = $NonArchivedWiki->NonArchivedWiki($idWiki);

    if($result){
        header('location:../../Views/adminDashboard/archive/archiveWiki.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}
?>