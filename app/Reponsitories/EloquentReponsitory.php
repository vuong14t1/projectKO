<?php 
namespace App\Repositories;

	abstract class EloquentReponsitory implements ReponsitoryInterface
	{
		protected $model;

		function __construct()
		{
			$this->setModel();
		}

		abstract public function getModel();

		public function setModel()
		{
			$this->model = app()->make(
				$this->getModel()
			);
		}

		public function getAll($columns = ['*'])
		{
			return $this->model->all($columns);
		}

		public function find($id, $columns = ['*'])
		{
			if($id == null) return;
			return $this->model->find($id, $columns);
		}

		public function paginate($limits = null, $columns = ['*'])
		{
			$_limits = $limits ? $limits : config('setting.paginate');
			return $this->paginate($_limits, $columns); 
		}

		public function create(array $attributes)
		{
			return $this->model->create($attributes);
		}

		public function update($id, array $attributes)
		{
			return $this->where('id', $id)->update($attributes);
		}

		public function delete($id)
		{
			return $this->model->delete($id);
		}
	}

	?>