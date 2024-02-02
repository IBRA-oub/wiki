<?php


require_once(__DIR__. '/../../Services/Interface/TagInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/TagImp.php');

$displaySearchTag = new TagImp();

$searchTag = $displaySearchTag->search($_GET['search']);

echo json_encode($searchTag);


?>