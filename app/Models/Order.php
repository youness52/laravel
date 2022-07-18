<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'user_id',
        'table_id',
        'status',
        'comment',
        'update_by',
        'amount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'=>'datetime'
    ];

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class,'item_orders')
            ->withPivot(['price','quantity','comment','status','variation_id','propertie_id','properties'])
            ->withTimestamps();
    }

    //
    public function propertie(){
        return $this->belongsToMany(Propertie::class,'item_orders');
    }

    public function variation(){
        return $this->belongsToMany(Variation::class,'item_orders');
    }


}
