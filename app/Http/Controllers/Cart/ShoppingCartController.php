<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;

class ShoppingCartController extends Controller
{
    protected $products;
    protected $menuItem;

    public function __construct( \App\Models\Product $products )
    {
       $this->products     = $products;
       $this->menuItem = \App\Models\MenuItem::where('menu_id', 1)->get()->toHierarchy();

    }

    public function index () {
      if (Request::isMethod('post')) {
          $product_id = Request::get('product_id');
          $product = $this->products->find($product_id);
          Cart::add(array(
              'id' => $product_id,
              'name' => $product->name,
              'qty' => Request::get('qty') ? Request::get('qty') : 1,
              'price' => ($product->price != 0) ? $product->price : $product->price_market,
              'options' => array(
                  'image' => $product->image,
                  'number' => $product->numbers,
                  'slug' => Request::get('slug'),
              ),
          ));
        }

        if (Request::get('product_id') && (Request::get('increment')) == 1) {
          $rowId = Cart::search(function ($cartItem, $rowId) {
            if($cartItem->id === Request::get('product_id')) {
              $item = Cart::get($rowId);
              return Cart::update($rowId, $item->qty + 1);
            }
            return null;
          });
        }

        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
          $rowId = Cart::search(function ($cartItem, $rowId) {
          if($cartItem->id === Request::get('product_id')) {
              $item = Cart::get($rowId);
              return Cart::update($rowId, $item->qty - 1);
            }
            return null;
          });
        }

        $cart = Cart::content();

        $products = $this->products->orderBy('id', 'desc')->take(21)->get();

        if(Request::get('product_id') && (Request::get('remove')) == 'true') {
          $rowId = Cart::search(function ($cartItem, $rowId) {
          if($cartItem->id === Request::get('product_id')) {
              return Cart::remove($rowId);
            }
            return null;
          });
        }

        if((Request::get('destroy')) == 'true') {
          if(Cart::count() == 0) {
            return redirect()->route('get.cart');
          }
          Cart::destroy();
          return redirect()->back();
        }

        // $setting = $this->getSettings();
        $menuItem = $this->menuItem;
        $randProduct = \App\Models\Product::orderByRaw("RAND()")->take(6)->get();
        $cataProducts = \App\Models\MenuItem::where('menu_id', 2)->get()->toHierarchy();
        return view('site.cart', compact('cart', 'products', 'randProduct', 'menuItem', 'cataProducts'));
    }
}
