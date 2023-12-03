<?php

namespace App\Models;

use App\Models\Calendar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['title','description', 'date', 'time', 'endtime', 'calendar_id'];


    public function calendar(){
        return $this->belongsTo(Calendar::class);
    }

    public function time(){
        return \DateTime::createFromFormat('H:i:s',$this->time)->format('H:i');
    }

    public function endTime(){
        return \DateTime::createFromFormat('H:i:s',$this->endtime)->format('H:i');
    }

    public function date(){
        return \DateTime::createFromFormat('Y-m-d',$this->date)->format('d/m/Y');
    }
}
