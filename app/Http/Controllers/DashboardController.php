<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View
    {
        $user = Auth::user();
        $workorders = $user->workorders;

        return view('pages.dashboard', [
            'titles' => [],
            'user' => $user,
            'workorders' => $workorders
        ]);
    }
}
