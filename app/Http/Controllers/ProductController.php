<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
	/**
	 * Redirect home
	 * @return illuminate/Http/View
	 */
	public function index(){
		$products = json_decode(file_get_contents(public_path() . '/products.json'));
		return view('products',compact('products'));
	}

    /**
     * Store Product in
     * @param  Request $request 
     * @return void
     */
    public function store(Request $request){
    	$this->validate($request,[
    		'product_name' => 'required|min:3|max:255',
    		'quantity_in_stock' => 'required|numeric',
    		'price_per_item' => 'required|numeric',
    	]);

    	$products = json_decode(file_get_contents(public_path() . '/products.json'));
     	//Take only form fields from the request
    	$product = $request->only("product_name","quantity_in_stock","price_per_item");

    	$today = now()->toDateString();

     	//Add today in product array
    	array_push($product, $today);
     	 //push new product into existing products array
    	array_push($products, $product);
    	//Save products into json file
    	File::put('products.json', json_encode($products));


    	return back()->with('success','Product created successfully!');
    }
}
