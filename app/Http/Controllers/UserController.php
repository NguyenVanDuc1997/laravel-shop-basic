<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll()
    {
        $users = $this->userService->getAllUser();
        return view('users.list', compact('users'));
    }

    public function delete($id) {
        $user = $this->userService->findById($id);
        $user->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('users.list');
    }

    public function showFormChangePassword($id) {
        $user = $this->userService->findById($id);
        return view('users.change-password', compact('user'));
    }

    public function changePassword(Request $request, $id)  {
        $user = $this->userService->findById($id);
        $this->userService->changePassword($user, $request);
        session()->flash('success', 'change password success!');
        return redirect()->route('users.list');
    }

    public function update($id) {
        $user = $this->userService->findById($id);
        if (Auth::user()->id == $user->id) {
            abort(403);
        }
        return view('users.edit', compact('user'));
    }

    public function edit(Request $request, $id) {
        $user = $this->userService->findById($id);
        if (Auth::user()->id == $user->id) {
            abort(403);
        }
        $this->userService->update($user, $request);
        session()->flash('success', 'change success!');
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('users.list');
    }

    public function create(){
        return view('users.create');
    }
}
