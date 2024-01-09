<?php

require_once('../../Models/User.php');

require_once('../../Services/Implimentation/UserImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $nomImage = $_FILES['pictureUser']['name'];
    $tmpImage = $_FILES['pictureUser']['tmp_name'];
    
    $path = "../../../public/uploads/";
    
    $pictureUser = $path .  $nomImage ;
    
    //for checking if the image was uploaded
    $result = move_uploaded_file($tmpImage , $pictureUser);

    try{
        
    $User = new User($fullName,$username,$email,$password,$pictureUser);
    
    $serviceUser = new UserImp();
    $serviceUser->addUser($User);
    
    header('location:../../Views/author/wiki/displayWiki.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}


?>