<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;

class CategoryController extends Controller
{
	
    public function addCategory(Request $request)
    {
    	$request->validate([
		    'name' => 'required|unique:categories'
		]);
		if (isset($request->validator) && $request->validator->fails()) {
		    return response()->json($request->validator->errors(), 400);
		}
		$cat =  new Category;
		$name = $request->get('name');
		$insert = $cat->insertCategory($name);
		if($insert == true){
			return response()->json(['status'=>'true','message' => "Category Created Successfully"],201);
		}else if($insert == false){
			return response()->json(['status'=>'false','message' => "Category Not Created"],400);
		}else{
			return response()->json(['status'=>'false','message' => "Category Not Created"],400);
		}
    }

    public function categoryList(){
    	$cat =  new Category;
    	$categoryList = array();
    	$response = array();
    	$data =$cat->getCategoryList();
    	if(count($data) > 0){
	    	foreach ($data as $key => $cat) {
	    		$response['id'] = $cat->id;
	    		$response['name'] = $cat->name;
	    		array_push($categoryList, $response);
	    	}
			return response()->json(['status'=>'true','categorylist' =>$categoryList],200);
		}else if(count($data) == 0){
			return response()->json(['status'=>'false','message' => "No record Found"],400);
		}else{
			return response()->json(['status'=>'false','message' => "No record Found"],400);
		}
    }
}
