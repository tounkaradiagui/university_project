<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;
use App\Models\User;
use App\Imports\EtudiantsImport;
use App\Exports\EtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
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
    public function form()
    {
        return view('admin.etudiants.form-step');
    }

    public function deleteStudent(Request $request)
    {
        $ids = $request->$ids;
        Etudiant::whereIn('id', $ids)->delete();
        return response()->json(['success'=> 'liste supprimée avec succès']);
    }

    public function index()
    {
        $etudiants = Etudiant::where('etat_candidat', 'non_inscrit')->get(); 
        return view('admin.etudiants.index', compact('etudiants'));
    }

    public function importEtudiants()
    {
        return view('admin.etudiants.import');
    }


    public function uploadEtudiant(Request $request)
    {
        Excel::import(new EtudiantsImport, $request->file);
        
        return redirect()->route('list-etudiants')->with('success', 'La liste de bacheliers a été importé avec succès');
    }

    public function exportEtudiants()
    {
        return Excel::download(new EtudiantsExport, 'etudiants.xlsx');
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
            'statut' => 'required',
            
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
                'statut' => $request->statut,
                'etat_candidat' => 'non_inscrit',
                'adresse' => $request->adresse,
                'date_de_naissance' => $request->date_de_naissance,              
                'age' => $request->age,              
                'lieu_de_naissance' => $request->lieu_de_naissance,              
                'niveau' => $request->niveau,              
                'faculte' => $request->faculte,              
                'filiere' => $request->filiere,              
                'semestre' => $request->semestre,              
                'diplome' => $request->diplome,              
                'annee' => $request->annee,              
                'numero_de_place' => $request->numero_de_place,              
                'scolarite' => $request->scolarite,              
                'etablissement' => $request->etablissement,              
                'resultat' => $request->resultat,              
                'mention' => $request->mention,              
                'matricule_def' => $request->matricule_def,              
                'nom_pere' => $request->nom_pere,              
                'prenom_pere' => $request->prenom_pere,              
                'profession_pere' => $request->profession_pere,              
                'telephone_pere' => $request->telephone_pere,              
                'residence_pere' => $request->residence_pere,              
                'nom_mere' => $request->nom_mere,              
                'prenom_mere' => $request->prenom_mere,              
                'profession_mere' => $request->profession_mere,              
                'telephone_mere' => $request->telephone_mere,              
                'residence_mere' => $request->residence_mere,              
               
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($etudiant_id)
    {
        $student = Etudiant::findOrFail($etudiant_id);
        return view('admin.etudiants.show', compact('student'));
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
    public function inscrit()
    {
        $inscrits = Etudiant::where('etat_candidat', 'inscrit')->get(); 
        return view('admin.etudiants.inscrit', compact('inscrits'));
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
        return view('admin.etudiants.edit', compact('editEtud'));
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
            'statut'=>"required",
            'faculte'=>"required",
            'niveau'=>"required",
            'semestre'=>"required",
            'filiere'=>"required",
            'diplome'=>"required",
            'residence'=>"required",
        ]);


        if($valideData)
        {
            $create = Etudiant::whereId($id)->update(
                [
                    'matricule' =>$request['matricule'],
                    'nom' =>$request['nom'],
                    'prenom' =>$request['prenom'],
                    'date_de_naissance' =>$request['date_de_naissance'],
                    'age' =>$request['age'],
                    'email' =>$request['email'],
                    'telephone' =>$request['telephone'],
                    'adresse' =>$request['adresse'],
                    'statut' =>$request['statut'],
                    'etat_candidat' => 'inscrit',
                    'sexe' =>$request['sexe'],
                    'faculte' =>$request['faculte'],
                    'niveau' =>$request['niveau'],
                    'semestre' =>$request['semestre'],
                    'filiere' =>$request['filiere'],
                    'diplome' =>$request['diplome'],
                    'residence' =>$request['residence'],
                ]
            );
        }

        return redirect()->route('list-inscrit')->with('success', "L'inscription de l'étudiant a été validée");

    }

    public function deleteEtudiant(int $inscrit_id)
    {
        $etudiant_inscrit = Etudiant::findOrFail($inscrit_id);
        
        $etudiant_inscrit->delete();
        return redirect()->back()->with('success', 'La suppression a été effectuée');
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
