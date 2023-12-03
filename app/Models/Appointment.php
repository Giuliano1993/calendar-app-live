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
}
