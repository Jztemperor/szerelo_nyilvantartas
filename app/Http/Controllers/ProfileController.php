<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkerStatesView;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ProfileController extends Controller
{
    public function index() : View
    {
        return view('pages.profile', [
            'titles' => ['Profile']
        ]);
    }
}
