<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        // else  return 123;
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    
    public function dashboard()
    {
        if(Auth::check()){
            $user = Auth::user();
            Session::put('role', $user->role);
            // $clients = Client::orderBy('created_at', 'desc')->get();
            return view('welcome')->
            with([
                // 'clients'=>$clients
            ]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    // Registration

    public function registration()
    {
        return view('auth.register');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();

        // return $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $message = "Registration successfull";
        return redirect("dashboard")->with('success', $message);
    }
 

    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}