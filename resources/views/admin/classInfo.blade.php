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
                        <i class="fa fa-table"></i> 课程信息
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
                            <th>课程编号</th>
                            <th>课程名称</th>
                            <th>教师名称</th>
                            <th>学分</th>
                            <th>适合的年级</th>
                            <th>结课时间</th>
                            <th>修改</th>
                            <th>删除</th>
                            <th>选课</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($info as $user)
                        <tr>
                            <td>{{ $user->classNum }}</td>
                            <td>{{ $user->className }}</td>
                            <td>{{ $user->teacherName }}</td>
                            <td>{{ $user->credit }}</td>
                            <td>{{ $user->suit_grade }}</td>
                            <td>{{ $user->cancel_year }}</td>
                            <td><a href="changeClass?classNum={{ $user->classNum }}">修改</a></td>
                            <td><a href="deleteClass?classNum={{ $user->classNum }}">删除</a></td>
                            <td><a href="choseClass?classNum={{ $user->classNum }}">选课</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        <form action="searchClassInfo" method="post">{{ csrf_field() }}
                            <div class="col-lg-6" style="float: left;">
                                <div class="form-group">
                                    <!--                                <label for="disabledSelect">查询方式</label>-->
                                    <select id="disabledSelect" class="form-control" name="way" onchange="chan()">
                                        <option value="1">课程名称</option>
                                        <option value="2">课程编号</option>
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
<!--    function search() {-->
<!--        var key = $("#search").val();-->
<!--        window.location.href="http://www.baidu.com";-->
<!--    }-->
<!--    function chan(){-->
<!--        alert($("#disabledSelect").val());-->
<!--    }-->
<!--</script>-->
<!-- /#page-wrapper -->
@endsection
@section('act3')
'active'
@endsection
</html>