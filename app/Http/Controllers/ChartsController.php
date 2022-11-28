<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;


class ChartsController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        $months = Etudiant::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck("month");

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $etudiants[$index];
        }


        return view('admin.etudiants.chart', compact('datas'));

        
    }
}
