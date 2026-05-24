<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        $notifications = Notification::where('status', $status)->latest()->get();

        return view('item.notification', compact('notifications', 'status'));
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return back();
    }
}
