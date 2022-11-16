<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant;
use App\Models\User;

class RegisteredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscrit()
    {
        $inscrits = Etudiant::where('etat_candidat', 'inscrit')->get(); 
        return view('admin.etudiants.inscrit', compact('inscrits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
