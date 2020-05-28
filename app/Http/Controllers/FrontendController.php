<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class FrontendController extends Controller
{
    //
    public function index($value='')
    {
    	$categories = Category::all();
    	$items = Item::all();
    	return view('frontend.index', compact('categories','items'));
    }
    public function product($value='')
    {
    	$categories = Category::all();
    	$items = Item::all();
    	return view('frontend.product',compact('categories','items'));
    }
    public function productDetail($id)
    {
    	$item = Item::find($id);
    	return view('frontend.product_detail',compact('item'));
    }
}
