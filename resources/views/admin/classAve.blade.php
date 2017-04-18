<html>
@extends('layouts.app')
@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    成绩信息
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 成绩信息
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>课程成绩信息</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>课程编号</th>
                            <th>课程名称</th>
                            <th>课程人数</th>
                            <th>平均加权</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($spread as $user)
                        <tr>
                            <td>{{ $user['classNum'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['times'] }}</td>
                            <td>{{ $user['scores'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
<style>
    .pagination{
        margin: 0 !important;
    }
</style>
<!--<script>-->
<!--    function delete1() {-->
<!--        var key = $("#delete1").val();-->
<!--        alert(key);-->
<!--    }-->
<!--    function chan(){-->
<!--        alert($("#disabledSelect").val());-->
<!--    }-->
<!--</script>-->
<!-- /#page-wrapper -->
@endsection
@section('act6')
'active'
@endsection
</html>