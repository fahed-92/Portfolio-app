<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Email;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $visitors = Visitor::count();
        $uniqueVisit = Visitor::distinct('ip_address')->count();
        $todayVisitors = Visitor::whereDate('created_at', today())->count();
        $thisWeekVisitors = Visitor::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $recentVisitors = Visitor::latest()->take(5)->get();

        $unreadEmails = Email::where('is_read', false)->count();
        $recentEmails = Email::latest()->take(5)->get();

        return view('dashboard.layouts.dashboard', compact(
            'visitors',
            'uniqueVisit',
            'todayVisitors',
            'thisWeekVisitors',
            'recentVisitors',
            'unreadEmails',
            'recentEmails'
        ));
    }
}
