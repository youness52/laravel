<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Str;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'reception_date',
        'commande_date',
        'due_date',
        'payment_date',
        'document_number',
        'terms_of_payment',
        'object',
        'remarks',

        'account_id',
        'payement_method_id',
        'invoice_type_id',
        'currency_id',
        'created_by',
        'updated_by',
        'is_valid',
        'status_id',
        'invoice_id',
        'amount',
        'paid',
    ];
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    protected $casts = [
        'commande_date' => 'date',
        'reception_date' => 'date',
        'due_date' => 'date',
        'payment_date' => 'date',
    ];
    /*
        * relation
       */
    //
    public function responsible(){
        return  self::belongsTo(User::class,'created_by',"id");
    }
    //
    public function account(){
        return $this->belongsTo(Account::class);
    }
    //
    public function payement(){
        return $this->belongsTo(PayementMethod::class,'payement_method_id','id');
    }
    //
    public function currency(){
        return $this->belongsTo(Currency::class);
    }
    //
    public function status(){
        return $this->belongsTo(Status::class);
    }
    //
    public function items(){
        return $this->hasMany(InvoiceItem::class,'invoice_id');
    }
    public function items2(){
        return $this->belongsToMany(InvoiceItem::class,'invoice_items');
    }

    //
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    //
    public function type(){
        return $this->belongsTo(InvoiceType::class,'invoice_type_id');
    }
    /*
      * Attribute
     */
    public function getCommandeDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getReceptionDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDueDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getPaymentDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
    /*
     * scope
     */



    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {

        parent::boot();

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function($item) {
            Log::info('Creating event call: '.$item);

        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::created(function($item) {
            /*
                Write Logic Here
            */

            Log::info('Created event call: '.$item);
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updating(function($item) {
            Log::info('Updating event call: '.$item);

        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updated(function($item) {
            /*
                Write Logic Here
            */

            Log::info('Updated event call: '.$item);
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::deleted(function($item) {
            Log::info('Deleted event call: '.$item);
        });

        static::saving(function ($model) {
            $model->code = Str::upper(InvoiceType::select('code')
                    ->whereId($model->invoice_type_id)->pluck('code')
                    ->first().'-'.now()->format('Ym').'-'.self::where('invoice_type_id',$model->invoice_type_id)
                    ->count());
        });
    }



    /**
     * Get the Items for Invoice
     */
    public function replicateRow($data)
    {
        $clone = $this->replicate();
        $clone->push();

        foreach($this->items as $item)
        {
            $clone->items()->create($item->toArray());
        }
        $clone->created_by          = auth()->id();
        $clone->created_at          = Carbon::now();
        $clone->status_id           =  15 /*en Cours */ ;
        $clone->invoice_type_id     =  $data->invoice_type_id ;
        $clone->payement_method_id  =  $clone->account->payement_method_id ;
        $clone->commande_date       =  $data->due_date ;
        $clone->due_date            =  $data->due_date ;
        $clone->invoice_id            =  $clone->id ;
        $clone->save();
        return $clone;
    }
}
