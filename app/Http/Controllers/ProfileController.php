<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
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

    public function update(ChangePasswordRequest $request, string $id)
    {

        $user = User::findOrFail($id);
        $user->password = $request->password;
        $user->save();

        return redirect()->route('profile');
    }
}