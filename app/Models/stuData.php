<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stuData extends Model
{
    protected $connection = 'mysql_dataSource';
    protected $table = 'open_studentinfo';
    protected $fillable = [];
}
