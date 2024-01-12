<?php

require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idCategory = $_GET['idCategory'];
    
    $fetchdWikiCategory = new WikiImp();
    $WikiCategoryDataFetch = $fetchdWikiCategory->fetchWikiCategory($idCategory);
    // var_dump($WikiDataFetch);
   
    if(!$WikiCategoryDataFetch){
        
        echo "<script> alert('Data not found');</script>";

    }
}
?>