<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\About;
use App\Models\Link;
use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Service;

class AdminController extends Controller
{
    public function index()
    {
        $notifications = Auth::guard('admin')->user()->notifications;

        $visitorsAll = Visitor::all();
        $visitors = $visitorsAll->count();
        $uniqueVisit = $visitorsAll->unique('ip_address')->count();

        // Get setting with its relationships
        $setting = Setting::with(['Positions', 'Links'])->first();
        if (!$setting) {
            $setting = new Setting();
            $setting->photo = 'default-profile.jpg';
        }

        // Get positions array and convert to string
        $positionArr = $setting->Positions ?? collect([]);
        $positions = $positionArr->isNotEmpty() ? $positionArr->implode('position', ', ') : '';

        $links = $setting->Links ?? collect([]);

        // Get other data
        $about = About::first() ?? new About();
        $categories = Category::with('skills')->get();
        $educations = Education::all()->reverse();
        $experiences = Experience::all()->reverse();
        $projects = Project::all();
        $services = Service::all();
        $uniqueCategory = Project::select('category')->distinct()->get();

        return view('dashboard.index', compact(
            'visitors',
            'uniqueVisit',
            'notifications',
            'projects',
            'setting',
            'about',
            'links',
            'categories',
            'educations',
            'experiences',
            'services',
            'uniqueCategory',
            'positions'
        ));
    }

}
