<?php

namespace App\Http\Controllers;

use App\Models\ChoseInfo;
use App\Models\classData;
use App\Models\ClassInfo;
use App\Models\stuData;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    private $info;
    private $class;
    private $chose;

    /**
     * ShowInfoController constructor.
     * @param $info
     * @param $class
     * @param $chose
     */
    public function __construct()
    {
        $this->info = new StudentInfo();
        $this->class = new ClassInfo();
        $this->chose = new ChoseInfo();
    }
    public function dataInsert(){
        $c = $this->class->all()->toArray();
        $u = $this->info->all()->toArray();
        foreach ($u as $k){
            $rand = rand(0,149);
            $ch = rand(2015,2017);
            if ($k['enter_year']<=$c[$rand]['suit_grade']&&$ch<$c[$rand]['cancel_year']){
                $b = $c[$rand]['classNum'];
            }else{
                continue;
            }
            $this->chose->create([
                'studentNum' => $k['studentNum'],
                'classNum' => $b,
                'score' => rand(61,99),
                'chose_year' => $ch,
            ]);
        }
    }
    public function stuInfo(){
        $stu = new stuData();
        $msg = $stu->all()->toArray();
        $i=1;
        foreach ($msg as $k){
            if ($i>1000){
                break;
            }
            $this->info->create([
                'studentNum' => $k['studentid'],
                'name' => $k['realname'],
                'sex' => rand(0,1)==0?'男':'女',
                'enter_age' => rand(17,19),
                'enter_year' => rand(2013,2017),
                'class' => $k['gender12'],
                'major' => $k['majorname']
            ]);
            $i++;
        }
    }
    public function classInfo(){
        $stu = new classData();
        $msg = $stu->all()->toArray();
        $i = 1000301;
        foreach ($msg as $k){
            if ($i>1000451){
                break;
            }
            $res = $this->class->where([
                'className' => $k['title']
            ])->get()->toArray();
            if (empty($res)) {
                $this->class->create([
                    'classNum' => $i . "",
                    'className' => $k['title'],
                    'teacherName' => $k['teacher'],
                    'credit' => rand(2, 6),
                    'suit_grade' => $k['grade'],
                    'cancel_year' => rand(2017,2019),
                ]);
            }else{
                continue;
            }
            $i++;
        }
    }
    public function testChart(){
        return view('admin.test');
    }
}
