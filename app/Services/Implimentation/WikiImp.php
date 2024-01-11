<?php

require_once(__DIR__.'/../../config/DataBase.php');
require_once(__DIR__.'/../../Models/Wiki.php');
// require_once(__DIR__.'/../../Models/TagOfWiki.php');
require_once(dirname(dirname(__FILE__)) .'/Interface/WikiInterface.php');

class WikiImp extends DataBase implements WikiInterface{
    public function addWiki(Wiki $wiki,array $tagIds){
        $pdo = $this->connection();

        $title = $wiki->getTitle();
        $content = $wiki->getContent();
        $summarize = $wiki->getSummarize();
        $dateCreated = $wiki->getDateCreated();
        $dateModified = $wiki->getDateModified();
        
        $pictureWiki = $wiki->getPictureWiki();
        $idCategory = $wiki->getIdCategory();
        $idUser = $wiki->getIdUser();

        $sql = "INSERT INTO wiki (title, content, summarize, dateCreated, dateModified, archived, pictureWiki, idCategory, idUser) 
                VALUES (:title, :content, :summarize, :dateCreated, :dateModified, '0', :pictureWiki, :idCategory, :idUser);";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':summarize', $summarize);
        $stmt->bindParam(':dateCreated', $dateCreated);
        $stmt->bindParam(':dateModified', $dateModified);
       
        $stmt->bindParam(':pictureWiki', $pictureWiki);
        $stmt->bindParam(':idCategory', $idCategory);
        $stmt->bindParam(':idUser', $idUser);

        $stmt->execute();

        // Get the ID of the inserted wiki
      $wikiId = $pdo->lastInsertId();
     
    // Insert into 'tagOfWiki' table for each tag
       foreach ($tagIds as $tagId) {
        $sqlTagOfWiki = "INSERT INTO tagofwiki (idTag, idWiki) VALUES (:idTag, :idWiki);";
        $stmtTagOfWiki = $pdo->prepare($sqlTagOfWiki);
        $stmtTagOfWiki->bindParam(':idWiki', $wikiId);
        $stmtTagOfWiki->bindParam(':idTag', $tagId);
        
        $stmtTagOfWiki->execute();
    }
    
    }
    public function displayWiki(){
        $pdo = $this->connection();

        $sql = "SELECT * FROM wiki";
        
        $data = $pdo->query($sql);
        $wikiData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $wikiData;
    }
    public function updateWiki(Wiki $wiki, array $tagIds)
    {
        $pdo = $this->connection();
    
        $idWiki = $wiki->getIdWiki();
        $title = $wiki->getTitle();
        $content = $wiki->getContent();
        $summarize = $wiki->getSummarize();
        $dateModified = $wiki->getDateModified();
        $pictureWiki = $wiki->getPictureWiki();
        $idCategory = $wiki->getIdCategory();
        $idUser = $wiki->getIdUser();
    
        // Mettez à jour les informations principales du wiki
        $sqlUpdateWiki = "UPDATE wiki SET title = :title,  content = :content, summarize = :summarize,  dateModified = :dateModified, archived = '0',  pictureWiki = :pictureWiki, 
                              idCategory = :idCategory,  idUser = :idUser WHERE idWiki = :idWiki";

        $stmtUpdateWiki = $pdo->prepare($sqlUpdateWiki);
    
        $stmtUpdateWiki->bindParam(':title', $title);
        $stmtUpdateWiki->bindParam(':content', $content);
        $stmtUpdateWiki->bindParam(':summarize', $summarize);
        $stmtUpdateWiki->bindParam(':dateModified', $dateModified);
        $stmtUpdateWiki->bindParam(':pictureWiki', $pictureWiki);
        $stmtUpdateWiki->bindParam(':idCategory', $idCategory);
        $stmtUpdateWiki->bindParam(':idUser', $idUser);
        $stmtUpdateWiki->bindParam(':idWiki', $idWiki);
    
        $stmtUpdateWiki->execute();
    
        // Supprimer tous les tags associés à ce wiki
        $sqlDeleteTags = "DELETE FROM tagofwiki WHERE idWiki = :idWiki";
        $stmtDeleteTags = $pdo->prepare($sqlDeleteTags);
        $stmtDeleteTags->bindParam(':idWiki', $idWiki);
        $stmtDeleteTags->execute();
    
        // Réinsérer les tags mis à jour
        foreach ($tagIds as $tagId) {
            $sqlTagOfWiki = "INSERT INTO tagofwiki (idTag, idWiki) VALUES (:idTag, :idWiki)";
            $stmtTagOfWiki = $pdo->prepare($sqlTagOfWiki);
            $stmtTagOfWiki->bindParam(':idWiki', $idWiki);
            $stmtTagOfWiki->bindParam(':idTag', $tagId);
    
            $stmtTagOfWiki->execute();
        }
    }
    
    public function deleteWiki($id){
        $pdo = $this->connection();
       
        $sql = "DELETE FROM wiki WHERE idWiki = :id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
       
        $DeletWiki= $stmt->execute();
        return  $DeletWiki;
    }
    public function fetchWiki($id){}
}