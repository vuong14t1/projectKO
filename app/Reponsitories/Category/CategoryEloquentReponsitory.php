<?php 
namespace App\Reponsitories\Category;
use App\Repositories\EloquentRepository;
use App\Models\Category;
use App\Models\ActionNews;
use App\Models\News;
use App\Models\Exchange;
use App\Models\Project;
/**
 * 
 */
class CategoryEloquentReponsitory extends EloquentRepository implements CategoryInterface
{
	public function getModel(){
		return Category::class;
	}

	public function getParents(){
		return $this->model->where("parent_id", config('setting.parent_category'))->get();
	}

	public function getSubCategories($parent_id){
		return $this->model->findOrFail($parent_id)->getSubCategories();
	}

	public function getProduct($id, $paginate, $order = "id"){
		$cat = $this->model->findOrFail($id);

		if(count($cat->getActionNews()) > 0 ){
			return $cat->getActionNews()->paginate($paginate)->orderBy($order, "DESC");
		}
		else if(count($cat->getExchanges()) > 0 ){
			return $cat->getExchanges()->paginate($paginate)->orderBy($order, "DESC");
		}
		else if(count($cat->getNews()) > 0 ){
			return $cat->getNews()->paginate($paginate)->orderBy($order, "DESC");
		}
		else if(count($cat->getProjects()) > 0 ){
			return $cat->getProjects()->paginate($paginate)->orderBy($order, "DESC");
		}
		return;
	}

}
?>