<?php


require_once(__DIR__. '/../../Services/Interface/TagInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/TagImp.php');

$countTag = new TagImp();

$countTagData = $countTag->countTag();


?>