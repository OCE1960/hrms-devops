<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\LeaveRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        $users = User::all();
        $leaveRequets = LeaveRequest::all();
        return view('dashboard')->with('roles', $roles)
            ->with('users', $users)
            ->with('leaveRequets', $leaveRequets); 
    }

    public function getUsers()
    {
        $users = User::all();
        return view('users')->with('users', $users); 
    }

    public function store(StoreUserRequest $request)
    {

        $user = new User;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();

        //$user->roles()->sync($request->role);

       return $this->sendSuccessMessage('Staff Record Successfully Saved');
       
    }
}
