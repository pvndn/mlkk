<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    protected $project;

    public function __construct( Project $project ) {
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->project->all();
        return view('administrator.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories();
        // dd($categories);
        return view('administrator.projects.create', compact('categories'));
    }

    private function categories() {
        return \App\Models\Category::where('format', 'project')->select('name' ,'id', 'slug')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();

      if($request->slug != '') {
          $input['slug'] = $request->slug;
      } else {
          $input['slug'] = $request->name;
      };

      $post = $this->project->create($input);

      return redirect()->route('admin.project.show', $post->id)->with([
          'messages' => 'Thêm dự án thành công',
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
        $project = $this->project->find($id);
        return view('administrator.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->project->find($id);
        // dd($project);
        $categories = $this->categories();
        return view('administrator.projects.edit', compact('categories', 'project'));
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
        $post = $this->project->find($id);

        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name;
        };

        $post->update($input);

        return redirect()->route('admin.project.show', $post->id)->with([
            'messages' => 'Cập nhật dự án thành công',
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
      $post = $this->project->find($id);
      $post->delete();
      return redirect()->route('admin.project.index')->with([
          'messages' => 'Đã xóa dự án thành công',
          'type'  => 'success'
      ]);
    }
}
