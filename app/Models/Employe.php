<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable=[
        'CIN','nom','prenom','date_naissance','date_debut','date_fin','image','card','cnss','fonction','tel','email','cnss','situation_familiale','observation'
    ];
    protected $hidden=[
        'created_at','updated_at'
    ];
}
