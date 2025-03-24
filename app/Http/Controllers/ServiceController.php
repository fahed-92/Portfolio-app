<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Throwable;

class ServiceController extends Controller
{
    public $services;
    public $array;

    /**
     * Class constructor.
     */
    public function __construct(Service $services, Request $request)
    {
        $this->services = $services;
        $this->array = [
            'service' => $request->service,
            'icon' => $request->icon,
            'description' => $request->description,
        ];
    }

    public function index()
    {
        try {
            $services = $this->services->get();
            if ($services) {
                return view('dashboard.services.index', compact('services',));
            }
            redirect()->route('admin.service.index')->with('success', 'You Don\'t have Service\'s Yey');
        } catch (Throwable $e) {
            return view('dashboard.services.index');
        }
    }

    public function show($id)
    {
        return view('dashboard.services.index');
    }

    public function create($id)
    {
        return view('dashboard.services.create');
    }

    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->fill($request->all());
        $service->save();
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    public function update(Request $request, $id)
    {
//        return $request;
        $service = Service::findOrFail($id);
        $service->fill($request->all());
        $service->save();
        return response()->json(['success' => true]);
    }

    public function delete($id)
    {

        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['success' => true]);
    }
}
