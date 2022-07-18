<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayementPeriod extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     */
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
