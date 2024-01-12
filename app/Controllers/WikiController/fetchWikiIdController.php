<?php

require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idWiki = $_GET['idWiki'];
    
    $fetchdWiki = new WikiImp();
    $WikiDataFetch = $fetchdWiki->fetchWikiId($idWiki);
    // var_dump($WikiDataFetch);
   
    if(!$WikiDataFetch){
        
        echo "<script> alert('Data not found');</script>";

    }
}
?>