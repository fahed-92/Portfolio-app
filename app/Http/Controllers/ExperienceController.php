<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperincRequest;
use App\Models\Experience;
use Exception;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public $experiences;

    /**
     * Class constructor.
     */
    public function __construct(Experience $experiences)
    {
        $this->experiences = $experiences;
    }

    public function index()
    {
        try {
            $experiences = $this->experiences->get();
            if ($experiences) {
                return view('dashboard.experiences.index', compact('experiences',));
            }
            redirect()->route('admin.experience.index')->with('success', 'You Don\'t have Educations\'s Yey');
        } catch (Exception $e) {
            return view('dashboard.experience.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.experiences.index');
    }

    public function create($id)
    {
        return view('dashboard.experiences.create');
    }

    public function store(Request $request)
    {
        try {
            $experiences = $this->experiences->create([
                'position' => $request->position,
                'company' => $request->company,
                'from' => $request->from,
                'to' => $request->to,
                'description' => $request->description,
            ]);
            return response()->json(['success' => true]);

        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $experience = $this->experiences->findOrFail($id);
            return response()->json($experience);

        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $experiences = $this->experiences->findOrFail($id);
            $experiences->update([
                'position' => $request->position,
                'company' => $request->company,
                'from' => $request->from,
                'to' => $request->to,
                'description' => $request->description
            ]);
            return response()->json(['success' => true]);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $experiences = $this->experiences->findOrFail($id);
            if ($experiences) {
                $experiences->delete();
                return response()->json(['success' => true]);
            }
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
    }
}
