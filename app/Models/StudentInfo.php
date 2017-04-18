<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = 'studentInfo';
    protected $primaryKey = 'studentNum';
    protected $fillable = ['studentNum','name','sex','enter_age','enter_year','class','major'];
    public $timestamps = false;
}
