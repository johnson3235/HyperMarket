<?php

namespace App\Http\Controllers\Api\admin;

use App\Models\Brand;
use App\Traits\Media;
use App\Models\Product;
use App\Traits\ApiTrait;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    const ACTIVE = 1;
    public function index(Request $request)
    {
        $lang =  App::currentLocale();
        $products = Product::all(['id',"name_$lang AS name","des_$lang AS des"]);
        return ApiTrait::data(compact('products'));
    }

    public function create()
    {
        $brands = Brand::select('id', 'name_en')->where('status', self::ACTIVE)->orderBy('name_en')->get();
        $subcategories = SubCategory::select('id', 'name_en')->where('status', self::ACTIVE)->orderBy('name_en')->get();
        return ApiTrait::data(compact('brands','subcategories'));
    }

    public function store(StoreProductRequest $request)
    {

        // upload image
        $photoName = Media::upload($request->file('image'), 'products');
        $data = $request->safe()->except(['image']);
        $data['image'] = $photoName;
        // insert into database
        try {
            Product::create($data);
            return ApiTrait::successMessage('Product Created Successfully',201);
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return ApiTrait::errorMessage([],'Something went wrong',500);
        }
    }

    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id); // object
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return ApiTrait::errorMessage(['id'=>'The Given Id Is Invalid'],'Unprocessable content',422);
        }
        $brands = Brand::select('id', 'name_en')->where('status', self::ACTIVE)->orderBy('name_en')->get();
        $subcategories = SubCategory::select('id', 'name_en')->where('status', self::ACTIVE)->orderBy('name_en')->get();
        return ApiTrait::data(compact('brands','subcategories','product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return ApiTrait::errorMessage(['id'=>'The Given Id Is Invalid'],'Unprocessable content',422);
        }
        $data = $request->except('image');
        // check if the request has photo=> upload new photo , delete old photo
        if ($request->has('image')) {
            // upload image
            $newPhotoName = Media::upload($request->file('image'), 'products');
            // remove old photo
            Media::delete("images/products/{$product->image}");

            $data['image'] = $newPhotoName;
        }
        // update product into database
        Product::where('id', $id)->update($data);
        return ApiTrait::successMessage('Product Updated Successfully',200);

    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return ApiTrait::errorMessage(['id'=>'The Given Id Is Invalid'],'Unprocessable content',422);
        }
        Media::delete("images/products/{$product->image}");
        $product->delete();
        return ApiTrait::successMessage('Product Delete Successfully',200);

    }

    public function statusToggle(Request $request, $id)
    {
        $status = (int) ! $request->status;
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return ApiTrait::errorMessage(['id'=>'The Given Id Is Invalid'],'Unprocessable content',422);
        }
        $product->status = $status;
        $product->save();
        return ApiTrait::successMessage('Product Status Changed Successfully',200);
    }
}
