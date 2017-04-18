<?php

namespace App\Http\Controllers;

use App\Models\ChoseInfo;
use App\Models\ClassInfo;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ScoreController extends Controller
{
    private $info;
    private $class;
    private $chose;
    private $msg;
    public  $spread;
    public  $classAve;
    public static $count = 0;

    /**
     * ShowInfoController constructor.
     * @param $info
     * @param $class
     * @param $chose
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->info = new StudentInfo();
        $this->class = new ClassInfo();
        $this->chose = new ChoseInfo();
    }
    //计算学生的加权成绩
    public function gpaSum(){
        $res =[];
        $all = $this->chose->all()->toArray();
        foreach ($all as $k){
            $credit = DB::select("select credit from classInfo where classNum="."'".$k['classNum']."'")[0]->credit;
            if (array_key_exists($k['studentNum'],$res)){
                if ($k['score'] == null){
                    continue;
                }else{
                    $res[$k['studentNum']]['times']++;
                    $res[$k['studentNum']]['credits'] += $credit;
                    $res[$k['studentNum']]['scores'] += $k['score']*$credit;
                }
            }else{
                if ($k['score'] == null){
                    $res += [
                        $k['studentNum'] => [
                            'times' => 0,
                            'credits'=> 0,
                            'scores' => $k['score']*$credit,
                        ]
                    ];
                }else{
                    $res += [
                        $k['studentNum'] => [
                            'times' => 1,
                            'credits'=> $credit,
                            'scores' => $k['score']*$credit,
                        ]
                    ];
                }
            }
        }
        $msg = [];
        foreach ($res as $key => $v){
//            $credit = DB::select("select * from studentInfo where studentNum="."'".$key."'")[0];
            $arr = $this->info->where([
                'studentNum'=>$key
            ])->get()->toArray()[0];
            $msg[] = [
                'studentNum' => $arr['studentNum'],
                "name" => $arr['name'],
//                "sex" => $arr['sex'],
//                "enter_age" => $arr['enter_age'],
//                "enter_year" => $arr['enter_year'],
                "class" => $arr['class'],
                "major" => $arr['major'],
                'gpa'  => $v['credits']==0?0:number_format($v['scores']/$v['credits'], 4, '.', '')
            ];
        }
        $this->msg = $msg;
        self::$count += count($msg);
        return view('admin.score')->with('gpa',$msg);
    }
    //计算班级加权成绩
    public function classGpa(){
        $this->gpaSum();
        $res = [];
        foreach ($this->msg as $k){
            if (array_key_exists($k['major'].",".$k['class'],$res)){
                if ($k['gpa']!=null){
                    $res[$k['major'].",".$k['class']]['times']++;
                    $res[$k['major'].",".$k['class']]['gpas'] += $k['gpa'];
                }else{
                    continue;
                }
            }else{
                if ($k['gpa']!=null){
                    $res +=[
                        $k['major'].",".$k['class']=> [
                            'major' => $k['major'],
                            'class' => $k['class'],
                            'times' => 1,
                            'gpas'  => $k['gpa']
                        ]
                    ];
                }else{
                    continue;
                }
            }
        }
        $msg = [];
        //计算平均加权
        foreach ($res as $key){
            $key['gpas'] = number_format($key['gpas']/$key['times'], 4, '.', '');
            $msg[] = $key;
        }
        rsort($msg);
        self::$count += count($msg);
        return view('admin.classScore')->with('gpa',$msg);
    }
    //课程成绩分布
    public function classSpread(){
        //"select * from classInfo where 1"
        $class = $this->class->all()->toArray();
        $res = [];
        foreach ($class as $k){
//            $a = DB::select("select * from courseInfo where classNum="."'".$key['classNum']."'");
            $ca = $this->chose->where([
                'classNum' => $k['classNum']
            ])->get()->toArray();
            if (!empty($ca)) {
                $res += [
                    $ca[0]['classNum'] => [
                        'classNum' => $ca[0]['classNum'],
                        'no' => 0,
                        'not' => 0,
                        'D' => 0,
                        'C' => 0,
                        'B' => 0,
                        'A' => 0,
                        'full' => 0
                    ]
                ];
            }else{
                continue;
            }
            foreach ($ca as $ke){
               if ($ke['score'] == 100) $res[$ke['classNum']]['full']++;
               if ($ke['score'] >= 90 && $ke['score']<=99) $res[$ke['classNum']]['A']++;
               if ($ke['score'] >= 80 && $ke['score']<=89) $res[$ke['classNum']]['B']++;
               if ($ke['score'] >= 70 && $ke['score']<=79) $res[$ke['classNum']]['C']++;
               if ($ke['score'] >= 60 && $ke['score']<=69) $res[$ke['classNum']]['D']++;
               if ($ke['score'] <60&&$ke['score']!=null) $res[$ke['classNum']]['not']++;
               if ($ke['score']==null) $res[$ke['classNum']]['no']++;
            }
        }
        self::$count += count($res);
        $this->spread = $res;
        return view('admin.classSpread')->with('spread',$res);
    }
    //课程平均成绩
    public function classAve(){
        //"select * from classInfo where 1"
        $class = $this->class->all()->toArray();
        $res = [];
        foreach ($class as $k){
//           $a = DB::select("select * from courseInfo where classNum="."'".$key['classNum']."'");
            $ca = $this->chose->where([
                'classNum' => $k['classNum']
            ])->get()->toArray();
            if (!empty($ca)) {
                $res += [
                    $ca[0]['classNum'] => [
                        'classNum' => $ca[0]['classNum'],
                        'name' => $k['className'],
                        'times' => 0,
                        'scores' => 0
                    ]
                ];
            }else{
                continue;
            }
            foreach ($ca as $ke){
                $res[$ke['classNum']]['times']++;
                $res[$ke['classNum']]['scores'] += $ke['score'];
            }
        }
        foreach ($res as $key){
            $res[$key['classNum']]['scores'] = number_format(($key['scores']/$key['times']),4,'.','');
        }
        self::$count += count($res);
        $this->classAve = $res;
        return view('admin.classAve')->with('spread',$res);
    }
    //统计数目
    public function addCount()
    {
        $this->gpaSum();
        $this->classGpa();
        $this->classSpread();
        $this->classAve();
        return self::$count;
    }
    //显示某个学生的全部信息
    public function showAll(Request $request){
        $stu = $this->chose->where([
            'studentNum' => $request->input('studentNum')
        ])->get()->toArray();
        $i=0;
        foreach ($stu as $k){
            //DB::("select * from classInfo where classNum=$k['classNum]")
            $className = $this->class->where([
                'classNum' => $k['classNum']
            ])->get()->toArray()[0];
            $stu[$i] += $className;
            $i++;
        }
        return view('admin.oneStuInfo')->with('stu',$stu);
    }
}
