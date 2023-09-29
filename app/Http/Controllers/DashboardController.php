<?php

namespace App\Http\Controllers;


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
}
