<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;
use App\Imports\EtudiantsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Faculte;
use App\Models\Niveau;
use App\Models\Semestre;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('admin.etudiants.index', compact('etudiants'));
    }

    public function importEtudiants()
    {
        return view('admin.etudiants.import');
    }


    public function uploadEtudiant(Request $request)
    {
        Excel::import(new EtudiantsImport, $request->file);
        
        return redirect()->route('list-etudiants')->with('success', 'Etudiant Imported Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEtudiant()
    {
        return view('admin.etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'date_de_naissance' => 'required',
            'adresse' => 'required',
            'status' => 'required',
            
        ]);

        try {
            DB::beginTransaction();

            //la forme logique pour enregister les données des étudiants avec laravel

            $create_etudiant = Etudiant::create([
                'matricule' => $request->matricule,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'status' => $request->status,
                'adresse' => $request->adresse,
                'date_de_naissance' => $request->date_de_naissance,              
            ]);

            if(!$create_etudiant)
            {
                DB::rollBack();
                return back()->with('error', "Quelque chose s'est mal passée lors de l'enregistrement de données !");
            }

            DB::commit();
            return redirect()->route('list-etudiants')->with('success', "L'étudiant a été enregistré avec succès !");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }

    public function niveauIndex()
    {
        return view('admin.etudiants.niveau');
    }


    public function getFaculty()
    {
        $facultes = Faculte::all();
        return view('admin.facultes.index', compact('facultes'));
    }

    public function storeFaculty(Request $request)
    {
        $facultes = $request->validate([
            'nom' => 'required',
            'sigle' => 'required',

        ]);

        if($facultes)
        {
            $facultes_create = Faculte::create([
                'nom' =>$request ['nom'],
                'sigle' =>$request ['sigle'],
            ]);
        }

        return redirect()->back()->with('success', 'La faculté a été ajoutée !');
    }

    public function editEtudiant($id)
    {
        $editEtud = Etudiant::findOrFail($id);
        $facultes = Faculte::all();
        return view('admin.etudiants.edit', compact('editEtud', 'facultes'));
    }


    public function updateEtudiant(Request $request, $id)
    {

        $valideData = $request->validate([

            'matricule'=>"required",
            'nom'=>"required",
            'prenom'=>"required",
            'date_de_naissance'=>"required",
            'email'=>"required",
            'adresse'=>"required",
            'telephone'=>"required",
            'status'=>"required",
        ]);


        if($valideData)
        {
            $create = Etudiant::whereId($id)->update(
                [
                    'matricule' =>$request['matricule'],
                    'nom' =>$request['nom'],
                    'prenom' =>$request['prenom'],
                    'date_de_naissance' =>$request['date_de_naissance'],
                    'email' =>$request['email'],
                    'telephone' =>$request['telephone'],
                    'adresse' =>$request['adresse'],
                    'status' =>$request['status'],
                    'faculte_id' =>$request['faculte_id'],
                ]
            );
        }

        return redirect()->route('list-etudiants')->with('success', "L'inscription de l'étudiant a été validée");

    }


    // public function importEtud()
    // {
    //     return view('admin.etudiants.import');
    // }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }
}
