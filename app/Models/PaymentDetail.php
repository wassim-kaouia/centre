<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment(){
        return $this->belongTo(Payment::class);
    }
}
