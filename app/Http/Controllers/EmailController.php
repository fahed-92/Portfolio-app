<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::latest()->paginate(10);
        $unreadCount = Email::where('is_read', false)->count();

        return view('dashboard.emails.index', compact('emails', 'unreadCount'));
    }

    public function show(Email $email)
    {
        $email->update(['is_read' => true]);
        return view('dashboard.emails.show', compact('email'));
    }

    public function markAsRead(Email $email)
    {
        $email->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    public function markAsUnread(Email $email)
    {
        $email->update(['is_read' => false]);
        return response()->json(['success' => true]);
    }

    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('admin.emails.index')->with('success', 'Email deleted successfully');
    }
}
