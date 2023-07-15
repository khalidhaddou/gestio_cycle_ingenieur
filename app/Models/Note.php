<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable =[
        'cne_etudiant',
        'id_Module',
        'note_final',
        'ajouter_par',
        ];
}
