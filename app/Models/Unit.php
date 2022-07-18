<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table ="units";
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable=['unit','symbol'];
    /**
     * The attributes that should be hidden for arrays.
     *
     */
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
    //
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
