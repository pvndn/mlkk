<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;


class HomeController extends Controller
{
    protected $menuItem;
    protected $footerItem;
    protected $supportCustomer;
    protected $policyCustomer;
    protected $setting;

    public function __construct() {
        $this->menuItem = \App\Models\MenuItem::where('menu_id', 1)->get()->toHierarchy();
        $this->footerItem = \App\Models\MenuItem::where('menu_id', 2)->get()->toHierarchy();
        $this->supportCustomer = \App\Models\MenuItem::where('menu_id', 3)->get()->toHierarchy();
        $this->policyCustomer = \App\Models\MenuItem::where('menu_id', 4)->get()->toHierarchy();
        $this->setting = \App\Models\Setting::lists('option_value', 'option_key');
    }

    public function index() {
        $menuItem = $this->menuItem;
        $supportCustomer = $this->supportCustomer;
        $policyCustomer = $this->policyCustomer;

        $hl_products = $this->_Product();
        $categories = \App\Models\Category::where('publish', 1)->orderBy('id', 'desc')->get();
        $news = $this->_NewsLayout();
        $setting = $this->_setting();
        $pageIndex = $this->pageIndex();
        return view('site.index', compact('menuItem', 'news', 'categories', 'hl_products', 'setting', 'supportCustomer', 'policyCustomer', 'pageIndex'));
    }

    private function pageIndex() {
      return \App\Models\Page::where('publish', 1)->take(4)->get();
    }

    private function _Product() {
         return \App\Models\Product::where('high_light', 1)->orderBy('id', 'desc')->get();
    }

    private function _NewsLayout() {
      return \App\Models\News::where('publish', 0)->orderBy('id', 'desc')->take(4)->get();
    }

    private function _CatalogProduct() {
      return \App\Models\MenuItem::where('menu_id', 2)->get()->toHierarchy();
    }

    private function _setting() {
      return $this->setting->toArray();
    }

    public function category( $slug ) {
        $setting = $this->setting;
        $menuItem = $this->menuItem;
        $supportCustomer = $this->supportCustomer;
        $policyCustomer = $this->policyCustomer;
        $news = $this->_NewsLayout();
        $category = \App\Models\Category::where('slug', $slug)->first();
        if(!$category) {
            $page = \App\Models\Page::where('slug', $slug)->first();
        }

        if( $category ) {
            $template = $category->format;
            switch ( $template ) {
                case 'project':
                    $projects = $category->projects()->where('publish', 0)->paginate(7);
                    $hl_products = $this->_Product();
                    return view('site.project', compact('menuItem', 'hl_products', 'projects', 'footerItem', 'setting', 'category', 'cataProducts','supportCustomer', 'policyCustomer'));
                    break;

                case 'product':
                    $cataProducts = $this->_CatalogProduct();
                    $categories = $category->select('id')->whereBetween('lft',[$category->lft, $category->rgt])->get();
                    $products = \App\Models\Product::whereIn('category_id', $categories)->orderBy('id', 'desc')->paginate(21);
                    return view('site.product', compact('menuItem', 'gallery', 'products', 'category', 'footerItem', 'setting', 'news', 'cataProducts','supportCustomer', 'policyCustomer'));
                    break;

                case 'partner':
                    $cataProducts = $this->_CatalogProduct();
                    $categories = $category->select('id','name')->whereBetween('lft',[$category->lft, $category->rgt])->get();
                    // $partners = \App\Models\Partner::whereIn('category_id', $categories->id)->orderBy('id', 'desc')->get();
                    return view('site.partner', compact('menuItem', 'gallery', 'categories', 'footerItem', 'setting', 'news', 'cataProducts','supportCustomer', 'policyCustomer'));
                    break;

                default:
                    $news = $category->news()->where('publish', 0)->paginate(16);
                    return view('site.news', compact('menuItem', 'gallery', 'news', 'footerItem', 'setting', 'category', 'cataProducts','supportCustomer', 'policyCustomer'));
                    break;
            }
        } elseif( $page ) {
            $template = $page->format;
            switch ( $template ) {
                case 'contact':
                    return view('site.contact', compact('menuItem', 'gallery', 'page', 'footerItem', 'setting','supportCustomer', 'policyCustomer'));
                    break;
                default:
                    $hl_products = $this->_Product();
                    return view('site.page', compact('menuItem', 'hl_products', 'page', 'footerItem', 'setting','supportCustomer', 'policyCustomer'));
                    break;
            }

        } else {
            abort(404);
        }
    }

