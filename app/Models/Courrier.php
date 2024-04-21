<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "id",
        "libelle",
        "poids",
        "prix",
        "exp_id",
        "dest_id",
        "fact_id",
        "user_id",
        "poste_exp_id",
        "poste_dest_id"
    ];

}
