<?php

namespace app\Http\Controllers;

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

        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
        $carousel = $news->v_list([47,48],["linkurl","img1","title"]);

        // dd($carousel);

        return view('home', compact('carousel'));
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
