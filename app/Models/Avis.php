<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $fillable =[
    'titre',
    'id_publieur',
    'type',
    'fichier_pdf',
    'image',
    'description'
    ];

}
