<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable =[

        'cne_etudiant',
        'id_Module',
        'date_absence',
        'absence',

        ];
}
