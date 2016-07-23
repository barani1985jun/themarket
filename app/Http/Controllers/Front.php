<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;
use App\Category;
use App\Product;

class Front extends Controller
{
    var $brands;
    var $categories;
    var $products;
    var $title;
    var $description;

    public function __construct()
    {
        $this->brands=Brand::all();
        $this->categories=Category::all();
        $this->products=Product::all();
    }
    public function index()
    {
        /*$category=Category::all();
        foreach($category as $cat_brands)
        {
          // echo "<pre>";print_r($cat_brands->brands->brand_name); echo "<br>";
            echo $cat_brands->id."<br>";
            echo "<strong>".$cat_brands->category_name."</strong><br>";
           foreach($cat_brands->brands as $val)
           {
             echo $val->brand_name."<br>";
           }
            // echo $cat_brands->brands->brand_name; echo "<br>";
        }
        exit;*/
        return view('home',array('title'=>'Welcome','description'=>'','page'=>'home','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    	
    }
    public function products()
    {
       // echo "<Pre>";print_r($this->products);exit;
    	return view('products',array('title'=>'Product Listings','description'=>'','page'=>'products','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }
    public function product_detail($id)
    {
        $product=Product::find($id);
    	return view('products_details',array('title'=>$product->name,'description'=>$product->description,'page'=>'products','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }
    public function product_categories($cat_id)
    {
    	return view('products',array('title'=>'Welcome','description'=>'','page'=>'products','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }
    public function product_brands($brand_id)
    {
    	return view('products',array('title'=>'Welcome','description'=>'','page'=>'products','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }

    public function blog()
    {
    	return view('blog',array('title'=>'Welcome','description'=>'','page'=>'blog','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }
    public function blog_post($id)
    {
    	return view('blog_post',array('title'=>'Welcome','description'=>'','page'=>'blog','brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }
    public function contact_us()
    {
    	return view('contact_us',array('title'=>'Welcome','page'=>'contact_us','description'=>''));
    }
    public function login()
    {
    	return view('login',array('title'=>'Welcome','page'=>'home','description'=>''));
    }
    public function logout()
    {
    	return view('login',array('title'=>'Welcome','page'=>'home','description'=>''));
    }
    public function cart()
    {
    	return view('cart',array('title'=>'Welcome','page'=>'home','description'=>''));
    }
    public function checkout()
    {
    	return view('checkout',array('title'=>'Welcome','page'=>'home','description'=>''));
    }
    public function search($query)
    {
    	return view('products',array('title'=>'Welcome','page'=>'products','description'=>''));
    }
}
