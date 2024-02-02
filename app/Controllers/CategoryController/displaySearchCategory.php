<?php


require_once(__DIR__. '/../../Services/Interface/CategoryInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/CategoryImp.php');

$displaySearchCategory = new CategoryImp();

$searchCategory = $displaySearchCategory->search($_GET['search']);

echo json_encode($searchCategory);


?>