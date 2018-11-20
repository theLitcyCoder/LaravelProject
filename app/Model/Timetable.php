<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    //These are the fields to fill and 
    protected $fillable =['tutor_id', 'subject', 'date', 'time'];
}
