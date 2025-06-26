<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use Binafy\LaravelCart\Models\Cart;

class HomepageController extends Controller
{
    public function index()
    { 
        $categories = Categories::latest()->take(4)->get();
        $products = Product::paginate(20);
        return view('web.homepage', [
            'categories' => $categories,
            'products' => $products
        ]);

    }

    public function products()
    {
        return view('web.products');
    }

    public function categories()
    {
        return view('web.categories');
    }

    public function cart()
    {
        $cart = Cart::query()
            ->with(
                [
                    'items',
                    'items.itemable'
                ]
            )
            ->where('user_id', auth()->guard('customer')->user()->id)
            ->first();
        

        return view('web.cart',[
            'title'=>'Cart',
            'cart' => $cart,
        ]);
    }

    public function checkout()
    {
        return view('web.checkout');
    }

    public function Product($slug)
    {
        $product = Product::whereSlug($slug)->first();

        if (!$product) {
            return abort(404);
        }

        $relatedProducts = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('web.product', [
            'slug' => $slug,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function singleCategory($slug)
    {
        return view('web.single_categories', ['slug' => $slug]);
    }
}
