<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Album;

class ProductsController extends Controller
{
    protected $products;
    protected $album;

    public function __construct( Product $products, Album $album ) {
        $this->products = $products;
        $this->album = $album;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->all();
        return view('administrator.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories();
        return view('administrator.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductRequest $request )
    {
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name;
        };

        $product = $this->products->create($input);

        if($photos = $request->photo) {
            foreach ($photos as $photo) {
                if(!empty($photo)) {
                    $this->album->create([
                        'product_id' => $product->id,
                        'photo' => $photo,
                    ]);
                }
            }
        }

        return redirect()->route('admin.product.show', $product->id)->with([
            'messages' => 'Add product success',
            'type'  => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $product = $this->products->find($id);
        // dd($product);
        return view('administrator.products.show', compact('product'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $product = $this->products->find($id);
        $categories = $this->categories();
        return view('administrator.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $product = $this->products->find($id);

        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name;
        };

        $product->update($input);

        if($photos = $request->photo) {
            foreach ($photos as $photo) {
                if(!empty($photo)) {
                    $this->album->create([
                        'product_id' => $product->id,
                        'photo' => $photo,
                    ]);
                }
            }
        }

        return redirect()->route('admin.product.show', $product->id)->with([
            'messages' => 'Update product success',
            'type'  => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $product = $this->products->find($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with([
            'messages' => 'Delete product success',
            'type'  => 'success'
        ]);
    }

    private function categories() {
        return \App\Models\Category::orderBy('lft', 'asc')->lists('name', 'id');
    }

    public function publish () {
        if( \Request::ajax() ) {
            $id = \Request::get('id');
            $publish = \Request::get('publish');

            $product = $this->products->find($id);
            $product->publish = $publish;
            $product->save();

            return 'Publish update post success';
        }
    }

    public function album ( $id ) {
        if( \Request::ajax() ) {
            $album = $this->album->find($id);
            $album->delete();
            return 'Delete success an photo';
        }
    }
}
