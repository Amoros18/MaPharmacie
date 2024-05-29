<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmacieRequest;
use App\Models\Medicament;
use App\Models\Pharmacie;
use App\Models\PharmacieMedicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PharmacieController extends Controller
{
    public function list(){
        $Listes = Pharmacie::paginate(20);
        return view ('pharmacie.pharmacie-list',['Listes'=>$Listes]);
    }

    public function createPharmacie(){
        $table = new Pharmacie();
        return view('pharmacie.pharmacie-create',['table'=>$table]);
    }

    public function create_pharmacie(PharmacieRequest $request){
        $table = Pharmacie::create($request->validated());
        return redirect()->route('pharmacie.create')->with('success',"Pharmacie Ajouter");
    }

    public function updatePharmacie(Pharmacie $table){
        return view('pharmacie.pharmacie-edit',[
            'table' => $table
        ]);

    }

    public function update_pharmacie(PharmacieRequest $request, Pharmacie $table){
        $table->update($request->validated());
        return redirect()->route('pharmacie.list')->with('success',"Enregistrement effectuer avec succes");
    }

    public function deletePharmacie(Pharmacie $table){
        $table->delete();
        return redirect()->route('pharmacie.list')->with('success',"Pharmacie Suprimer");
    }

    public function addUSer(){

    }

    public function add_user(){
        
    }

    public function validateMedicament(Pharmacie $table){
        $medicaments = Medicament::get();
        $user = Auth::user();
        if($user == null){
            return 'pas connecter';
        }
        if($user->id_pharmacie == null){
            return 'pas rattacher a une pharmacie';
        }
        $id_pharmacie = $user->id_pharmacie;
        $ss = PharmacieMedicament::where('id_pharmacie','=',$id_pharmacie)->where('statut','=','Disponible')->get();
        //dd($ss->contains('id_medicament',1));
        return view('pharmacie.validate-medicament',[
            'medicaments'=>$medicaments,
            'check'=>$ss,
        ]);
    }

    public function validate_medicament(Request $request){
        $medicaments = Medicament::get();
        $user = Auth::user();
        if($user == null){
            return 'pas connecter';
        }
        if($user->id_pharmacie == null){
            return 'pas rattacher a une pharmacie';
        }
        $id_pharmacie = $user->id_pharmacie;
        //$taille = $medicaments->count();

        $ss = PharmacieMedicament::where('id_pharmacie','=',$id_pharmacie)->update([
            'statut'=>'Non Disponible',
        ]);

        foreach($medicaments as $medicament){
            $i = $medicament->id;
            $check = $request->input('medicament'.$i.'');
            if($check != null){
                $pharmacie_medicament = PharmacieMedicament::where('id_pharmacie','=',$id_pharmacie)->where('id_medicament','=',$i)->first();
                if($pharmacie_medicament != null){
                    $pharmacie_medicament->statut = 'Disponible';
                    $pharmacie_medicament->save();
                }
                else{
                    $pharmacie_medicament = PharmacieMedicament::create([
                        'id_pharmacie'=>$id_pharmacie,
                        'id_medicament'=>$i,
                        'statut'=>'Disponible',
                    ]);
                }
            }
        }
        return redirect()->route('pharmacie.validate',['table'=>$id_pharmacie])->with('success',"Enregistrer");
    }
}
