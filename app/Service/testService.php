<?php
/**
 *
 */
header("Content-type:text/html;charset=utf-8");
class mysqlQuery
{
    private $con;
    function __construct()
    {
        $this->con = mysql_connect('localhost','root','wjd');
        if (!$this->con) {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db('student_info');
    }
    public function insertInfo($table,$arr){
        $sql = "insert into ".$table." set ";
        $end = end($arr);
        foreach ($arr as $k => $v) {
            if ($v == $end) {
                if ($k == 'credit'|| $k=='score') {
                    $sql = $sql.$k."=".$v.";";
                    continue;
                }
                $sql = $sql.$k."="."'".$v."'".";";
            }else{
                if ($k == 'credit' || $k=='score') {
                    $sql = $sql.$k."=".$v.",";
                    continue;
                }
                $sql = $sql.$k."="."'".$v."'".",";
            }
        }
        $res = mysql_query($sql);
        if (!$res ) {
            return mysql_error();
        }else{
            return true;
        }
    }
}
$a = new mysqlQuery();
// $arr = $_POST;
$a->insertInfo('studentInfo',$arr);
/*
 *学生信息伪数据生成
for ($i=105; $i <300 ; $i++) {
    $arr = [
        'studentNum' => '3015218'.$i,
        'name' => substr(str_shuffle(md5("djsaldjwdklasdaklsdjaldafbabsjkbv".time())), 0,8),
        'sex' => rand(0,1)==0?'男':'女',
        'enter_age' => rand(17,20),
        'enter_year' => 2015,
        'class' => rand(1,5),
        'major' => 'software'
    ];
    $a->insertInfo('studentInfo',$arr);
}
*/
/*
*课程信息伪数据生成
        for ($i=10; $i <31 ; $i++) {
    $arr = [
        'classNum' => '10003'.$i,
        'className' => 'computer'.substr(str_shuffle(md5("djsaldjwdklasdaklsdjaldafbabsjkbv".time())), 0,5),
        'teacherName' => rand(0,1)==0?'li'.substr(str_shuffle(md5("ddalsdlwkandjkbsjkadakhscka".time())), 0,5):'zhang'.substr(str_shuffle(md5("djsaldjwdklasdaklsdjaldafbabsjkbv".time())), 0,5),
        'credit' => rand(1,4),
        'suit_grade' => rand(2014,2016),
        'cancel_year' => 2017,
    ];
    $a->insertInfo('classInfo',$arr);
}
*/
