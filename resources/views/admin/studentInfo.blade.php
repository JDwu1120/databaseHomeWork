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
                        <i class="fa fa-table"></i> 学生信息
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>信息列表</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>学号</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>入学年龄</th>
                            <th>入学年份</th>
                            <th>专业</th>
                            <th>班级</th>
                            <th>修改</th>
                            <th>删除</th>
                            <th>详情</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($info as $user)
                        <tr>
                            <td>{{ $user->studentNum }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->sex }}</td>
                            <td>{{ $user->enter_age }}</td>
                            <td>{{ $user->enter_year }}</td>
                            <td>{{ $user->major }}</td>
                            <td>{{ $user->class }}</td>
                            <td><a href="/changeInfo?studentNum={{ $user->studentNum }}">修改</a></td>
                            <td><a href="/deleteInfo?studentNum={{ $user->studentNum }}">删除</a></td>
                            <td><a href="showAll?studentNum={{ $user->studentNum }}">详情</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        <form action="searchStuInfo" method="post">{{ csrf_field() }}
                        <div class="col-lg-6" style="float: left;">
                            <div class="form-group">
<!--                                <label for="disabledSelect">查询方式</label>-->
                                <select id="disabledSelect" class="form-control" name="way" onchange="chan()">
                                    <option value="1">按姓名查找</option>
                                    <option value="2">按学号查找</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" style="float: right;">
                            <div class="form-group input-group">
                                    <input type="text" class="form-control" id="search" name="search">
                                    <span class="input-group-btn"><input class="btn btn-default" type="submit"><i class="fa fa-search"></i></input></span>
                            </div>
                        </div>
                        </form>
                    </table>
                    {!! $info->links() !!}
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
@section('act2')
'active'
@endsection
</html>