<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('backend.category.view_category', compact('categories'));
    }

    public function add()
    {
        return view('backend.category.add_category');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5048',
            'promo_image' => 'image|mimes:jpeg,jpg,png,gif|max:5048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(400, 400)->save($image_url);

            $category->image = $image_url;
        }
        //Promo Category Image
        $promo_image = $request->file('promo_image');
        if($promo_image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($promo_image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category/promo_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($promo_image)->resize(728, 90)->save($image_url);

            $category->promo_image = $image_url;
        }

        $category->save();

        notify()->success("Category Added","Success");
        return redirect()->route('admin.view.category');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:5048'
        ]);


        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(400, 400)->save($image_url);
            if(file_exists($category->image)){
                unlink($category->image);
            }

            $category->image = $image_url;
        }

        //Promo Category Image
        $promo_image = $request->file('promo_image');
        if($promo_image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($promo_image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category/promo_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($promo_image)->resize(728, 90)->save($image_url);
            if(file_exists($category->promo_image)){
                unlink($category->promo_image);
            }

            $category->promo_image = $image_url;
        }

        $category->save();

        notify()->success("Category Updated","Success");
        return redirect()->route('admin.view.category');
    }

    public function status(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if(file_exists($category->image)){
            unlink($category->image);
        }
        if(file_exists($category->promo_image)){
            unlink($category->promo_image);
        }
        $category->delete();
        notify()->success("Category Deleted","Success");
        return redirect()->route('admin.view.category');
    }
}
