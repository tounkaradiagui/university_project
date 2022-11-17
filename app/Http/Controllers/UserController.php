<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Rules\MatchOldPassword;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            // 'role' => 'required',
            'status' => 'required',
            
        ]);

        try {
            DB::beginTransaction();

            //la forme logique pour enregister les données des utilisateurs avec laravel

            $create_user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'status' => $request->status,
                'role' => $request->role,
                'password' => Hash::make('password'),
                
            ]);

            if(!$create_user)
            {
                DB::rollBack();
                return back()->with('error', "Quelque chose s'est mal passée lors de l'enregistrement de données !");
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', "L'utilisateur a été enregistré avec succès !");

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
        $user = User::whereId($id)->first();

        if (!$user) {
            return back()->with('error', "L'utilisateur est introuvable !");
        }

        return view('admin.users.edit')->with([
            'user' => $user,
        ]);
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
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'role'       =>  'required',
        ]);

        try {
            DB::beginTransaction();

            //la forme logique pour enregister les données des utilisateurs avec laravel

            $update_user = User::where('id', $id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'role'        => $request->role,
            ]);

            if(!$update_user)
            {
                DB::rollBack();
                return back()->with('error', "Quelque chose s'est mal passée lors de la modification de données !");
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', "L'utilisateur a été modifié avec succès !");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_user = User::whereId($id)->delete();

            if(!$delete_user)
            {
                DB::rollBack();
                return back()->with('error', 'Erreur de suppression, veuillez réessayer !');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', "L'utilisateur a été supprimé avec succès !");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Pour modifier le status de l'utilisateur
     * @param Integer $user_id
     * @param Integer $status_code
     * @return Success Response
     */
    public function updateStatus($user_id, $status_code)
    {
        try {
           $update_user = User::whereId($user_id)->update([
                'status' => $status_code
           ]);

           if($update_user)
           {
            return redirect()->route('users.index')->with('success', "le status de l'utilisateur a été modifié avec succès ");
            
        }
            return redirect()->route('users.index')->with('error', "Echec de modification, veuillez réessayer ! ");

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    

    public function importUsers()
    {
        return view('admin.users.import');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


    public function getProfile()
    {
        return view('users.profile');
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



    public function adminPass()
    {
        return view('admin.password');
    }



    public function getPassword()
    {
        return view('users.change-password');
    }



    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            
            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Votre mot de passe a été changé avec succès.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

   
}
