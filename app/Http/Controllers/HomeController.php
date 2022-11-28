<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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

            // $etudiants = Etudiant::select(DB::raw("COUNT(*) as count"))
            //     ->whereYear('created_at', date('Y'))
            //     ->groupBy(DB::raw("Month(created_at)"))
            //     ->pluck('count');
            // $months = Etudiant::select(DB::raw("Month(created_at) as month"))
            //     ->whereYear('created_at', date('Y'))
            //     ->groupBy(DB::raw("Month(created_at)"))
            //     ->pluck("month");

            // $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
            // foreach($months as $index => $month)
            // {
            //     $datas[$month] = $etudiants[$index];
            // }

            $etudiants_non_inscris = Etudiant::where('etat_candidat', 'non_inscrit')->get()->count();
            $etudiants_inscris = Etudiant::where('etat_candidat', 'inscrit')->get()->count();
            $etudiants = Etudiant::count();
            $users = User::count();
            return view('admin.dashboard', compact('etudiants_non_inscris', 'etudiants_inscris', 'etudiants', 'users'));

           
        }


        elseif ($users->role == 'user')
        {
            $etudiants_inscris = Etudiant::where('etat_candidat', 'inscrit')->get()->count();
            $etudiants = Etudiant::count();
            $etudiants_users_non_inscris = Etudiant::where('etat_candidat', 'non_inscrit')->get()->count();
            return view('users.dashboard', compact('etudiants_users_non_inscris', 'etudiants_inscris', 'etudiants'));
        }

        
        elseif ($users->role == 'vendor')
        {
            return view('vendor.dashboard');
        }

        else{
            return view('auth.login');
        }
    }

}
