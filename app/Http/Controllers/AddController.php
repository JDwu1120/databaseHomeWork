<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChoseInfo;
use App\Models\ClassInfo;
use App\Models\StudentInfo;
use Illuminate\Support\Facades\DB;
class AddController extends Controller
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
        $this->middleware('auth');
        $this->info = new StudentInfo();
        $this->class = new ClassInfo();
        $this->chose = new ChoseInfo();
    }
    //显示添加学生
    public function addStudent(){
        return view('admin.addStudent');
    }
    //执行添加学生
    public function doAddAction(Request $request){
        $arr1 = $request->input();
        $arr = [
            'studentNum' => $arr1['studentNum'],
            'name' => $arr1['name'],
            'sex' => $arr1['sex'],
            'class' => $arr1['class'],
            'enter_year' => $arr1['enter_year'],
            'enter_age' => $arr1['enter_age'],
            'major' => $arr1['major']
        ];
        if (strlen($arr1['studentNum'])!=10)exit('请输入有效信息');
        if (!is_numeric($arr1['studentNum']))exit('请输入有效信息');
        $arr['studentNum'] = "".$arr['studentNum']."";
        $a = $this->info->create($arr);
        return redirect('show');
    }
    //显示添加课程
    public function addClass(){
        return view('admin.addClass');
    }
    //执行添加课程
    public function doAddClass(Request $request){
        $arr1 = $request->input();
        $arr = [
            'classNum' => $arr1['classNum'],
            'className' => $arr1['className'],
            'teacherName' => $arr1['teacherName'],
            'credit' => $arr1['credit'],
            'suit_grade' => $arr1['suit_grade'],
            'cancel_year' => $arr1['cancel_year'],
        ];
        if (strlen($arr1['classNum'])!=7)exit('请输入有效信息');
        if (!is_numeric($arr1['classNum']))exit('请输入有效信息');
        $arr['classNum'] = "".$arr['classNum']."";
        $a = $this->class->create($arr);
        return redirect('showClass');
    }
    //选课添加
    public function choseClass(Request $request){
        $arr['classNum'] = $request->input('classNum');
        return view('admin.addChoseClass')->with('num',$arr['classNum']);
    }
    //执行添加选课
    public function doAddChose(Request $request){
        $arr['studentNum'] = $request->input('studentNum');
        $arr['classNum'] = $request->input('num');
        $class = $this->class->where([
            'classNum' => $arr['classNum']
        ])->get()->toArray()[0];
        $stu = $this->info->where([
            'studentNum' => $arr['studentNum']
        ])->get()->toArray()[0];
        $arr['chose_year'] = date("Y",time());
        if (is_numeric($request->input('score'))){
            if ($request->input('score')>0&&$request->input('score')<=100){
                $arr['score'] = $request->input('score');
            }
        }else{
            $arr['score'] = null;
        }
        if ($stu['enter_year']<=$class['suit_grade']&&date("Y",time())<=$class['cancel_year']){
            $this->chose->create($arr);
            return redirect('showChoseInfo')->withErrors("添加成功");
        }else{
            exit("该学生无法选这门课");
        }
    }
}
