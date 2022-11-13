<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;
// use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $users = Auth::user();

         
        if ($users->role == 'admin')
        {
            return view('admin.dashboard');
        }


        elseif ($users->role == 'user')
        {
            return view('users.dashboard');
        }

        
        elseif ($users->role == 'vendor')
        {
            return view('vendor.dashboard');
        }

        else{
            return view('home');
        }
    }

}
