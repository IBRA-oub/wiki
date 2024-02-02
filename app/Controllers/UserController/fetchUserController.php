<?php

require_once(__DIR__ .'/../../Services/Interface/UserInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/UserImp.php');

$idUser = $_SESSION['idUser'];
$fetchUser =  new UserImp();

$fetchUserData = $fetchUser->fetchUser($idUser);
?>