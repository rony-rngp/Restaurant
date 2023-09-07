<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->get();
        return view('backend.product.view', compact('products'));
    }

    public function add()
    {
        $data['root_categories'] = Category::where('status', 1)->get();
        return view('backend.product.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'description' => 'required',
           'regular_price' => 'required|numeric',
           'offer_price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5048',
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcategory_id  = $request->subcategory_id ;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->status = 1;

        //Product Image
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/product/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(400, 400)->save($image_url);
            $product->image = $image_url;
        }
        $product->save();
        notify()->success("Product Added","Success");
        return redirect()->route('admin.view.product');
    }

    public function get_subcategory(Request $request)
    {
        $sub_categories = SubCategory::where('category_id', $request->category_id)->where('status', 1)->get();
        return response()->json($sub_categories);
    }

    public function edit($id)
    {
        $data['root_categories'] = Category::where('status', 1)->get();
        $data['product'] = Product::findOrFail($id);
        $data['sub_categories'] = SubCategory::where('category_id', $data['product']->category_id)->get();
        return view('backend.product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'offer_price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:5048',
        ]);

        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->subcategory_id  = $request->subcategory_id ;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;

        //Product Image
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/product/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(400, 400)->save($image_url);
            if(file_exists($product->image)){
                unlink($product->image);
            }
            $product->image = $image_url;
        }
        $product->save();
        notify()->success("Product Updated","Success");
        return redirect()->route('admin.view.product');
    }

    public function status(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['messege'=>'success']);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        notify()->success('Product Deleted', 'Success');
        return redirect()->back();
    }
}
