<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable=[
        'name',
        'reference',
        'designation',
        'description',
        'product_family_id',
        'category_id',
        'unit_id',
        'physical_quantity',
        'qte_min',
        'tva',
        'price',
        'created_by',
        'updated_by',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     */
    protected $hidden = [
        'updated_at',
        'created_at',
    ];


    //
    public function account(){
        return $this->belongsTo(Account::class);
    }
    //
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //
    public function family(){
        return $this->belongsTo(ProductFamily::class,'product_family_id',"id");
    }
    //
    public function accounts(){
        return $this->belongsToMany(Account::class,'products_accounts',"product_id",'account_id')
            ->withPivot(['buying_price','selling_price','exclusive_price','currency_id'])
            ->withTimestamps();

    }
}
