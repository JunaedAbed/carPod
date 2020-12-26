<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
        
    }
    
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    } 
    
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'uname'   => 'required|string',
            'password' => 'required|string',
        ]);
        
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['uname' => $request->uname, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
            // return redirect('/');
        }
        

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('uname', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
