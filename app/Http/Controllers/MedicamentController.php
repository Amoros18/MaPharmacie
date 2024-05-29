<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentRequest;
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
        return view('medicament.medicament-create',['table'=>$table]);
    }

    public function create_medicament(MedicamentRequest $request){
        $table = Medicament::create($request->validated());
        return redirect()->route('medicament.create')->with('success',"Medicament Ajouter");
    }

    public function updateMedicament(Medicament $table){
        return view('medicament.medicament-edit',[
            'table' => $table
        ]);

    }

    public function update_medicament(MedicamentRequest $request, Medicament $table){
        $table->update($request->validated());
        return redirect()->route('medicament.update',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function deleteMedicament(Medicament $table){
        $table->delete();
        return redirect()->route('pharmacie.liste')->with('success',"Pharmacie Suprimer");
    }

    public function searchMedicament(){

    }

    public function search_medicament(){

    }
}
