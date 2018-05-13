<?php 
namespace App\Reponsitores;
interface ReponsitoryInterface{
	public function getAll($columns = ['*']);
	public function find($id, $columns = ['*']);
	public function paginate($limits = null, $columns = ['*']);
	public function create(array $attributes);
	public function update($id, array $attributes);
	public function delette($id);
}


?>