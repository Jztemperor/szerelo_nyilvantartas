<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkerStatesView;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkersController extends Controller
{
    public function index() : View
    {
        return view('pages.workers', [
            'titles' => ['Workers'],
            'workers' => WorkerStatesView::orderby('works', 'asc')->paginate(5)
        ]);
    }
}
