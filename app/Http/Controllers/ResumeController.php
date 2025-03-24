<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Throwable;

class ResumeController extends Controller
{
    public $resume;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Resume $resume, Request $request)
    {
        $this->resume = $resume;
        $this->array = [
            'resume' => $request->resume,
        ];
    }

    public function index()
    {
        try {
            return $resume = $this->resume->firstOrFail();
            if ($resume) {
                return view('dashboard.resume.index', compact('resume'));
            }
            redirect()->route('admin.categories.index')->with('success', 'You Don\'t have item\'s Yey');
        } catch (Throwable $e) {
            return view('dashboard.resume.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.resume.index');
    }

    public function create($id)
    {
        return view('dashboard.resume.create');
    }

    public function store(Request $request)
    {
        try {
//            $validated = $request->validated();
            $resume = $this->resume->create([
                'resume' => $request->resume,
            ]);
            if ($resume) {
                return redirect()->route('admin.resume.index')->with('success', 'تم إضافة العنصر بنجاح');
            }
        }catch (Throwable $e){
            return $e->getMessage();
        }

    }

    public function edit($id)
    {
        $resume = $this->resume->findOrFail($id);
        return view('dashboard.resume.edit', compact('resume'));
    }

    public function update(Request $request ,$id)
    {
        $resume = $this->resume->findOrFail($id);
        if ($resume) {
            $resume->update([
                'resume' => $request->resume
            ]);
            return back()->with('success', 'تم تحديث البيانات بنجاح');
        }
    }

    public function delete($id)
    {

        $resume = $this->resume->findOrFail($id);
        if ($resume) {
            $resume->delete();
            return back()->with('success', 'تم حذف البيانات بنجاح');
        }
    }
}
