<?php

namespace App\Models;

use App\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image','status','quantity','price','item_category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function category(){
        return $this->belongsTo(ItemCategory::class,"item_category_id",'id');
    }

    //
    public function propertie(){
        return $this->belongsToMany(Propertie::class,'items_propertie');
    }

    public function variation(){
        return $this->belongsToMany(Variation::class,'items_variation')->withPivot('price');
    }


}
