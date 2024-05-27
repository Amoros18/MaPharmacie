<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
        'principe_actif',
        'id_categorie',
        'code_cip',
        'description',
    ];
}
