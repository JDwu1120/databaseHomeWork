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
                <h2>学生加权信息</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>学号</th>
                            <th>姓名</th>
                            <th>专业</th>
                            <th>班级</th>
                            <th>加权</th>
                            <th>详情</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($gpa as $user)
                        <tr>
                            <td>{{ $user['studentNum'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['major'] }}</td>
                            <td>{{ $user['class'] }}</td>
                            <td>{{ $user['gpa'] }}</td>
                            <td><a href="showAll?studentNum={{ $user['studentNum'] }}">详情</a></td>
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