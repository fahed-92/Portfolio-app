<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class EducationController extends Controller
{
    public $educations;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Education $educations, Request $request)
    {
        $this->educations = $educations;
        $this->array = [
            'faculty' => $request->faculty,
            'from' => $request->from,
            'to' => $request->to,
            'period' => $request->period,
            'university' => $request->university,
            'grade' => $request->grade,
        ];
    }

    public function index()
    {
        try {
            $educations = $this->educations->get();
            if ($educations) {
                return view('dashboard.educations.index', compact('educations',));
            }
            redirect()->route('admin.education.index')->with('success', 'You Don\'t have Educations\'s Yey');
        } catch (Throwable $e) {
            return view('dashboard.education.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.educations.index');
    }

    public function create($id)
    {
        return view('dashboard.educations.create');
    }

    public function store(Request $request)
    {
        try{
        $educations = $this->educations->create([
            'faculty' => $request->faculty,
            'major' => $request->major,
            'from' => $request->from,
            'to' => $request->to,
            'university' => $request->university,
            'grade' => $request->grade,
        ]);
    }catch (Throwable $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
    }

    public function edit($id)
    {
        $education = $this->educations->findOrFail($id);
        return response()->json($education);
        }

    public function update(Request $request, $id)
    {
        try{
            $education = $this->educations->findOrFail($id);
                $education->update([
                    'faculty' => $request->faculty,
                    'major' => $request->major,
                    'from' => $request->from,
                    'to' => $request->to,
                    'university' => $request->university,
                    'grade' => $request->grade,
                ]);
                return response()->json(['success' => true]);
            }catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {

        $educations = $this->educations->findOrFail($id);
        if ($educations) {
            $educations->delete();
            return response()->json(['success' => true]);
        }
    }
}
