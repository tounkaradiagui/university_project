<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    // public function getNonInscrit()
    // {
    //     $non_inscrit = Etudiant::where('etat_candidat', 'non_inscrit')->get()->count(); 
    //     return view('admin.dashboard', comapct('non_inscrit'));
    // }

    public function getProfile()
    {
        return view('admin.profile');
    }


    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->adresse = $request->input('adresse');
        $user->date_de_naissance = $request->input('date_de_naissance');
        $user->lieu_de_naissance = $request->input('lieu_de_naissance');
        $user->telephone = $request->input('telephone');
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');

        if ($request->hasFile('image'))
        {
            $destination = 'uploads/profile/' .$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
        }

            $user->update();
            return redirect()->back()->with('success', 'Votre profile a été modifié avec succès !');
    }



    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password))
        {
            return back()->with('error', "Le mot de passe ne correspond pas, veuillez entrer le bon mot de passe !");
        }
        
        User::whereId(auth()->user()->id)->update([
            'password'=> Hash::make($request->new_password)
        ]);
        
        return back()->with('success', "Votre mot de passe a été changé !");
    }
}
