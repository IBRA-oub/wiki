<?php


require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');

$displayLastWiki = new WikiImp();

$WikiDatas = $displayLastWiki->displayLastWiki();


?>