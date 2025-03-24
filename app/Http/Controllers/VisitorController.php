<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::latest()->paginate(10);
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', today())->count();
        $thisWeekVisitors = Visitor::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $thisMonthVisitors = Visitor::whereMonth('created_at', now()->month)->count();

        return view('dashboard.visitors.index', compact(
            'visitors',
            'totalVisitors',
            'todayVisitors',
            'thisWeekVisitors',
            'thisMonthVisitors'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = new Agent();
        $userAgent = $request->userAgent();

        // Get IP address
        $ip = $request->ip();

        // Get location data using ip-api.com (free service)
        try {
            $locationData = Http::get("http://ip-api.com/json/{$ip}")->json();
            $location = isset($locationData['status']) && $locationData['status'] === 'success'
                ? $locationData['city'] . ', ' . $locationData['country']
                : 'Unknown';
        } catch (\Exception $e) {
            $location = 'Unknown';
        }

        // Better device detection
        $device = 'Unknown';
        if ($agent->isDesktop()) {
            $device = 'Desktop';
        } elseif ($agent->isTablet()) {
            $device = 'Tablet';
        } elseif ($agent->isMobile()) {
            $device = 'Mobile';
        }

        // Get browser with version
        $browser = $agent->browser() ? $agent->browser() . ' ' . $agent->version($agent->browser()) : 'Unknown';

        // Get OS with version
        $platform = $agent->platform() ? $agent->platform() . ' ' . $agent->version($agent->platform()) : 'Unknown';

        // Create visitor record
        Visitor::create([
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'device' => $device,
            'browser' => $browser,
            'platform' => $platform,
            'location' => $location,
            'visited_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
