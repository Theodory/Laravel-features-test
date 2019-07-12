<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
	/**
	 * Redirect home
	 * @return illuminate/Http/View
	 */
    public function index(){
    	$products = json_decode(file_get_contents(public_path() . '/products.json'));

    	//dd($products);
    	return view('products');
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

     	//Take only form fields from the request
     	$product = $request->only("product_name","quantity_in_stock","price_per_item");

     	$today = $mytime = now()->toDateString();

     	//Add today in product array
     	 array_push($product, $today);
     	 $product = json_encode($product);
     	\File::put('products.json', $product);


    	return back();
    }
}
