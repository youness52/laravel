<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function propertie(){
        return $this->belongsToMany(Propertie::class,'items_propertie');
    }

    public function variation(){
        return $this->belongsToMany(Variation::class,'items_variation');
    }
}
