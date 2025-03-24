<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Throwable;

class PositionsController extends Controller
{
    public $positions;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Position $positions, Request $request)
    {
        $this->positions = $positions;
        $this->array = [
            'position' => $request->position,
        ];
    }

    public function index($id)
    {
        try {
            $setting_id = $id;
            $positions = $this->positions->where('setting_id', $id)->get();
            if ($positions) {
                return view('dashboard.settings.positions.index', compact('positions', 'setting_id'));
            }
            redirect()->route('admin.settings.index')->with('success', 'You Don\'t have positions Yey');
        } catch (Throwable $e) {
            return view('dashboard.settings.positions.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.settings.positions.index');
    }

    public function create($id)
    {
        $setting_id = $id;
        return view('dashboard.settings.positions.create', compact('setting_id'));
    }

    public function store(Request $request, $id)
    {
        try {
            $positions = $this->positions->create([
                'position' => $request->position,
                'setting_id' => $id
            ]);
            return response()->json(['success' => true]);

        } catch (Throwable $e) {
            return view('dashboard.settings.positions.index');
        }
    }

    public function edit($id)
    {
        $position = $this->positions->findOrFail($id);
        return response()->json($position);
    }

    public function update(Request $request ,$id)
    {
        $position = Position::findOrFail($id);
        $position->update([
            'position' => $request->position
        ]);
            return response()->json(['success' => true]);
    }

    public function delete($id)
    {

        $positions = $this->positions->findOrFail($id);
        if ($positions) {
            $positions->delete();
            return response()->json(['success' => true]);
        }
    }
}
