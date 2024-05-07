<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorksheetRequest;
use App\Models\Address;
use App\Models\Owner;
use App\Models\Car;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index(Request $request) : View
    {
        $search = $request->input('search');
        $user = Auth::user();


        $query = WorkOrder::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
            $query->where('status','!=','Closed');
        });

        if ($search) {
            $query->whereHas('owner', function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            });
        }

        $workorders = $query->paginate(10);

        return view('pages.works', [
            'titles' => ['Works'],
            'workorders'=> $workorders
        ]);
    }

    public function edit(Request $request, $id) : View
    {
        $workorder = WorkOrder::findOrFail($id);
        //$this->authorize('view', $workorder);

        if ($workorder->status === "Started") {
            $workorder->status = "Working";
            $workorder->save();
        }

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
            'titles' => ['Works', 'Edit'],
            'workorder' => $workorder,
            'total' => $total,
            'operator' => $operator,
            'mechanic' => $mechanic
        ]);
    }

    public function show(Request $request, $id) : View
    {
        $workorder = WorkOrder::findOrFail($id);
        //$this->authorize('view', $workorder);

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
            'titles' => ['Works', 'View'],
            'workorder' => $workorder,
            'total' => $total,
            'operator' => $operator,
            'mechanic' => $mechanic
        ]);
    }

    public function update(Request $request, $id)
    {
        $workorder = WorkOrder::findOrFail($id);
        //$this->authorize('update', $workorder);

        $workorder->status = "Finished";
        $workorder->save();

        return redirect()->back();
    }

    public function create()
    {
        $mechanics = User::join('roles', 'users.role_id', '=', 'roles.id')
                        ->where('roles.name', 'mechanic')
                        ->select('users.*')
                        ->get();

        return view('contents.worksheets.create', [
            'titles' => ['Worksheets', 'Create'],
            'mechanics' => $mechanics
        ]);
    }
}