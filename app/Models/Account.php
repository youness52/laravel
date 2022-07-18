<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'ref',
        'rc',
        'ice',
        'iftax',
        'country_id',
        'country_id_delivery',
        'currency_id',
        'city',
        'city_delivery',
        'zipcode',
        'zipcode_delivery',
        'address',
        'address_delivery',
        'phone',
        'mobile',
        'fax',
        'email',
        'website',
        'discount',
        'activity_area_id',
        'payement_method_id',
        'payement_period_id',
        'account_types_id',
        'note',
        'image',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
    //
    public function country(){
        return $this -> belongsTo(Country::class);
    }
    //
    public function activityarea(){
        return $this -> belongsTo(ActivityArea::class,'activity_area_id','id');
    }
    //
    public function currency(){
        return $this -> belongsTo(Currency::class);
    }
    //
    public function payementmethod(){
        return $this -> belongsTo(PayementMethod::class,'payement_method_id','id');
    }
    //
    public function payementperiod(){
        return $this -> belongsTo(PayementPeriod::class,'payement_period_id','id');
    }
    //
    public function accounttype(){
        return $this -> belongsTo(AccountType::class);
    }
    //
    public function contacts(){
        return $this -> hasMany(Contact::class);
    }

    //
    public function products(){
        return $this->belongsToMany(Product::class,'products_accounts',"account_id",'product_id')
            ->withTimestamps();

    }
}
