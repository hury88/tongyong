<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\News;
// use App\FreeProduct;
// use App\Helpers\productsHelper;
// use App\Order;

// use App\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $news = new News();
        //轮播图
        $carousel = $news->v_list([47,48],["linkurl","img1","title"]);

        // 职业招聘介绍;
        $zyzpjj=$news->v_list([47,81],["linkurl","content","title"]);
        return view('home', compact('carousel','zyzpjj'));
    }

    private function createTags()
    {
        $product = Product::select(['id', 'name'])->get();

        foreach ($product as $value) {
            $prod = Product::find($value->id);

            $prod->tags = str_replace(' ', ',', $value->name);

            $prod->save();
        }
    }
}
