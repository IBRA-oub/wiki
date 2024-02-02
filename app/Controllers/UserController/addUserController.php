<?php
 session_start();
require_once('../../Models/User.php');
require_once('../../Services/Interface/UserInterface.php');
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

     // path for affichage
     $path = "../../../../public/uploads/";
     
     $pictureUser = $path .  $nomImage ;
    
   
    // ==============validation==============
    // Vérifier que tous les champs du formulaire sont remplis
    if (empty($fullName) || empty($username) || empty($email) || empty($password) || empty($nomImage)) {
        $_SESSION['error'] = "Veuillez remplir tous les champs du formulaire.";
        header('location: ../../Views/signUp.php');
        exit();
    }
    // //  Utiliser les regex pour valider les données
    // if (!preg_match('/^[a-zA-ZÀ-ÿ\s\'-]+$/', $fullName)) {
    //     $_SESSION['error1'] = "Le nom complet n'est pas valide.";
    //     header('location: ../../Views/signUp.php');
    //     exit();
    // }

    // if (!preg_match('/^[a-z0-9]{3,20}$/', $username)) {
    //     $_SESSION['error2'] = "Le nom d'utilisateur n'est pas valide.";
    //    header('location: ../../Views/signUp.php');
    //     exit();
    // }

    // if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email)) {
    //     $_SESSION['error3'] = "L'adresse e-mail n'est pas valide.";
    //    header('location: ../../Views/signUp.php');
    //     exit();
    // }

    
 

    try{
        
    $User = new User($fullName,$username,$email,$password,$pictureUser);
    
    $serviceUser = new UserImp();
    $serviceUser->addUser($User);
    
    header('location:../../Views/login.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}


?>