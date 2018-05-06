<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'parent_id',
        'name'    
    ];

    protected $appends = ['numberOfProduct'];

    public function actionNews()
    {
        return $this->hasMany(ActionNews::class);
    }

    public function exchanges()
    {
        return $this->hasMany(Exchange::class);   
    }

    public function News()
    {
        return $this->hasMany(News::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
