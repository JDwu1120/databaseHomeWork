<html>
@extends('layouts.app')
@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    课程信息
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 课程信息修改
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h2>信息修改</h2>
                <form role="form" action="changeClassAction" method="get">
                    <input type="hidden" name="num" value="{{ $num }}" />
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">课程编号</label>
                        <input type="text" class="form-control" id="inputSuccess" name="classNum">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">课程名称</label>
                        <input type="text" class="form-control" id="inputWarning" name="className">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">教师姓名</label>
                        <input type="text" class="form-control" id="inputError" name="teacherName">
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">学分</label>
                        <input type="text" class="form-control" id="inputSuccess" name="credit">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">适宜年级</label>
                        <input type="text" class="form-control" id="inputWarning" name="suit_grade">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">结课时间</label>
                        <input type="text" class="form-control" id="inputError" name="cancel_year">
                    </div>
                    <button type="submit" class="btn btn-default">确定修改</button>
                    <a href="show"><button type="reset" class="btn btn-default">取消修改</button></a>
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
@section('act3')
'active'
@endsection
</html>