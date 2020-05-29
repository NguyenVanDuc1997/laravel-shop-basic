<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return view('products.list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->content = $request->content_product;
        $product->category_id = $request->category_id;

        //upload file
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images','public');
            $product->image = $path;
        } else {
            $product->image = 'public/images/default.jpg';
        }

        $product->save();
        return redirect()->route('products.list');
    }
}
