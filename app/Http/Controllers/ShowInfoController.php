<?php

namespace App\Http\Controllers;

use App\Models\ChoseInfo;
use App\Models\ClassInfo;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowInfoController extends Controller
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
    public function index(){
        $arr['stu_num'] = $this->info->count();
        $arr['class_num'] = $this->class->count();
        $arr['chose_num'] = $this->chose->count();
        $count = new ScoreController();
        $arr['score_num'] = $count->addCount();
        return view('admin.index')->with('arr',$arr);
    }
    //显示学生信息
    public function showStudentInfo(){
//        $info = DB::select("select * from studentInfo where 1");
        $info = $this->info->select()->paginate(30);
        return view('admin.studentInfo')->with('info',$info);
    }
    //显示修改页面
    public function changeStudent(Request $request){
        $num = $request->input('studentNum');
        $info = $this->info->where("studentNum",$num)->get()->toArray()[0];
        return view('admin.changeInfo')->with('num',$info);
    }
    //修改学生信息
    public function changeAction(Request $request){
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
        $sql_init = "update studentInfo set ";
        $sql = "update studentInfo set ";
        $end = end($arr);
        foreach ($arr as $k => $v) {
            if ($v != null) {
                if ($v == $end) {
                    if ($k == 'credit' || $k == 'score') {
                        $sql = $sql . $k . "=" . $v . "";
                        continue;
                    }
                    $sql = $sql . $k . "=" . "'" . $v . "'" . "";
                } else {
                    if ($k == 'credit' || $k == 'score') {
                        $sql = $sql . $k . "=" . $v . ",";
                        continue;
                    }
                    $sql = $sql . $k . "=" . "'" . $v . "'" . ",";
                }
            }
        }
        if ($sql == $sql_init){
            exit("请输入有效数值");
        }else{
            $sql = $sql." where studentNum="."'".$arr1['num']."'";
        }
        $info = DB::update($sql);
        if ($info){
            return redirect('show');
        }
    }
    //删除学生信息
    public function deleteInfo(Request $request){
        $arr1 = $request->input();
        $stu = $arr1['studentNum'];
        $sql = "delete from studentInfo where studentNum="."'".$stu."'";
        $res = DB::delete($sql);
        if ($res){
            return redirect('show');
        }
    }
    //查找学生信息
    public function searchStuInfo(Request $request){
        $way = $request->input('way');
        $search = $request->input('search');
        if ($way == 1){
//            $res = DB::select("select * from studentInfo where name like '%".$search."%'");
            $res = DB::table('studentInfo')->where('name','like','%'.$search.'%')->paginate(15);
            return view('admin.res_stu')->with('info',$res);

        }else{
//            $res = DB::select("select * from studentInfo where studentNum like  '%".$search."%'");
            $res = DB::table('studentInfo')->where('studentNum','like','%'.$search.'%')->paginate(15);
            return view('admin.res_stu')->with('info',$res);
        }
    }
    //显示课程信息
    public function showClassInfo(){
//        $info = DB::select("select * from classInfo where 1");
        $info = $this->class->select()->paginate(10);
        return view('admin.classInfo')->with('info',$info);
    }
    //显示修改课程页面
    public function changeClass(Request $request){
        $num = $request->input('classNum');
        return view('admin.changeClassInfo')->with('num',$num);
    }
    //修改课程信息
    public function changeClassAction(Request $request){
        $arr1 = $request->input();
        $arr = [
            'classNum' => $arr1['classNum'],
            'className' => $arr1['className'],
            'teacherName' => $arr1['teacherName'],
            'credit' => $arr1['credit'],
            'suit_grade' => $arr1['suit_grade'],
            'cancel_year' => $arr1['cancel_year'],
        ];
        $sql_init = "update classInfo set ";
        $sql = "update classInfo set ";
        $end = end($arr);
        foreach ($arr as $k => $v) {
            if ($v != null) {
                if ($v == $end) {
                    if ($k == 'credit' || $k == 'score') {
                        $sql = $sql . $k . "=" . $v . "";
                        continue;
                    }
                    $sql = $sql . $k . "=" . "'" . $v . "'" . "";
                } else {
                    if ($k == 'credit' || $k == 'score') {
                        $sql = $sql . $k . "=" . $v . ",";
                        continue;
                    }
                    $sql = $sql . $k . "=" . "'" . $v . "'" . ",";
                }
            }
        }
        if ($sql == $sql_init){
            exit("请输入有效数值");
        }else{
            $sql = $sql." where classNum="."'".$arr1['num']."'";
        }
        $info = DB::update($sql);
        if ($info){
            return redirect('showClassInfo');
        }
    }
    //删除课程信息
    public function deleteClass(Request $request){
        $arr1 = $request->input();
        $cla = $arr1['classNum'];
        $sql = "delete from classInfo where classNum="."'".$cla."'";
        $res = DB::delete($sql);
        if ($res){
            return redirect('showClassInfo');
        }
    }
    //查找课程信息
    public function searchClassInfo(Request $request){
        $way = $request->input('way');
        $search = $request->input('search');
        if ($way == 1){
//            $res = DB::select("select * from classInfo where className like '%".$search."%'");
            $res = DB::table('classInfo')->where('className','like','%'.$search.'%')->paginate(15);
            return view('admin.res_class')->with('info',$res);
        }else{
//            $res = DB::select("select * from classInfo where className like  '%".$search."%'");
            $res = DB::table('classInfo')->where('classNum','like','%'.$search.'%')->paginate(15);
            return view('admin.res_class')->with('info',$res);
        }
    }
    //显示选课信息
    public function showChoseInfo(){
//        $info = DB::select("select * from classInfo where 1");
        $info = $this->chose->select()->paginate(30);
        return view('admin.choseInfo')->with('info',$info);
    }
    public function changeChose(Request $request){
        $classnum = $request->input('classNum');
        $studentnum = $request->input('studentNum');
        $arr = [
            'classnum' => $classnum,
            'studentnum' => $studentnum
        ];
        return view('admin.changeChoseInfo')->with('res',$arr);
    }
    //修改课程信息
    public function changeChoseAction(Request $request){
        $arr1 = $request->input();
        $arr = [
            'classNum' => $arr1['classNum'],
            'studentNum' => $arr1['studentNum'],
            'score' => $arr1['score'],
            'chose_year' => $arr1['chose_year']
        ];
        $sql_init = "update courseInfo set ";
        $sql = "update courseInfo set ";
        $end = end($arr);
        foreach ($arr as $k => $v) {
            if ($v != null) {
                if ($v == $end) {
                    if ($k == 'credit' || $k == 'score') {
                        $sql = $sql . $k . "=" . $v . "";
                        continue;
                    }
                    $sql = $sql . $k . "=" . "'" . $v . "'" . "";
                } else {
                    if ($k == 'credit' || $k == 'score') {
                        $sql = $sql . $k . "=" . $v . ",";
                        continue;
                    }
                    $sql = $sql . $k . "=" . "'" . $v . "'" . ",";
                }
            }
        }
        if ($sql == $sql_init){
            exit("请输入有效数值");
        }else{
            $sql = $sql." where classNum="."'".$arr1['classnum']."' and studentNum="."'".$arr1['studentnum']."'";
        }
        $info = DB::update($sql);
        if ($info){
            return redirect('showChoseInfo');
        }
    }
    //查找课程信息
    public function searchChoseInfo(Request $request){
        $way = $request->input('way');
        $search = $request->input('search');
        if ($way == 1){
//            $res = DB::select("select * from classInfo where className like '%".$search."%'");
            $res = DB::table('courseInfo')->where('studentNum','like','%'.$search.'%')->paginate(15);
            return view('admin.res_chose')->with('info',$res);
        }else{
//            $res = DB::select("select * from classInfo where className like  '%".$search."%'");
            $res = DB::table('courseInfo')->where('classNum','like','%'.$search.'%')->paginate(15);
            return view('admin.res_chose')->with('info',$res);
        }
    }
    //删除选课信息
    public function deleteChose(Request $request){
        $arr1 = $request->input();
        $cla = $arr1['classNum'];
        $stu = $arr1['studentNum'];
        $sql = "delete from courseInfo where classNum="."'".$cla."' and studentNum="."'".$stu."'";
        $res = DB::delete($sql);
        if ($res){
            return redirect('showChoseInfo');
        }
    }
    //show 成绩分布详情
    public function showScoreSpreadDeail(Request $request){
        $classNum = $request->input('classNum');
        $score = new ScoreController();
        $score->classSpread();
        $score->classAve();
        $res = $score->spread[$classNum];
        $res += $score->classAve[$classNum];
        return view('admin.detail')->with('spread',$res);
    }
}
