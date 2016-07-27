<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\PartnerRequest;
use App\Http\Controllers\Controller;

use App\Models\Partner;

class PartnerController extends Controller
{
    protected $partner;

    public function __construct( Partner $partner ) {
        $this->partner = $partner;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = $this->partner->all();
        return view('administrator.partner.index', compact('partner'));
    }

    private function categories() {
        return \App\Models\Category::whereRaw('rgt-lft = 1')->where('format', 'partner')->select('name' ,'id', 'slug')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories();
        return view('administrator.partner.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name;
        };

        $post = $this->partner->create($input);

        return redirect()->route('admin.partner.show', $post->id)->with([
            'messages' => 'Thêm thành công',
            'type'  => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->partner->find($id);
        return view('administrator.partner.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = $this->partner->find($id);
        $categories = $this->categories();
        return view('administrator.partner.edit', compact('categories', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {
        $post = $this->partner->find($id);

        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name;
        };

        $post->update($input);

        return redirect()->route('admin.partner.show', $post->id)->with([
            'messages' => 'Cập nhật đối tác thành công',
            'type'  => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->partner->find($id);
        $post->delete();
        return redirect()->route('admin.partner.index')->with([
            'messages' => 'Xóa thành công',
            'type'  => 'success'
        ]);

    }
}
