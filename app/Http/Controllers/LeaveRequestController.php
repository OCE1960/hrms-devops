<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveRequets = LeaveRequest::all();
        return view('leave-requests')->with('leaveRequets', $leaveRequets); 
    }
}
