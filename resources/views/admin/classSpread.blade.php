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
                <h2>班级加权信息</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>课程编号</th>
                            <th>未考试</th>
                            <th>不及格</th>
                            <th>60-69</th>
                            <th>70-79</th>
                            <th>80-89</th>
                            <th>90-99</th>
                            <th>满分</th>
                            <th>详情</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($spread as $user)
                        <tr>
                            <td>{{ $user['classNum'] }}</td>
                            <td>{{ $user['no'] }}</td>
                            <td>{{ $user['not'] }}</td>
                            <td>{{ $user['D'] }}</td>
                            <td>{{ $user['C'] }}</td>
                            <td>{{ $user['B'] }}</td>
                            <td>{{ $user['A'] }}</td>
                            <td>{{ $user['full'] }}</td>
                            <td><a href="showScoreSpreadDeail?classNum={{ $user['classNum'] }}">详情</a></td>
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