<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'fax',
        'mobile',
        'email',
        'job_title',
        'activity_area_id',
        'note',
        'account_id',
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

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function activityarea(){
        return $this -> belongsTo(ActivityArea::class,'activity_area_id','id');
    }
}
