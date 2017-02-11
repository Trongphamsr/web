<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\cate;
use App\Http\Requests\product_request;
use Input;
class product_controller extends Controller
{
    public function getAdd(){

        $cate= cate::select('id', 'name', 'parent_id')->get()->toArray();
        // là lơi hiển thị form
        return view('admin.product.add', compact('cate'));
    }

    public function postAdd(product_request $product_request){
        // hàm lấy tấm hình ra
        $file = $product_request->file('fImages'); //->getClientOriginalExtension();
        $file_name = $file->getClientOriginalName(); //->getClientOriginalExtension();
        /*$product= new product();
        $product->name= $product_request->txtName;
        $product->alias= $product_request->txtName;
        $product->price= $product_request->txtPrice;
        $product->intro= $product_request->txtIntro;
        $product->content= $product_request->txtContent;
        $product->image= $file_name;
        $product->keywords= $product_request->txtKeyword;
        $product->description= $product_request->txtDescription;
        $product->user_id= 1;
        $product->cate_id= $product_request->sltParent;
        $product_request->file('fImages')->move('resources/upload/', $file_name);
        $product->save();
		$product_id= $product->id;
		*/
		if(Input::hasFile('fProductdetail')){
			print_r(Input::file('fProductdetail'));
		}
    }
}
