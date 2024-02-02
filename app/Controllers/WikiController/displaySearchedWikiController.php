<?php


require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');

$displaySearchedWiki = new WikiImp();

$WikiDatas = $displaySearchedWiki->search($_GET['search']);

echo json_encode($WikiDatas);


?>