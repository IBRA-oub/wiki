<?php
session_start();

require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');

$displayWiki = new WikiImp();
$idUser = $_SESSION['idUser'];
$WikiDatas = $displayWiki->fetchWiki($idUser);


?>