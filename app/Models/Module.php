<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'Code',
        'Nom',
        'semestre',
        'Description',
        'nbr_H',
        'id_enseignant',
    ];
}
