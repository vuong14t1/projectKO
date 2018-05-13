<?php 
namespace App\Reponsitories\Category;

interface CategoryInterface {
	public function getParents();
	public function getSubCategories($parent_id);
	public function getProduct($id, $paginate, $order = "id");	
}

 ?>
