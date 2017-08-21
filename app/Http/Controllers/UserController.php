<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;

class UserController extends Controller
{
//    public function getAll()
//    {
//        return view('auth.login');
//    }

// Show all item in main page
    public function getAll()
    {
        // Get items and order it by id desc & paginate 9 per page
        $Item = Item::orderBy('id', 'desc')->paginate(9);
        return view('welcome', compact('Item'));
    }

//    sort item in main page order by A-Z
    public function getAtoZ()
    {
        // Get items and order it by item_name asc & paginate 9 per page
        $Item = Item::orderBy('item_name', 'asc')->paginate(9);
        return view('welcome', compact('Item'));
    }


//    sort item in main page order by Z-A
    public function getZtoA()
    {
        // Get items and order it by item_name desc & paginate 9 per page
        $Item = Item::orderBy('item_name', 'desc')->paginate(9);
        return view('welcome', compact('Item'));
    }

//    sort item in main page order by Big price first
    public function getbigPrice()
    {
        // Get items and order it by item_Price desc & paginate 9 per page
        $Item = Item::orderBy('item_Price', 'desc')->paginate(9);
        return view('welcome', compact('Item'));
    }

    //    sort item in main page order by low price first
    public function getlowPrice()
    {
        // Get items and order it by item_Price asc & paginate 9 per page
        $Item = Item::orderBy('item_Price', 'asc')->paginate(9);
        return view('welcome', compact('Item'));
    }

    // go to Login page
    public function getLogin()
    {
        return view('auth.login');
    }

    // make validation and check login & login
    public function AttemptLogin(Request $request)
    {
        // validation for login
        $validator = Validator::make($request->all(), [
//            'email'=>'required|email|exists:users,user_email',
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            // return back with errors if validation not valid
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        } else {
            $cred = $request->only('email', 'password');

            if (Auth::attempt($cred, $request->remember_me)) {
                return redirect('/');
            } else {
                return "Not Logged In";
            }
        }
    }

// go to logut page
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

// go to register page
    public function getRegister()
    {
        return view('auth.register');
    }

    // make validation to register information & register user

    public function AttemptRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'email'=>'required|email|exists:users,user_email',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($user->save()) {
            $cred = $request->only('email', 'password');
            if (Auth::attempt($cred))
                // return Auth::user();
                return redirect('/');
            else
                return "not Auth";
        } else
            return abort(500);
    }

    // go to samsung items page
    public function getSamsung()
    {
        $Item = Item::where('item_company', 'like', 'samsung')->orderBy('id', 'desc')->paginate(9);
        return view('categories.samsung', compact('Item'));
    }

// go to iphone items page
    public function getIphone()
    {
        $Item = Item::where('item_company', 'like', 'iphone')->orderBy('id', 'desc')->paginate(9);
        return view('categories.iphone', compact('Item'));
    }

// go to description item page with find function to find the specific item that user select it
    public function getItemDescription($id)
    {
        $Item = Item::find($id);
        return view('categories.itemDescription', compact('Item'));
    }

// go to user page in dashboard
    public function getUsers()
    {
        $User = User::all();
        return view('mobAdmin.users', compact('User'));
    }

    // inset new user in dashboard page with make validation to information
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

// make search to item in main page
    public function searchMain(Request $request)
    {
        $search = $request->search;
        $searchResults = Item::where('item_name', 'like', '%' . $search . '%')
            ->get();
        $Item = Item::orderBy('id', 'desc')->paginate(9);
        return view('welcome', compact('searchResults', 'Item'));
    }

// make search for item in samsung page & just search in samsung's items
    public function searchSamsung(Request $request)
    {
        $search = $request->search;
        $searchResults = Item::where('item_name', 'like', '%' . $search . '%')->where('item_company', 'like', 'samsung')
            ->get();
        $Item = Item::where('item_company', 'like', 'samsung')->orderBy('id', 'desc')->paginate(9);
        return view('categories.samsung', compact('searchResults', 'Item'));
    }

// make search for item in iphone page & just search in iphone's items
    public function searchIphone(Request $request)
    {
        $search = $request->search;
        $searchResults = Item::where('item_name', 'like', '%' . $search . '%')->where('item_company', 'like', 'iphone')
            ->get();
        $Item = Item::where('item_company', 'like', 'iphone')->orderBy('id', 'desc')->paginate(9);
        return view('categories.iphone', compact('searchResults', 'Item'));
    }

// search in user in dashboard page
    public function index(Request $request)
    {
        $search = $request->search;
        $searchResults = User::where('name', 'like', '%' . $search . '%')
            ->get();
        $User = User::all();
        return view('mobAdmin.users', compact('searchResults', 'User'));
    }

// delete user from dashboard page
    public function deleteUser($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect('/dashboard/users');
    }

// edit user information from  dashboard page
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

// go to edit user information page
    public function updateUserPage($id)
    {
        $User = User::find($id);
        return view('mobAdmin.updateUser', compact('User'));
    }

    // go to AboutUs page
    public function getAboutUs()
    {
        return view('aboutUs');
    }
}
