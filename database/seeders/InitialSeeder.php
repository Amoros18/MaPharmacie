<?php

namespace Database\Seeders;

use App\Models\Pharmacie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pharmacies')->delete();
        Pharmacie::create([
            'nom'=>'Admin',
            'numero'=>'000000',
        ]);

        DB::table('users')->delete();
        User::create([
            'name'=>'Amoros',
            'email'=>'amoros@gmail.com',
            'id_pharmacie'=>1,
            'password'=>Hash::make('amoros'),
        ]);

    }
}
