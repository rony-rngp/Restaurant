<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\SetMenu;
use App\Model\SetMenuCategory;
use App\Model\Slider;
use App\Model\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->latest()->take(8)->get();
        $categories = Category::where('status', 1)->get();
        $sliders = Slider::all();
        return view('frontend.home', compact('products', 'categories', 'sliders'));
    }

    public function category_wise($id, $slug)
    {
        $category = Category::with('subcategories', 'products')->where(['id' => $id, 'slug' => $slug])->firstOrFail();
        return view('frontend.category_wise', compact('category'));
    }

    public function sub_category_wise($id, $slug)
    {
        $subcategory = SubCategory::with('category', 'products')->where(['id'=>$id, 'slug'=>$slug])->firstOrFail();
        return view('frontend.subcategory_wise', compact('subcategory'));
    }

    public function menu()
    {
        $menus = SetMenu::with('setmenu_categories')->get();
        return view('frontend.menu', compact('menus'));
    }

    public function menu_item(Request $request)
    {
        $setmenu_categories = SetMenuCategory::with('setmenu_products', 'setmenu')->where('setmenu_id', $request->setmenu_id)->get();
        return view('frontend.menu_item_product', compact('setmenu_categories'));
    }

    public function menu_item_cart(Request $request)
    {

        if ($request->item == ''){
            notify()->error('Filed must not be empty', 'Error');
            return redirect()->back();
        }

        $set_menu = SetMenu::findOrFail($request->setmenu_id);

        if (isset($request->item)){
            $items = implode(',', $request->item);
        }

        Cart::add([
            'id' => $set_menu->id,
            'name' => $set_menu->name,
            'qty' => 1,
            'price' => $set_menu->price,
            'weight' => 550,
            'options' => [
                'image' => $set_menu->image,
                'items' => $items
            ]
        ]);

        //Forget Coupon Session
        Session::forget('coupon_amount');
        Session::forget('coupon_code');

        notify()->success('Menu successfully added in cart ', 'Success');
        return redirect()->back();

    }


}
