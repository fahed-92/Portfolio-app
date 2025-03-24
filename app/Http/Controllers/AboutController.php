<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;
use Illuminate\Support\Facades\File;


class AboutController extends Controller
{
    public $abouts;

    /**
     * Class constructor.
     */
    public function __construct(About $abouts)
    {
        $this->abouts = $abouts;
    }

    public function index()
    {
        try {
            $abouts = $this->abouts->get();
            return view('dashboard.abouts.index', compact('abouts'));
        } catch (Throwable $e) {
            return view('dashboard.abouts.index');
        }
    }

    public function show($id)
    {
        try {
            $about = $this->abouts->findOrFail($id);

            return view('dashboard.abouts.show',compact('about'));
        } catch (Throwable $e) {
            return view('dashboard.abouts.index');
        }
    }

    public function create()
    {
            return view('dashboard.abouts.create');
    }

    public function store(Request $request)
    {
        try {
            $about = About::create([
            'summary'=>$request->summary,
            'title'=>$request->title,
            'birthday'=>$request->birthday,
            'nationality'=>$request->nationality,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'age'=>$request->age ,
            'degree'=>$request->degree,
            'email'=>$request->email,
            'freelance'=>$request->freelance,
            'address'=>$request->address,
            'image'=> $this->uploadImage($request->image , 'About')

            ]);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $about = $this->abouts->findOrFail($id);
            return response()->json($about);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request , $id)
    {
        try {
           $about = $this->abouts->findOrFail($id);
                $about->update([
                    'summary'=>$request->summary,
                    'title'=>$request->title,
                    'birthday'=>$request->birthday,
                    'nationality'=>$request->nationality,
                    'phone'=>$request->phone,
                    'city'=>$request->city,
                    'age'=>$request->age ,
                    'degree'=>$request->degree,
                    'email'=>$request->email,
                    'freelance'=>$request->freelance,
                    'image'=> $this->uploadImage($request->image , 'About')
                ]);
                return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $abouts = $this->abouts->findOrFail($id);
            $abouts->delete();
            return response()->json(['success' => true]);
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
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
