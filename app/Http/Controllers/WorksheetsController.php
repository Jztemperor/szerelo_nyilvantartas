<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WorksheetsController extends Controller
{

    public function index(Request $request) : View
    {
        $search = $request->input('search');
        $user = Auth::user();


        $query = WorkOrder::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        });

        if ($search) {
            $query->whereHas('owner', function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                      ->orWhere('last_name', 'like', "%$search%");
            });
        }

        $workorders = $query->paginate(10);

        return view('pages.worksheets', [
            'titles' => ['Worksheets'],
            'workorders'=> $workorders
        ]);
    }

    public function show(Request $request, $id) : View
    {
        $workorder = WorkOrder::findOrFail($id);
        $this->authorize('view', $workorder);

        $total = $workorder->calculateTotal(10000);
        
        foreach($workorder->users as $user)
        {
            if($user->role->name == 'operator')
            {
                $operator = $user->name;
            } else if($user->role->name == 'mechanic')
            {
                $mechanic = $user->name;
            }
        }

        return view('contents.worksheets.show',[
            'titles' => ['Worksheets', 'View'],
            'workorder' => $workorder,
            'total' => $total,
            'operator' => $operator,
            'mechanic' => $mechanic
        ]);
    }
}
