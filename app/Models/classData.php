<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classData extends Model
{
    protected $connection = 'mysql_dataSource';
    protected $table = 'open_classrooms';
    protected $fillable = [];
}
