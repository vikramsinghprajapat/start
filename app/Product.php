<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    public function insertProduct($name,$catid,$description,$image,$qty,$price){
    	$product = new Product;
        $product->name = $name;
        $product->category_id = $catid;
        $product->description = $description;
        $product->image = $image;
        $product->quantity = $qty;
        $product->price = $price;
        if($product->save()){
        	return true;	
        }else{
        	return false;
        }
    }
    
    public function getProductList($start,$limit, $catFilter){
    
        if( $catFilter !="" &&  $catFilter!= 'null'){
            return $product = Product::select('products.id','products.name','products.description','products.image','products.quantity','products.price','products.created_at','categories.name AS categoryname')
            ->orWhere('categories.name', 'like', '%' . $catFilter . '%')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->offset($start)->limit($limit)->get();   

        }else{
          return $product = Product::select('products.id','products.name','products.description','products.image','products.quantity','products.price','products.created_at','categories.name AS categoryname')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->offset($start)->limit($limit)->get();  
        }
        
    }
}
