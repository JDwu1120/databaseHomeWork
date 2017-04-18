<?php
/**
 * Created by IntelliJ IDEA.
 * User: wujindong
 * Date: 2017/4/12
 * Time: 下午1:47
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ChoseInfo extends Model
{
    protected $table = 'courseInfo';
    protected $primaryKey = 'studentNum,classNum';
    protected $fillable = ['studentNum','classNum','score','chose_year'];
    public $timestamps = false;
}