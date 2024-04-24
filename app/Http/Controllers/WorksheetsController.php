<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\WorkOrder;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WorksheetsController extends Controller
{
    /*

    public function index() : View
    {
        return view('pages.worksheets',[
            'titles' => ['Worksheets'],
            'worksheets' => ['first','second','third'],
            'owners' => Owner::orderBy('created_at','DESC')->paginate(5)
        ]);
    }

    */

    public function index() : View
    {
        $workorders = WorkOrder::paginate(10);

        return view('pages.worksheets', [
            'titles' => ['Worksheets'],
            'workorders'=> $workorders
        ]);
    }

    public function show(Request $request, $id) : View
    {
        return view('contents.view_worksheet',[
            'titles' => ['Worksheets', 'View'],
        ]);
    }
}
