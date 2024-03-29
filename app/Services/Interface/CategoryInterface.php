<?php 
interface CategoryInterface
{
    public function addCategory(Category $category);
    public function displayCategory();
    public function updateCategory(Category $category);
    public function deleteCategory($id);
    public function displayLastCategory();
    public function fetchCategory($id);
    public function countCategory();
    public function search($string);
}
 
?>