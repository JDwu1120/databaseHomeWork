<html>
@extends('layouts.app')
@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    选课信息
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 选课信息\选课信息修改
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h2>信息修改</h2>
                <form role="form" action="changeChoseAction" method="get">
                    <!--                    {{ csrf_field() }}-->
                    @foreach ($res as $user => $v)
                    <input type="hidden" name="{{ $user }}" value="{{ $v }}" />
                    @endforeach
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">学号</label>
                        <input type="text" class="form-control" id="inputSuccess" name="studentNum">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">课程号</label>
                        <input type="text" class="form-control" id="inputWarning" name="classNum">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">成绩</label>
                        <input type="text" class="form-control" id="inputError" name="score">
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">选课时间</label>
                        <input type="text" class="form-control" id="inputSuccess" name="chose_year">
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
@section('act5')
'active'
@endsection
</html>