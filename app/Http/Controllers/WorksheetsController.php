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
            'titles' => [
                [
                    'name' => 'Worksheets',
                    'url' => '/worksheets'
                ]
            ],
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
            'titles' => [
                [
                    'name' => 'Worksheets',
                    'url' => '/worksheets'
                ],
                [
                    'name' => 'View',
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
        $this->authorize('update', $workorder);

        $workorder->status = "Closed";
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
                    'name' => 'Worksheets',
                    'url' => '/worksheets'
                ],
                [
                    'name' => 'Create',
                    'url' => '#'
                ]
            ],
            'mechanics' => $mechanics
        ]);
    }

    public function store(StoreWorksheetRequest $request)
    {
        $currentUser = Auth::user();
        $mechanic = User::findOrFail($request->mechanic);

        // Create owner
        $owner = Owner::make();
        $owner->first_name = $request->owner_first_name;
        $owner->last_name = $request->owner_last_name;
        $owner->phone = $request->owner_phone;
        $owner->save();


        // Create car
        $car = Car::make();
        $car->make = $request->make;
        $car->model = $request->model;
        $car->license_plate = $request->license_plate;
        $car->manufacturing_year = $request->manufacturing_year;
        $owner->cars()->save($car);

        // Create address
        $address = Address::make();
        $address->country = $request->owner_country;
        $address->city = $request->owner_city;
        $address->state = $request->owner_state;
        $address->zip_code = $request->owner_zip;
        $address->street = $request->owner_street;
        $address->street_nr = $request->owner_steetnr;
        $owner->address()->save($address);

        $workorder = WorkOrder::make();
        $workorder->status = "Started";
        $owner->workorders()->save($workorder);
        $workorder->users()->save($currentUser);
        $workorder->users()->save($mechanic);

        return redirect()->route('worksheets.index')->with('text', 'Worksheet created successfully!');

    }
}
