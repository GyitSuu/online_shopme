<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    //
    public function index($value='')
    {
        $categories = Category::all();
    	$filter_categories = Category::take(3)->get();
    	$items = Item::all();
    	return view('frontend.index', compact('categories','items','filter_categories'));
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

    public function getItemsByCategory($id)
    {
        if ($id != 0) {
           $items = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->select('items.*', 'categories.*', 'items.id as i_id')
            ->where('items.category_id', '=', $id)
            ->get();
            if(count($items) == 0) {
                return response()->json(['empty'=>'null']);
            }else{
               return $items; 
            }
        }
        $items = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->select('items.*', 'categories.*', 'items.id as i_id')
            ->get();
            return $items;
        
    }

    public function getItemsBySorting($sort_type)
    {
        if($sort_type == "latest") {
            $items = DB::table('items')
                ->join('categories', 'categories.id', '=', 'items.category_id')
                ->select('items.*', 'categories.*', 'items.id as i_id')
                ->orderBy('items.id', 'desc')
                ->get();
        }
        elseif($sort_type == "lowToHigh") {
            $items = DB::table('items')
                ->join('categories', 'categories.id', '=', 'items.category_id')
                ->select('items.*', 'categories.*', 'items.id as i_id')
                ->orderBy('items.item_price', 'asc')
                ->get();
        }
        elseif($sort_type == "highToLow") {
            $items = DB::table('items')
                ->join('categories', 'categories.id', '=', 'items.category_id')
                ->select('items.*', 'categories.*', 'items.id as i_id')
                ->orderBy('items.item_price', 'desc')
                ->get();
        }else {
            $items = DB::table('items')
                ->join('categories', 'categories.id', '=', 'items.category_id')
                ->select('items.*', 'categories.*', 'items.id as i_id')
                ->where('item_name','like', "%$sort_type%")
                ->orWhere('category_name','like', "%$sort_type%")
                ->orWhere('description','like', "%$sort_type%")
                ->get();
        }

        return $items;
    }
    public function about($value='')
    {
        return view('frontend.about');
    }
    public function contact($value='')
    {
        return view('frontend.contact');
    }
}
