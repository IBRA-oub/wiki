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
                VALUES (:title, :content, :summarize, :dateCreated, :dateModified, 0, :pictureWiki, :idCategory, :idUser);";

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
    public function displayWiki(){}
    public function updateWiki(Wiki $wiki){}
    public function deleteWiki($id){}
    public function fetchWiki($id){}
}