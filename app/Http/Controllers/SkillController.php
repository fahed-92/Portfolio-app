<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class SkillController extends Controller
{
    public $skills;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Skill $skills, Request $request)
    {
        $this->skills = $skills;
        $this->array = [
            'skill' => $request->skill,
            'percentage' => $request->percentage,
        ];
    }

    public function index($id)
    {
        try {
            $category_id = $id;
            $skills = $this->skills->where('skills_category_id', $id)->get();
            if ($skills) {
                return view('dashboard.categories.skills.index', compact('skills', 'category_id'));
            }
            redirect()->route('admin.categories.index')->with('success', 'You Don\'t have item\'s Yey');
        } catch (Throwable $e) {
            return view('dashboard.categories.skills.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.settings.skills.index');
    }

    public function create($id)
    {
        return view('dashboard.settings.skills.create');
    }

    public function store(Request $request, $id)
    {
        try {
            $skills = $this->skills->create([
                'skill' => $request->skill,
                'percentage' => $request->percentage,
                'skills_category_id' => $id
            ]);
            return response()->json(['success' => true]);

        }catch (Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        $skill = $this->skills->findOrFail($id);
        return response()->json($skill);
}

    public function update(Request $request ,$id)
    {
        try{
        $skills = $this->skills->findOrFail($id);
            $skills->update([
                'skill' => $request->skill,
                'percentage' => $request->percentage
            ]);
        return response()->json(['success' => true]);
        }catch(Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);

        }
}

    public function delete($id)
    {

        $skills = $this->skills->findOrFail($id);
        if ($skills) {
            $skills->delete();
            return response()->json(['success' => true]);
        }
    }
}
