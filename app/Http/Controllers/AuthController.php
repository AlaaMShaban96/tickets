<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    // login view
    public function loginView()
    {
        return view('auth.login');
    }
    //login function
    public function login(Request $request)
    {
       // validate the request...
         $request->validate([
              'email' => 'required|exists:users,email',
              'password' => 'required',
         ]);
         // check if the user exist in the database and redirect to the dashboard
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                Alert::toast('Welcome back bro ✌️', 'success')->position('top-end')->autoClose(5000);
                return redirect()->to(route('dashboard.index'));
            }
            // if the user not exist in the database redirect to the login page with error message
            return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');

    }
    // logout function
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    // dashboard function
    public function dashboard()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view();
    }


}
