<?php
/**
 * Created by IntelliJ IDEA.
 * User: wujindong
 * Date: 2017/4/12
 * Time: 下午12:27
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    protected $table = 'classInfo';
    protected $primaryKey = 'classNum';
    protected $fillable = ['classNum','className','teacherName','credit','suit_grade','cancel_year'];
    public $timestamps = false;
}