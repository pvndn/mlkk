<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $settings;
     protected $FieldArray = [ 'text', 'texterea', 'image', 'editor' ];

     public function __construct(Setting $settings) {
         $this->settings = $settings;
     }

     public function index() {
     	$settings = $this->settings->all();
     	return view('administrator.settings.index', compact('settings'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('administrator.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // if( $request->type && !in_array($request->type, $this->FieldArray) ) {
      //     return redirect()->back();
      // }

      foreach($request->option_key as $key => $v) {
        $input['option_key'] = $v;
        $this->settings->create([
          'option_key' => $input['option_key'],
          'type'  => $request->type[$key]
        ]);
      }

      return redirect()->route('admin.settings.index')->with([ 'messages' => 'Thành công', 'type' => 'success' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $setting = $this->settings->findOrFail($id);
      return view('administrator.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = $this->settings->findOrFail($id);
        $input = $request->all();
        if($request->option_key && $request->option_key != null) $input['option_key'] = $request->option_key;
        $setting->update($input);
        return redirect()->route('admin.settings.index')->with([ 'messages' => 'Thành công', 'type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this->settings->findOrFail($id);
        $setting->delete();
        return redirect()->route('admin.settings.index')->with([
            'messages' => 'Đã xóa thành công',
            'type'  => 'success'
        ]);
    }
}
