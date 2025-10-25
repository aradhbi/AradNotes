<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create validate all request image,title,category,desc,published status,slug,keywords
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:20480',
            'link' => 'required|string|max:255',
            'technologies' => 'required|string|max:255',
            'info' => 'required|string|max:255',

        ]);
        // image upload if exists stroage/app/public/posts
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'uploads');
        } else {
            $imagePath = null;
        }
        // create post
        Project::create([
            'title' => $request->title,
            'info' => $request->info,
            'link' => $request->link,
            'technologies' => $request->technologies,
            'image' => $imagePath,
        ]);
        // $workerUrl = 'https://telegram-proxy.aradhabibi1387.workers.dev/';
        // $token = '7121855189:AAHBasSgcIcBlG18kQ-WNnAmyhjN_U1nLn0';
        // $chatId = '@aradnotes';
        // $cleanContent = strip_tags($request->content, '<b><i><u><a><code><pre>'); // فقط تگ‌های مجاز
        // Http::post("{$workerUrl}bot{$token}/sendMessage", [

        //     'chat_id' => $chatId,
        //     'text' => "{$request->title}\n\n{$cleanContent}",
        //     "parse_mode"=>"HTML"
        // ]);
        return redirect()->route('admin.projects.index')->with('success', 'project created successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.posts.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // validate all request image,title,category,desc,published status,slug,keywords
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:20480',
            'link' => 'required|string|max:255',
            'technologies' => 'required|string|max:255',
            'info' => 'required|string|max:255',

        ]);
        // image upload if exists stroage/app/public/posts
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'uploads');
        } else {
            $imagePath = $project->image; // keep the old image if no new one is uploaded
        }
        // update post
        $project->update([
            'title' => $request->title,
            'info' => $request->info,
            'link' => $request->link,
            'technologies' => $request->technologies,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.projects.index')->with('success', 'project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'project deleted successfully.');
    }
}
