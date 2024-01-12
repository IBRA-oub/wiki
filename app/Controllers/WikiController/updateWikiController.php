<?php
session_start();

require_once(__DIR__. '../../../Models/Wiki.php');
require_once(__DIR__.'../../../Models/Tag.php');
require_once(__DIR__.'../../../Services/Interface/WikiInterface.php');
require_once(__DIR__.'../../../Services/Implimentation/WikiImp.php');
require_once(__DIR__.'../../../Services/Interface/TagInterface.php');
require_once(__DIR__.'../../../Services/Implimentation/TagImp.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Récupérer id de wiki a mise a jour
     $idWiki = $_POST['idWiki'];
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $summarize = $_POST['sammurize'];
    $content = $_POST['content'];
    $idCategory = $_POST['idCategory'];
    // session for user Id
     $idUser = $_SESSION['idUser'];
 
     
    // Récupérer les tags sélectionnés
    $tagIds = isset($_POST['selectedTags']) ? $_POST['selectedTags'] : [];
    
// ==============================images ===================
    // Récupérer l'image téléchargée
    $nomImage = $_FILES['pictureWiki']['name'];
    $tmpImage = $_FILES['pictureWiki']['tmp_name'];
    
    // path for insert into base de donnes
    $path = "../../../public/uploads/";
    
    $pictureWiki = $path .  $nomImage ;
    
    //for checking if the image was uploaded
    $result = move_uploaded_file($tmpImage , $pictureWiki);

    // path for affichage
    $path = "../../../../public/uploads/";
    
    $pictureWiki = $path .  $nomImage ;

    // ===============================image end========================

    $date = new WikiImp();
    $dateCreat = $date->fetchWiki( $idWiki);
    
    try {
        // Créer une instance de Wiki avec les données du formulaire
        $wiki = new Wiki($title, $content, $summarize, $dateCreat['$dateCreat'], date('Y-m-d H:i:s'),$pictureWiki, $idCategory, $idUser);
        $wiki->setIdWiki($idWiki);
        
       
        // Insérer le wiki avec ses tags
        $wikiService = new WikiImp();
        $wikiService->updateWiki($wiki, $tagIds);
        
      

        // Rediriger vers la page appropriée
        header('location: ../../Views/author/wiki/displayWiki.php');

    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>