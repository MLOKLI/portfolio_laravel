<?php

namespace App\Http\Controllers;

use App\Log;
use App\Project;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log = Log::where('project_id', 1)->orderBy('created_at', 'desc')->get();
        return view('logs', compact('log'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(__method__);
        $projects = Project::get();
        return view('logs.edit', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::where('id', $request->project_id)->first();
        $result = Log::create([
            'project_id' => $request->project_id,
            'caption' => $request->caption,
            'slug' => \Str::slug($request->caption),
            'description' => $request->description,
        ]);

        if ($result) {
            return redirect()
                ->route('logs.show', $project->slug)
                ->with(['success' => 'Добавлен новый лог.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка добавления нового лога.']);
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
		$log = Log::where('project_id', $project->id)->orderBy('created_at', 'desc')->get();
        //dd($log);
		return view('logs', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::get();
        $log = Log::where('slug', $id)->first();
        if ($log) {
            return view('logs.edit', compact('log', 'projects'));
        } else {
            return redirect()
                ->route('logs.create');
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
        $data = request()->except(['_token', '_method']);
        $result = Log::where('slug', $id)->update($data);

        if ($result) {
            return redirect()
                ->route('logs.edit', $id)
                ->with(['success' => 'Лог изменен.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка изменения.']);
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
        $result = Log::where('slug', $id)->delete();
        if ($result) {
            return redirect('/')
                ->with(['success' => 'Лог удален.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления лога.']);
        }
    }
}
