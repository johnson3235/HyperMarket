<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        $categories = DB::table('Categories')->get();
        $sub_categories= DB::table('sub_categories')->rightjoin('products','sub_categories.id','=','products.sub_category_id')->select('sub_categories.id','sub_categories.image','sub_categories.name_en')->groupBy('sub_categories.id')->get();
        $subcategories = DB::table('Sub_categories')->get();
        $RelatedProduct = DB::table('products')->where('sub_category_id',1)->where('products.status',1)->get(); // collection [object,object,object,....]
        $MostWanted=DB::table('Reviews')->leftJoin('products', 'reviews.product_id', '=', 'products.id')->select('reviews.product_id','products.*')->where('products.status',1)->groupBy('reviews.product_id')->orderByRaw('COUNT(*) DESC,AVG(reviews.value)DESC')->limit(5)->get();
        $offers = DB::table('offer_products')->join('offers','offer_products.offer_id','=','offers.id')->join('products','offer_products.product_id','=','products.id')->groupBy('offer_products.product_id')->where('offer_products.statusess','=',1)->get();
        return view('user.shop',compact('categories','MostWanted','subcategories','RelatedProduct','sub_categories','offers'));
    }






    public function ProductDetails($id)
    {
        $product = DB::table('products')->where('id',$id)->first(); // object
        $RelatedProduct = DB::table('products')->where('sub_category_id', $product->sub_category_id)->where('products.status',1)->get(); // collection [object,object,object,....]
        return view('user.detail-product2', compact('product', 'RelatedProduct' ));
    }




    public function ProductDetailwithquantity($id,$quantity)
    {
        $product = DB::table('products')->where('id', $id)->first(); // object
        $RelatedProduct = DB::table('products')->where('sub_category_id', $product->sub_category_id)->where('products.status',1)->get(); // collection [object,object,object,....]
        return view('user.detail-product', compact('product', 'RelatedProduct','quantity'));
    }



    public function ShopList($id)
    {
        $categories = DB::table('Categories')->get();
        $MostWanted=DB::table('Reviews')->leftJoin('products', 'reviews.product_id', '=', 'products.id')->select('reviews.product_id','products.*')->where('products.status',1)->groupBy('reviews.product_id')->orderByRaw('COUNT(*) DESC,AVG(reviews.value)DESC')->limit(5)->get();
        $sub_categories = DB::table('sub_categories')->rightjoin('products','sub_categories.id','=','products.sub_category_id')->select('sub_categories.id','sub_categories.image','sub_categories.name_en')->groupBy('sub_categories.id')->get();
        $RelatedProduct = DB::table('products')->where('sub_category_id',$id)->where('products.status',1)->get();
        $offers = DB::table('offer_products')->join('offers','offer_products.offer_id','=','offers.id')->join('products','offer_products.product_id','=','products.id')->groupBy('offer_products.product_id')->where('offer_products.statusess','=',1)->get(); // collection [object,object,object,....]
        return view('user.shop', compact('categories','sub_categories','MostWanted','RelatedProduct','offers'));
    }
}
