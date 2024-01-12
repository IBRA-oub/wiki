<?php

require_once(__DIR__ .'/../../Services/Interface/UserInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/UserImp.php');

$countUser = new UserImp();

$countUserData = $countUser->countUser();

?>