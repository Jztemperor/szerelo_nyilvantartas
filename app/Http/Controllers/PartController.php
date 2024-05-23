<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Models\Part;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $query = Part::query();

        if ($search) {
            $query = Part::where('name', 'like', "%$search%");
        }

        $parts = $query->paginate(10);

        return view('contents.parts.index',[
            'titles' => [
                [
                    'name' => 'Parts',
                    'url' => '/parts'
                ]
            ],
        ] , compact('parts'));
    }


    public function create(): View
    {
        return view('contents.parts.create',[
            'titles' => [
                [
                    'name' => 'Parts',
                    'url' => '/parts'
                ],
                [
                    'name' => 'Create',
                    'url' => '#'
                ]
            ]
        ]);
    }

    public function store(StorePartRequest $storePartRequest): RedirectResponse
    {
        Part::create($storePartRequest->validated());

        return redirect()->route('parts.index');
    }

    public function update(UpdatePartRequest $updatePartRequest, string $id)
    {
        $part = Part::findOrFail($id);
        if ($part->quantity < $updatePartRequest->quantity) {
            $part->quantity = $updatePartRequest->quantity;
            $part->save();

            return redirect()->route('parts.index');
        }

        return redirect()->back()->with('text', 'You cannot lower the quantity!');
    }
}
