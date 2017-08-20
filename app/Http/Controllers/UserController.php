<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
//    public function getAll()
//    {
//        return view('auth.login');
//    }
    public function getAll()
    {
        $Item = Item::orderBy('id', 'desc')->paginate(9);

        return view('welcome', compact('Item'));
    }

    public function getSamsung()
    {
        $Item = Item::where('item_company', 'like', 'samsung')->orderBy('id', 'desc')->paginate(9);;
        return view('categories.samsung', compact('Item'));
    }

    public function getIphone()
    {
        $Item = Item::where('item_company', 'like', 'iphone')->orderBy('id', 'desc')->paginate(9);;
        return view('categories.iphone', compact('Item'));
    }

    public function getItemDescription ($id)
    {
              $Item = Item::find($id);
        return view('categories.itemDescription', compact('Item'));
    }

    public function getUsers()
    {
        $User = User::all();
        return view('mobAdmin.users', compact('User'));
    }

    public function insertUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required ',
            'user_id' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'user_password' => 'required|min:6 ',
            'user_password_repeat' => 'required|same:user_password',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {

            $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->user_id = $request->user_id;
            $User->password = bcrypt($request->user_password);
            $User->save();
            return redirect('/dashboard/users');
        }
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $searchResults = User::where('name', 'like', '%' . $search . '%')
            ->get();
        $User = User::all();
        return view('mobAdmin.users', compact('searchResults', 'User'));
    }

    public function deleteUser($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect('/dashboard/users');
    }


    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required ',
            'email' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {
            $User = User::find($request->user_id_edit);
            $User->name = $request->name;
            $User->email = $request->email;
            $User->user_id = $request->user_id;
            $User->save();
            return redirect('/dashboard/users');
        }
    }

    public function updateUserPage($id)
    {
        $User = User::find($id);
        return view('mobAdmin.updateUser', compact('User'));
    }
}
