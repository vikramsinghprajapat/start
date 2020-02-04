<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function insertCategory($name)
    {
    	$category = new Category;
        $category->name = $name;
        if($category->save()){
        	return true;	
        }else{
        	return false;
        }
    }

    public function getCategoryList(){
    	return Category::all();
    }
}
