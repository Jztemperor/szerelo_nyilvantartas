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
            'titles' => [
                [
                    'name' => 'Workers',
                    'url' => '/workers'
                ]
            ],
            'workers' => WorkerStatesView::orderby('works', 'asc')->paginate(5)
        ]);
    }
}
