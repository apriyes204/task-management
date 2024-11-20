<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserPassword;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::with(['tasks'])->latest()->paginate(10);
        $userCount = User::count();
        $taskCount = Task::count();
        $taskCompleted = Task::where('status', 'completed')->count();
        $taskPending = Task::where('status', 'pending')->count();
        return view('pages.users-all', [
            'items' => $items,
            'userCount' => $userCount,
            'taskCount' => $taskCount,
            'taskCompleted' => $taskCompleted,
            'taskPending' => $taskPending,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = User::findOrFail($id);
        return view('auth.password', ['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('auth.profile', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'current_password' => 'required|current_password',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        if(!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->password);
        if($user->save()) {
            return redirect()->route('users.profile', ['id' => $user->id])->with('status', 'Your password has been updated.');
        } else {
            return back()->withErrors(['error' => 'Failed to update password.']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Auth::logout();
        return redirect()->route('login')->with('status', 'User has been deleted.');
    }
}
