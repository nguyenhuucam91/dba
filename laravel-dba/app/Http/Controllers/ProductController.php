<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $authUserId = Auth::user()->id;
        $recentProductsId = Redis::zrevrange("users:{$authUserId}:recent_products", 0, -1);
        $recentProducts = Product::whereIn('id', $recentProductsId)->orderByRaw("FIELD(id," . implode(',', $recentProductsId) . ")")->get();
        return view('products.index', [
            'products' => $products,
            'recentProducts' => $recentProducts
        ]);
    }

    public function show($id)
    {
        Redis::set("products:{$id}", serialize(Product::find($id)));
        $authUserId = Auth::user()->id;
        Redis::zadd("users:{$authUserId}:recent_products", Carbon::now()->timestamp, $id);
    }
}
