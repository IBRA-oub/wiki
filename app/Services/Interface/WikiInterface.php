<?php 
interface WikiInterface
{
public function addWiki(Wiki $wiki, array $tagIds);
public function displayWiki();
public function updateWiki(Wiki $wiki, array $tagIds);
public function deleteWiki($id);
public function fetchWiki($id);
}
?>