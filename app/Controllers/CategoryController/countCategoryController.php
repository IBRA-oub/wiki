<?php


require_once(__DIR__. '/../../Services/Interface/CategoryInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/CategoryImp.php');

$countCategory = new CategoryImp();

$countCategoryData = $countCategory->countCategory();


?>