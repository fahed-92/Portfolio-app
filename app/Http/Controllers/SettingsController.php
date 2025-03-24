<?php

namespace App\Http\Controllers;

use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;


class SettingsController extends Controller
{
    public $settings;
    use GeneralTrait;

    /**
     * Class constructor.
     */
    public function __construct(Setting $settings)
    {
        $this->settings = $settings;
    }

    public function index()
    {
        try {
            $settings = $this->settings->get();
            return view('dashboard.settings.index', compact('settings'));
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);

        }
    }

    public function show($id)
    {
        return view('dashboard.about.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        try {
            $photo = $request->file('photo');
            $setting = Setting::create([
                'name' => $request->name,
                'photo' => $this->uploadImage($photo, 'Setting')
            ]);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);

        }
    }

    public function edit($id)
    {
        try {
            $setting = $this->settings->findOrFail($id);
            return response()->json($setting);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $photo = $request->file('photo');
            $setting = Setting::findOrFail($id);

            $data = [
                'name' => $request->name,
            ];
            if ($photo) {
                $data['photo'] = $this->uploadImage($photo, 'Setting');
            }
            $setting->update($data);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        $settings = $this->settings->findOrFail($id);
        $settings->delete();
        return response()->json(['success' => true]);
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
