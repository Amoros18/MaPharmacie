<?php

namespace Database\Seeders;

use App\Models\Medicament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicaments')->delete();
        Medicament::create([
            'nom'=>'Abendazole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Metanidazole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Paracatamole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Quinine',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Mebendazole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Citroelle',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Natanole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Trinidole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Endevole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Cariotanole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Pictunicale',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Conitude',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Olganidazole',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Picturan',
            'description'=>'000000',
        ]);
        Medicament::create([
            'nom'=>'Milenium',
            'description'=>'000000',
        ]);
    }
}
