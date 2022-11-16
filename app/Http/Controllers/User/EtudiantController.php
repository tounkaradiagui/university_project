<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Etudiant;
use App\Models\User;
use App\Exports\EtudiantsExport;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user(); //authenticate user
        $auth = User::where('id', $users->id)->first(); //getting the auth user id
        $etudiants = Etudiant::where('etat_candidat', 'non_inscrit')->get(); 
        return view('users.etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('users.etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRegist(Request $request)
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
                'etat_candidat' => 'inscrit',
                'adresse' => $request->adresse,
                'date_de_naissance' => $request->date_de_naissance,              
                'sexe' => $request->sexe,              
                              
            ]);

            if(!$create_etudiant)
            {
                DB::rollBack();
                return back()->with('error', "Quelque chose s'est mal passée lors de l'enregistrement de données !");
            }

            DB::commit();
            return redirect()->route('list.etudiants')->with('success', "L'étudiant a été enregistré avec succès !");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }


        
    }

    public function exportEtudiantsTo()
    {
        return Excel::download(new EtudiantsExport, 'Liste de nouveaux bacheliers.xlsx');
    }



    public function editEtud($id)
    {
        $try = Etudiant::all();
        $validate = Etudiant::findOrFail($id);
        return view('users.etudiants.validate', compact('validate', 'try'));
    }


    public function updat(Request $request, $id)
    {

        $valideData = $request->validate([

            'matricule'=>"required",
            'nom'=>"required",
            'prenom'=>"required",
            'date_de_naissance'=>"required",
            'age'=>"required",
            'email'=>"required",
            'adresse'=>"required",
            'telephone'=>"required",
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

        return redirect()->route('list.etudiants')->with('success', "L'inscription de l'étudiant a été validée");

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
