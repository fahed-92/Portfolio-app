<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillsCategoryRequest;
use App\Models\SkillsCategory;
use Illuminate\Http\Request;

class SkillsCategoryController extends Controller
{
    public $categories;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct( SkillsCategory $categories , Request $request )
    {
        $this-> categories = $categories;
        $this-> array = [
            'name'=>  $request->name,
        ];
    }
    public function index()
    {
        $categories= $this-> categories-> get();
        return view('dashboard.categories.index' , compact('categories'));
    }
    public function show($id)
    {
        return view('dashboard.categories.index');
    }
    public function create()
    {
        return view('dashboard.categories.create');
    }
    public function store(Request $request)
    {
        $categories = $this-> categories-> create([
            'name'=>  $request->name
        ]);
        if($categories){
            return redirect()->route('admin.category.index')->with('success', 'تم إضافة العنصر بنجاح');
        }
    }
    public function edit($id)
    {
        $category = $this-> categories-> findOrFail($id);
        return response()->json($category);
    }
    public function update(Request $request, $id)
    {
        $category = SkillsCategory::findOrFail($id);
        $category->fill($request->all());
        $category->save();
        return response()->json(['success' => true]);
    }

    public function delete($id)
    {

        $category = SkillsCategory::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true]);
    }
}
