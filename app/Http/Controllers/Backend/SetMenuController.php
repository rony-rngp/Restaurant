<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\SetMenu;
use App\Model\SetMenuCategory;
use App\Model\SetMenuProduct;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SetMenuController extends Controller
{
    public function show()
    {
        $setmenus = SetMenu::all();
        return view('backend.setmenu.view', compact('setmenus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5048',
        ]);

        $setmenu = new SetMenu();
        $setmenu->name = $request->name;
        $setmenu->price = $request->price;
        $setmenu->description = $request->description;
        //SetMenu Image
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/setmenu/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(200, 200)->save($image_url);
            $setmenu->image = $image_url;
        }
        $setmenu->save();
        notify()->success("Set Menu Added","Success");
        return redirect()->route('admin.view.setmenu');
    }

    public function destroy($id)
    {
        $setment = SetMenu::findOrFail($id);
        if(file_exists($setment->image)){
            unlink($setment->image);
        }
        $setment->delete();
        notify()->success('Set Menu Deleted', 'Success');
        return redirect()->back();
    }

    public function details($id)
    {
        $setmenu = SetMenu::with('setmenu_categories', 'setmenu_products')->where('id',$id)->firstOrFail();
        return view('backend.setmenu.details', compact('setmenu'));
    }

    public function store_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $setmenu_category = new SetMenuCategory();
        $setmenu_category->setmenu_id  = $request->setmenu_id ;
        $setmenu_category->name = $request->name;
        $setmenu_category->save();
        notify()->success("Set Menu Category Added","Success");
        return redirect()->back();
    }

    public function destroy_category($id)
    {
        $setmenu_category = SetMenuCategory::findOrFail($id);
        $setmenu_category->delete();
        notify()->success('Set Menu Category Deleted', 'Success');
        return redirect()->back();
    }

    public function store_setmenu_product(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'setmenu_id' => 'required',
           'setmenucategory_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5048',
        ]);
        $setmenu_product = new SetMenuProduct();
        $setmenu_product->setmenu_id = $request->setmenu_id;
        $setmenu_product->setmenucategory_id = $request->setmenucategory_id;
        $setmenu_product->name = $request->name;
        //SetMenu Image
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/setmenu_product/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(200, 200)->save($image_url);
            $setmenu_product->image = $image_url;
        }
        $setmenu_product->save();
        notify()->success("Set Menu Product Added","Success");
        return redirect()->back();
    }

    public function view_setmenu_product($setmenucategory_id)
    {
        $setmenu_category = SetMenuCategory::with('setmenu_products')->where('id', $setmenucategory_id)->firstOrFail();
        return view('backend.setmenu.product.setmenu_view', compact('setmenu_category'));
    }

    public function destroy_setmenu_product($id)
    {
        $setmenu_product = SetMenuProduct::findOrFail($id);
        if(file_exists($setmenu_product->image)){
            unlink($setmenu_product->image);
        }
        $setmenu_product->delete();
        notify()->success('Set Menu Product Deleted', 'Success');
        return redirect()->back();
    }
}
