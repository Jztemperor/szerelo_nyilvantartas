<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function testapi(Request $request)
    {
        return ["username" => "marci", "email" => "marci@gmail.com", "kor" => 19];
    }
    public function testapi2(Request $request, $id)
    {
        $lista = ["marci", "gergo", "david"];
        return $lista[$id];
    }
    public function getDashboard(Request $request) {
        return view('contents.dashboard-content');
    }
    public function getWorkers(Request $request) {
        return view('contents.workers-content');
    }
}
