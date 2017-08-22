<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    // go to dashboard
    public function getDashboard()
    {
        return view('mobAdmin.dashboard');
    }

// go to Admins
    public function getAdmins()
    {
        $Admin = Admin::all();
        return view('mobAdmin.admins', compact('Admin'));
    }

// delete Admin
    public function deleteAdmin($id)
    {
        $Admin = Admin::find($id);
        $Admin->delete();
        return redirect('/dashboard/admins');
    }

// insert new Admin
    public function insertAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin_fullname' => 'required ',
            'admin_username' => 'required|unique:admins',
            'admin_password' => 'required|min:6 ',
            'admin_password_repeat' => 'required|same:admin_password',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {

            $Admin = new Admin;
            $Admin->admin_fullname = $request->admin_fullname;
            $Admin->admin_username = $request->admin_username;
            $Admin->admin_password = bcrypt($request->admin_password);
            $Admin->save();
            return redirect('/dashboard/admins');
        }
    }

// edit Admin information in dashboard
    public function updateAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin_fullname' => 'required ',
            'admin_username' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {
            $Admin = Admin::find($request->admin_id_edit);
            $Admin->admin_fullname = $request->admin_fullname;
            $Admin->admin_username = $request->admin_username;
            $Admin->save();
            return redirect('/dashboard/admins');
        }
    }
// go to edit page in dashboard
    public function updateAdminPage($id)
    {
        $Admin = Admin::find($id);
        return view('mobAdmin.updateAdmin', compact('Admin'));
    }

    public function updateAdmintoPage()
    {
        return view('mobAdmin.updateAdmin');
    }
// go to reset admin password page in dashboard
    public function resetPasswordAdminPage($id)
    {
        $Admin = Admin::find($id);
        return view('mobAdmin.resetPassword', compact('Admin'));
    }
// reset admin password
    public function resetPasswordAdmin(Request $request)
    {
        $Admin = Admin::find($request->admin_id_edit);
        $Admin->admin_password = bcrypt("112233");
        $Admin->save();
        return redirect('/dashboard/admins');
    }
// search admin in dashboard
    public function index(Request $request)
    {
        $search = $request->search;
        $searchResults = Admin::where('admin_fullname', 'like', '%' . $search . '%')
            ->get();
        $Admin = Admin::all();
        return view('mobAdmin.admins', compact('searchResults', 'Admin'));
    }
}
