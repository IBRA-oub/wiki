<?php


require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');

$displayWiki = new WikiImp();

$WikiDatas = $displayWiki->displayWiki();


?>