<?php
 
namespace App\Http\Controllers;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Hash;
use DB;
use Session;
use App\User;

use Illuminate\Support\Facades\Auth;
 
class DoctorController extends Controller
{
    public function index()
    {
        return view('auth.doctor');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('staffzone');
        }
        return redirect("login");
    }
}
