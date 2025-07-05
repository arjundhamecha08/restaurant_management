<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function listStaffs(){
        $staffs = User::where('role', '!=', 'admin') // optional filter if needed
                  ->paginate(10); // 10 staff per page
        return view("admin-dashboard.manage-staffs",compact("staffs"));
    }
    public function removeStaff(Request $request, $id){
        $staff = User::find($id);
        if($staff){
            $staff->delete();
            return redirect()->back()->with("success", "Staff removed successfully.");
        }
        return redirect()->back()->with("error", "Staff not found.");
    }
}
