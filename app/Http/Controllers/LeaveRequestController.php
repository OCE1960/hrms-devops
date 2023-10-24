<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

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

    public function viewLeaveRequest(Request $request, $id)
    {

        $leaveRequest = LeaveRequest::find($id);

        //Redirect to the Role page if validation fails.
         if (empty($leaveRequest)) {
           return $this->sendErrorResponse(['Invalid LeaveREquest does not exist']);
        }
       $data = ['leaveRequest' => $leaveRequest];

       return $this->sendSuccessResponse('LeaveRequest Record Successfully Retrived',$data);
       
    }
}
