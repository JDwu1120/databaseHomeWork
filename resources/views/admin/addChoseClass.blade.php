<html>
@extends('layouts.app')
@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    学生选课
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 学生选课
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h2>学生选课</h2>
                <form role="form" action="doAddChose" method="post">{{ csrf_field() }}
                    <input type="hidden" name="num" value="{{ $num }}" />
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">学号</label>
                        <input type="text" class="form-control" id="inputSuccess" name="studentNum">
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">成绩（没有不填）</label>
                        <input type="text" class="form-control" id="inputWarning" name="score">
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