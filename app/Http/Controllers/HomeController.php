<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Home;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SkillsCategory;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class HomeController extends Controller
{
    public $homes;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Home $homes, Request $request)
    {
        $this->homes = $homes;
        $this->array = [
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $request->photo
        ];
    }

    public function index()
    {
        $homes = $this->homes->get();
        return view('dashboard.settings.index', compact('homes'));
    }

    public function homePage()
    {
        $setting = Setting::with(['Positions', 'Links'])->get()->first();
        if (!$setting) {
            $setting = new Setting();
            $setting->photo = 'default-profile.jpg';
        }
        $positionArr = $setting->Positions ?? collect([]);
        $links = $setting->Links ?? collect([]);
        $positions = $positionArr->isNotEmpty() ? $positionArr->implode('position', ', ') : '';

        $about = About::get()->first();
        if (!$about) {
            $about = new About();
            $about->summary = 'No summary available yet.';
            $about->birthday = 'Not specified';
            $about->nationality = 'Not specified';
            $about->phone = 'Not specified';
            $about->city = 'Not specified';
            $about->age = 'Not specified';
            $about->degree = 'Not specified';
            $about->email = 'Not specified';
        }

        $categories = SkillsCategory::with('Skills')->get();
        $educationsAll = Education::get();
        if ($educationsAll->isEmpty()) {
            $educations = collect([
                (object)[
                    'faculty' => 'Computer Engineering',
                    'university' => 'Islamic University of Gaza',
                    'from' => '2010-09-01',
                    'to' => '2015-06-30',
                    'grade' => 'Bachelor'
                ]
            ]);
        } else {
            $educations = $educationsAll->reverse();
        }
        $experiencesAll = Experience::get();
        $experiences = $experiencesAll->reverse();
        $services = Service::get();
        $projectsCategories = Project::select(['category'])->get();
        $unique = $projectsCategories->unique('category');
        $projects = Project::all();

        $uniqueCategory = $unique->values()->all(); // Reset keys and convert to an array
//        return $ProjectCategories=$projects->select(['category']);

        return view('welcome',
            compact(
                'setting', 'positions', 'links',
                'about', 'categories', 'educations', 'experiences',
                'services', 'projects', 'uniqueCategory'
            ));
    }

    public function show($id)
    {
        return view('dashboard.about.index');
    }

    public function create()
    {
        return view('dashboard.settings.create');
    }

    public function store()
    {
        $homes = $this->homes->create($this->array);
        if ($homes) {
            return redirect()->route('admin.settings.index')->with('success', 'تم إضافة العنصر بنجاح');
        }
    }

    public function edit($id)
    {
        $homes = $this->homes->findOrFail($id);
        return view('dashboard.settings.edit', compact('homes'));
    }

    public function update($id)
    {
        $homes = $this->settings->findOrFail($id);
        if ($homes) {
            $homes->update($this->array);
            return back()->with('success', 'تم تحديث البيانات بنجاح');
        }
    }

    public function delete($id)
    {

        $homes = $this->settings->findOrFail($id);
        if ($homes) {
            $homes->delete();
            return back()->with('success', 'تم حذف البيانات بنجاح');
        }
    }
}
