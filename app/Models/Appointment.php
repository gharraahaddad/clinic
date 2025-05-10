<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable=['doctor_id','patient_id','date','time','status'] ;

    public function patient(){
      return  $this->belongsTo(Patient::class);
    }  public function doctor(){
      return  $this->belongsTo(Doctor::class);
    }
}
