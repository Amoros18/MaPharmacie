<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Medicament;
use App\Models\PharmacieMedicament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function dologin(LoginRequest $request){
        $credentials = $request->validated();
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            $name = $user->name;
            return redirect()->intended(route('home'));
        }
        return to_route('auth.login')->withErrors([
            'email'=>"email invalide"
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended(route('auth.login'));
    }

    public function list(){
        $Listes =User::paginate(20);
        return view ('user.user-list',['Listes'=>$Listes]);
    }

    public function createUser(){
        $table = new User();
        return view('user.user-create',['table'=>$table]);
    }

    public function create_user(UserRequest $request){
        $table = User::create($request->validated());
        $password = $request->input('password');
        $table->password = Hash::make($password);
        $table->save();
        return redirect()->route('user.create')->with('success',"Utilisateur Ajouter");
    }

    public function updateUser(User $table){
        return view('user.user-edit',[
            'table' => $table
        ]);
    }

    public function update_user(UserRequest $request, User $table){
        $table->update($request->validated());
        $password = $request->input('password');
        $table->password = Hash::make($password);
        $table->save();
        return redirect()->route('user.list')->with('success',"Enregistrement effectuer avec succes");
    }

    public function deleteUser(User $table){
        $table->delete();
        return redirect()->route('user.list')->with('success',"Utilisateur Suprimer");
    }

    public function searchMedicament(Request $request){
        $nom = $request->input('nom');
        $principe_actif = $request->input('principe_actif');
        $categorie = $request->input('categorie');
        $medicament = $this->search($nom,$principe_actif,$categorie);
        return view('welcome',[
            'nom'=>$nom,
            'principe_actif'=>$principe_actif,
            'categorie'=>$categorie,
            'Listes'=>$medicament,
        ]);
    }

    public function search_medicament(Request $request){
        $nom = $request->input('nom');
        $principe_actif = $request->input('principe_actif');
        $categorie = $request->input('categorie');
        $medicament = $this->search($nom,$principe_actif,$categorie);
        return view('welcome',[
            'nom'=>$nom,
            'principe_actif'=>$principe_actif,
            'categorie'=>$categorie,
            'Listes'=>$medicament,
        ]);
    }

    public function search($nom, $principe_actif, $categorie){
        $query = PharmacieMedicament::query()
        ->leftJoin('medicaments','pharmacie_medicaments.id_medicament','=','medicaments.id')
        ->leftJoin('categorie_medicaments','medicaments.id_categorie','=','categorie_medicaments.id')
        ->leftJoin('pharmacies','pharmacie_medicaments.id_pharmacie','=','pharmacies.id')
        ->select(
            'medicaments.nom as medicament_name',
            'medicaments.principe_actif as principe_actif',
            'pharmacies.nom as pharmacie_name',
            'categorie_medicaments.nom as categorie_name',
            'pharmacie_medicaments.statut as statut',);

        if($nom != null){
            $query->where('medicaments.nom','like','%'.$nom.'%');
        }
        if($principe_actif != null){
            $query->where('medicaments.principe_actif','like','%'.$principe_actif.'%');
        }
        if($categorie != null){
            $query->where('categorie_medicaments.nom','like','%'.$categorie.'%');
        }
        $table = $query->paginate();
        return $table;
    }
}
