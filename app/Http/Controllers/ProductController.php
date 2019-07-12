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
     		'quantity_in_stock' => 'required|digits:3|min:3|max:255',
     		'price_per_item' => 'required|digits:3|min:3|max:255',
     	]);



    	return back();
    }
}
