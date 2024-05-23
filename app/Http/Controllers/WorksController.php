<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorksheetRequest;
use App\Models\Address;
use App\Models\Owner;
use App\Models\Car;
use App\Models\Part;
use App\Models\Task;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $user = Auth::user();


        $query = WorkOrder::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
            $query->where('status', '!=', 'Closed');
        });

        if ($search) {
            $query->whereHas('owner', function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            });
        }

        $workorders = $query->paginate(10);

        return view('pages.works', [
            'titles' => [
                [
                    'name' => 'Works',
                    'url' => '/works'
                ]
            ],
            'workorders' => $workorders
        ]);
    }

    public function edit(Request $request, $id): View
    {
        $workorder = WorkOrder::findOrFail($id);
        //$this->authorize('view', $workorder);

        if ($workorder->status === "Started") {
            $workorder->status = "Working";
            $workorder->save();
        }

        $total = $workorder->calculateTotal(10000);

        foreach ($workorder->users as $user) {
            if ($user->role->name == 'operator') {
                $operator = $user->name;
            } else if ($user->role->name == 'mechanic') {
                $mechanic = $user->name;
            }
        }


        return view('contents.works.edit', [
            'titles' => [
                [
                    'name' => 'Works',
                    'url' => '/works'
                ],
                [
                    'name' => 'Edit',
                    'url' => '/works/edit'
                ]
            ],
            'workorder' => $workorder,
            'total' => $total,
            'operator' => $operator,
            'mechanic' => $mechanic
        ]);
    }

    public function add_part_form($id): View
    {
        $parts = Part::where('quantity', '>', 0)->get();

        return view('contents.works.add-part', compact("parts", "id"));
    }

    public function add_part(Request $request, $id)
    {
        $workOrder = WorkOrder::findOrFail($id);
        $part = Part::findOrFail($request->part_id);

        // Check if the part is already attached, if so, increase the quantity
        if ($workOrder->parts->contains($part)) {
            $pivotRow = $workOrder->parts()->where('part_id', $part->id)->first()->pivot;
            $pivotRow->quantity += 1;
            $pivotRow->save();
        } else {
            // Otherwise, attach the part with quantity 1
            $workOrder->parts()->attach($part->id, ['quantity' => 1]);
        }

        $part->quantity -= 1;
        $part->save();

        return redirect()->route('works.show', $id);
    }

    public function add_task_form($id): View
    {
        return view('contents.works.add-task', compact('id'));
    }

    public function add_task(Request $request, $id)
    {
        $task = new Task();
        $task->name = $request->task;
        $task->duration = $request->duration;

        $workOrder = WorkOrder::findOrFail($id);

        $task->workorder()->associate($workOrder);
        $task->save();

        return redirect()->route('works.show', $id);
    }

    public function show(Request $request, $id): View
    {
        $workorder = WorkOrder::findOrFail($id);
        //$this->authorize('view', $workorder);

        $total = $workorder->calculateTotal(10000);

        foreach ($workorder->users as $user) {
            if ($user->role->name == 'operator') {
                $operator = $user->name;
            } else if ($user->role->name == 'mechanic') {
                $mechanic = $user->name;
            }
        }

        return view('contents.works.show', [
            'titles' => [
                [
                    'name' => 'Works',
                    'url' => '#'
                ]
            ],
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
            'titles' => [
                [
                    'name' => 'Works',
                    'url' => '/works'
                ],
                [
                    'name' => 'Create',
                    'url' => '#'
                ]
            ],
            'mechanics' => $mechanics
        ]);
    }
}
