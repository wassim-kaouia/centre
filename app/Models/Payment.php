<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use App\Models\PaymentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function detailsPayment(){
        return $this->hasMany(PaymentDetail::class);
    }

    public function getFees(){
        $fee_dossier = Fees::first()->get();
        $fee = Fees::findOrFail($fee_dossier[0]->id);

        return $fee;
    }

    public function getCoursePrice(){
        
        return $this->course->price - ($this->getFees()->dossier + $this->getFees()->inscription) - $this->getPourcentageInstructor();
    }

    public function getPourcentageInstructor(){
        $coursePrice = $this->course->price - ($this->getFees()->dossier + $this->getFees()->inscription);
        return ($coursePrice * $this->course->pourcentage_instructor)/100;
    }

    public function getTVA(){
        $coursePrice = $this->course->price - ($this->getFees()->dossier + $this->getFees()->inscription);

        return ($coursePrice * 20)/100;
    }

    public function getHT(){

        return $this->getCoursePrice() - $this->getTVA();
    }

    public function getTotal(){
        return $this->getHT() + $this->getTVA() + $this->getPourcentageInstructor() + $this->getFees()->dossier + $this->getFees()->inscription;
    }

    
}
