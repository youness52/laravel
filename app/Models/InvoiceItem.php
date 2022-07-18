<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class InvoiceItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'description',
        'quantity',
        'price',
        'product_id',
        'invoice_id',
        'unit_id',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function  invoice(){
        return $this->belongsTo(Invoice::class);
    }
    //
    public function product(){
        return $this->belongsTo(Product::class);
    }
    //
    public function unit(){
        return $this->belongsTo(Unit::class);
    }

}

