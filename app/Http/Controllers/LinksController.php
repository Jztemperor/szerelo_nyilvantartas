<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function getDashboard(Request $request) {
        return view('contents.dashboard-content');
    }
    public function getWorkers(Request $request) {
        return view('contents.workers-content');
    }
}
