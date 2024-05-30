<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentRequest;
use App\Models\CategorieMedicament;
use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function list(){
        $Listes = Medicament::paginate(20);
        return view ('medicament.medicament-list',['Listes'=>$Listes]);
    }

    public function createMedicament(){
        $table = new Medicament();
        $categories = CategorieMedicament::get();
        $categorie = new CategorieMedicament();
        return view('medicament.medicament-create',[
            'table'=>$table,
            'categories'=>$categories,
            'categorie'=>$categorie,
        ]);
    }

    public function create_medicament(MedicamentRequest $request){
        $table = Medicament::create($request->validated());
        return redirect()->route('medicament.list')->with('success',"Medicament Ajouter");
    }

    public function updateMedicament(Medicament $table){
        $categorie = CategorieMedicament::find($table->id_categorie);
        if($categorie == null){
            $categorie = new CategorieMedicament();
        }
        $categories = CategorieMedicament::get();
        return view('medicament.medicament-edit',[
            'table'=>$table,
            'categories'=>$categories,
            'categorie'=>$categorie,
        ]);

    }

    public function update_medicament(MedicamentRequest $request, Medicament $table){
        $table->update($request->validated());
        return redirect()->route('medicament.update',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function deleteMedicament(Medicament $table){
        $table->delete();
        return redirect()->route('pharmacie.list')->with('success',"Pharmacie Suprimer");
    }

    public function searchMedicament(){

    }

    public function search_medicament(){

    }
}
