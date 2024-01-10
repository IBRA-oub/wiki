<?php


require_once(__DIR__. '/../../Services/Interface/TagInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/TagImp.php');

$displayTag = new TagImp();

$TagDatas = $displayTag->displayTag();

?>