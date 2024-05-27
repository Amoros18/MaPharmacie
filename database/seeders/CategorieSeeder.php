<?php

namespace Database\Seeders;

use App\Models\CategorieMedicament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorie_medicaments')->delete();
        CategorieMedicament::create([
            'nom'=>'Antibiotique',
            'description'=>'000000',
        ]);
        CategorieMedicament::create([
            'nom'=>'AntiDouleur',
            'description'=>'000000',
        ]);
        CategorieMedicament::create([
            'nom'=>'AntiCoagulent',
            'description'=>'000000',
        ]);


    }
}
