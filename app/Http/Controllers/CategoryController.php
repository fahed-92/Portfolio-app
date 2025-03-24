<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;


class CategoryController extends Controller
{
    // public $categories;

    // /**
    //  * Class constructor.
    //  */
    // public function __construct(Category $categories)
    // {
    //     $this->categories = $categories;

    // }

    // public function index()
    // {
    //     try {
    //         $categories = $this->categories->get();
    //         if ($categories) {
    //             return view('dashboard.categories.index', compact('categories',));
    //         }
    //         redirect()->route('admin.categories.index')->with('success', 'You Don\'t have Service\'s Yey');
    //     } catch (Throwable $e) {
    //         return view('dashboard.categories.index');
    //     }
    // }

    // public function show($id)
    // {
    //     return view('dashboard.categories.index');
    // }

    // public function create($id)
    // {
    //     return view('dashboard.categories.create');
    // }

    // public function store(Request $request)
    // {
    //     $category = new Category();
    //     $category->fill($request->all());
    //     $category->save();
    //     return response()->json(['success' => true]);
    // }

    // public function edit($id)
    // {
    //     $category = Category::findOrFail($id);
    //     return response()->json($category);
    // }

    // public function update(Request $request, $id)
    // {
    //     $category = Category::findOrFail($id);
    //     $category->fill($request->all());
    //     $category->save();
    //     return response()->json(['success' => true]);
    // }

    // public function delete($id)
    // {

    //     $category = Category::findOrFail($id);
    //     $category->delete();
    //     return response()->json(['success' => true]);
    // }
}

