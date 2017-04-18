<html>
@extends('layouts.app')
@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    学生信息
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 学生信息添加
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h2>添加信息</h2>
                <form role="form" action="doAddAction" method="post">{{ csrf_field() }}
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">学号</label>
                        <input type="text" class="form-control" id="inputSuccess" name="studentNum">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">姓名</label>
                        <input type="text" class="form-control" id="inputWarning" name="name">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">性别</label>
                        <input type="text" class="form-control" id="inputError" name="sex">
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">入学年龄</label>
                        <input type="text" class="form-control" id="inputSuccess" name="enter_age">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">入学年份</label>
                        <input type="text" class="form-control" id="inputWarning" name="enter_year">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">专业</label>
                        <input type="text" class="form-control" id="inputError" name="major">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">班级</label>
                        <input type="text" class="form-control" id="inputSuccess" name="class">
                    </div>
                    <button type="submit" class="btn btn-default">确定添加</button>
                    <a href="show"><button type="reset" class="btn btn-default">取消添加</button></a>
                </form>
            </div>
            <div class="col-lg-6">
                <h2>友情提示</h2>
                <p>本系统使用详细信息见 <a target="_blank" href="https://www.baidu.com">点击这里</a>.</p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
@endsection
@section('act4')
'active'
@endsection
</html>