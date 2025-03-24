<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProjectController extends Controller
{
    public $projects;
    public $array;
    use GeneralTrait;

    /**
     * Class constructor.
     */
    public function __construct(Project $projects)
    {
        $this->projects = $projects;
    }

    public function index()
    {
        try {
            $projects = $this->projects->get();
            if ($projects) {
                return view('dashboard.projects.index', compact('projects',));
            }
            redirect()->route('admin.project.index')->with('success', 'You Don\'t have projects\'s Yey');
        } catch (Throwable $e) {
            return view('dashboard.projects.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.projects.index');
    }

    public function create($id)
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        try {
            $image = $request->file('image');
            $projects = $this->projects->create([
                'name' => $request->name,
                'category' => $request->category,
                'link' => $request->link,
                'image' => $this->uploadImage($image, 'projects'),
                'description' => $request->description,
            ]);
            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

    public function edit($id)
    {
        $project = $this->projects->findOrFail($id);
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        try {
            // Find the project by ID
            $project = Project::findOrFail($id);
            // Update the project data
            $project->name = $request->name;
            $project->category = $request->category;
            $project->link = $request->link;
            $project->description = $request->description;
            // Check if a new image file is uploaded
            if ($request->hasFile('image')) {
                $project->image = $this->uploadImage($request->image, 'projects');
            }
            // Save the updated project
            $project->save();

            // Return a success response
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {

        $projects = $this->projects->findOrFail($id);
        if ($projects) {
            $projects->delete();
            return response()->json(['success' => true]);
        }
    }

    public function uploadImage($photo, $folder)
    {
        $path = public_path('assets/img/' . $folder);
        $filename = $photo->getClientOriginalName();
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        $photo->move($path, $filename);
        return $filename;
    }
}
