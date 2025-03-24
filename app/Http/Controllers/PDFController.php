<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SkillsCategory;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'setting' => Setting::with(['Positions', 'Links'])->first(),
            'about' => About::first(),
            'categories' => SkillsCategory::with('Skills')->get(),
            'educations' => Education::all(),
            'experiences' => Experience::orderBy('from_year', 'desc')->get(),
            'projects' => Project::all(),
            'services' => Service::all(),
        ];

        $pdf = PDF::loadView('dashboard.pdf.portfolio', $data);

        // Save to storage
        $path = public_path('storage/pdfs/');
        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $fileName = 'portfolio_' . time() . '.pdf';
        $pdf->save($path . $fileName);

        // Return download link
        return response()->download($path . $fileName);
    }
}
