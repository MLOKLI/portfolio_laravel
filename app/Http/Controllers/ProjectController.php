<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
		//date('d-m-Y', strtotime($projects->created_at));
		return view('projects', compact('projects'));
		//dd($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//dd(__method__);
        return view('projects.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(__method__, $request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('', 'public');
        } else { $file = ''; }

        $slug = \Str::slug($request->name);

        $result = Project::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $file,
            'github' => $request->github,
        ]);

        if ($result) {
            return redirect()
                ->route('projects.index')
                ->with(['success' => 'Опубликован новый проект.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка публикации нового проекта.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('slug', $id)->first();
        //dd($project);
		return view('projects', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::where('slug', $id)->first();
        if ($project) {
            return view('projects.edit', compact('project'));
        } else {
            return redirect()
                ->route('projects.create');
        }
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
        //dd(__method__, $id, $request->all());
        //$id->update($request->except('slug'));
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'github' => $request->github,
        ];

        if ($request->image) {
            $file = $request->file('image')->store('', 'public');
            $data += [
                'image' => $file,
            ];
        } elseif ($request->has('deleteImage')) {
            $data += [
                'image' => '',
            ];
        }
        $result = Project::where('slug', $id)->update($data);

        if ($result) {
            return redirect()
                ->route('projects.edit', $id)
                ->with(['success' => 'Проект отредактирован.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка редактирования.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $result = Project::where('slug', $id)->delete();
        if ($result) {
            return redirect()
                ->route('projects.index')
                ->with(['success' => 'Проект удален.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления проекта.']);
        }
    }
}