    public function single( $category, $post, Request $request ) {
        $setting = $this->setting;
        $menuItem = $this->menuItem;
        $supportCustomer = $this->supportCustomer;
        $policyCustomer = $this->policyCustomer;
        $cataProducts = $this->_CatalogProduct();

        $whereCategory = \App\Models\Category::where('slug', $category)->first();
        if( !$whereCategory ) abort(404);

        $template = $whereCategory->format;
        switch ( $template ) {
            case 'news':
                $post = \App\Models\News::where('slug', $post)->first();
                $news = \App\Models\News::where('id' ,'!=', $post->id)->take(4)->get();
                if( !$post ) abort(404);
                $this->view($post);
                return view('site.single', compact('menuItem', 'post', 'news', 'footerItem', 'setting','supportCustomer', 'policyCustomer'));
                break;

            case 'product':
                $product = \App\Models\Product::where('slug', $post)->first();
                if( !$product ) abort(404);
                $this->view($product);
                $same_products = \App\Models\Product::where('category_id', $product->category_id)->where('slug','!=',$post)->take(3)->get();
                return view('site.single-product', compact('menuItem', 'product', 'same_products', 'footerItem', 'setting', 'cataProducts','supportCustomer', 'policyCustomer'));
                break;

            default:
                $post = \App\Models\Project::where('slug', $post)->first();
                if( !$post ) abort(404);
                $this->view($post);
                $news = \App\Models\News::where('publish', 0)->orderBy('id', 'desc')->take(4)->get();
                $hl_products = $this->_Product();
                $project_same = \App\Models\Project::where('id', '!=', $post->id)->orderBy('id', 'desc')->take(4)->get();
                return view('site.single', compact('menuItem', 'post','hl_products', 'news', 'footerItem', 'setting', 'project_same','supportCustomer', 'policyCustomer'));
                break;
        }
    }

    private function view($models) {
      $view = $models->view;
      return $models->update([
          'view' => $view + 1
      ]);
    }

    public function search(Request $request) {
      $setting = $this->setting;
      $menuItem = $this->menuItem;
      $supportCustomer = $this->supportCustomer;
      $policyCustomer = $this->policyCustomer;
      $cataProducts = $this->_CatalogProduct();

      if($request->get('keywords')) {
        $keywords = $request->get('keywords');
        $products = \App\Models\Product::SearchByKeyword($keywords)->get();
        return view('site.search', compact('products', 'keywords', 'menuItem', 'setting', 'cataProducts','supportCustomer', 'policyCustomer'));
      }
    }

    protected function _dataJSON() {
      $products = \App\Models\Product::select('slug', 'name', 'image', 'price', 'price_market', 'category_id')->get();
      foreach($products as $p) {
        $g_ct = $p->category()->select('slug')->first();
        $ct_slug = $g_ct->slug;
        $temp[] = array(
          'name' => $p->name,
          'slug'  => $p->slug,
          'link' => route('client.posts', [$ct_slug, $p->slug]),
          'image' => url($p->image)
        );
      }
      return response()->json($temp);
    }

    public function contact() {
      if(\Request::ajax()) {
        $messages = [
  		    'required' 	=> 'Vui lòng nhập vào trường này.',
  		    'email'    	=> 'Địa chỉ e-mail chưa đúng định dạng.',
  		    'regex' 	=> 'Số điện thoại chưa đúng định dạng'
  		  ];

    		$validator = \Validator::make(\Request::all(), [
    			'name' 	=> 'required|min:1',
    			'email' => 'required|email',
    			'phone' => 'required|regex:/^0[0-9]{9,10}$/',
    		], $messages);

    		if($validator->fails()) {
          return \Response::json([
    					'errors' => $validator->errors()->toArray()
    				]);
    		}

        $contacts = \App\Models\Contact::create(\Request::all());

        return 'Cảm ơn bạn đã để lại yêu cầu của mình. Chúng tôi sẽ sớm liên hệ với bạn qua địa chỉ trên.';
      }
      return redirect()->back();
    }

}
