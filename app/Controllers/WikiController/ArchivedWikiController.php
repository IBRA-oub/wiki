<?php

require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idWiki = $_GET['idWiki'];
    
    $archivedWiki = new WikiImp();
    $result = $archivedWiki->ArchivedWiki($idWiki);

    if($result){
        header('location:../../Views/adminDashboard/wiki/displayWiki.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}
?>