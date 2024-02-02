<?php
 session_start();
require_once('../../Services/Interface/LoginInterface.php');
require_once('../../Services/Implimentation/LoginImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
     // Vérification si les champs sont vides

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Veuillez remplir tous les champs.';
            header('location:../../Views/login.php');
            exit();
        }
        
    $logincheck = new LoginImp();
    $row = $logincheck->fetch($username);
   
  
    if($row){
        
        if(password_verify($password, $row['password'])){

           
            $_SESSION['idUser'] = $row['idUser'];
            $_SESSION['role'] = $row['role'];
            
            if ($_SESSION['role'] == "admin") {
                header('location:../../Views/adminDashboard/dashboard/dashboard.php');
                exit();
            } else {
                header('location:../../Views/author/wiki/displayWiki.php');
                // var_dump($roleRow['roleName']);
                exit();
            }
            
        }else{
            
            $_SESSION['error'] = 'Mot de passe incorrect.';
            header('location:../../Views/login.php');
            exit();
        }
    }else{
       
        $_SESSION['error'] = 'Nom d\'utilisateur incorrect.';
        header('location:../../Views/login.php');
        exit();
    }
    
}

?>