<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\Session;
use Throwable;

class LinksController extends Controller
{
    public $links;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Link $links, Request $request)
    {
        $this->links = $links;
        $this->array = [
            'icon' => $request->icon,
            'link' => $request->link,
        ];
    }

    public function index($id)
    {
        try {
            $setting_id = $id;
            $links = $this->links->where('setting_id', $id)->get();
            if ($links) {
                return view('dashboard.settings.links.index', compact('links', 'setting_id'));
            }
            redirect()->route('admin.settings.index')->with('success', 'You Don\'t have Link\'s Yey');
        } catch (Throwable $e) {
            return view('dashboard.settings.links.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.settings.links.index');
    }

    public function create($id)
    {
        return view('dashboard.settings.links.create');
    }

    public function store(Request $request, $id)
    {
        $links = $this->links->create([
            'icon' => $request->icon,
            'link' => $request->link,
            'setting_id' => $id
        ]);
        return response()->json(['success' => true]);

    }

    public function edit($id)
    {
        $links = $this->links->findOrFail($id);
        return response()->json($links);
    }

    public function update($id)
    {
        $links = $this->links->findOrFail($id);
        if ($links) {
            $links->update($this->array);
            return response()->json(['success' => true]);
        }
    }

    public function delete($id)
    {

        $links = $this->links->findOrFail($id);
        if ($links) {
            $links->delete();
            return response()->json(['success' => true]);
        }
    }
}
