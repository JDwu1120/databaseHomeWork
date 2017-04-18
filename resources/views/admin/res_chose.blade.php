<html>
@extends('layouts.app')
@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    查询结果
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 选课信息/查询结果
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
                            <th>课程编号</th>
                            <th>成绩</th>
                            <th>选课时间</th>
                            <th>修改</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($info as $user)
                        <tr>
                            <td>{{ $user->studentNum }}</td>
                            <td>{{ $user->classNum }}</td>
                            <td>{{ $user->score }}</td>
                            <td>{{ $user->chose_year }}</td>
                            <td><a href="changeChose?classNum={{ $user->classNum }}&studentNum={{ $user->studentNum }}">修改</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        <form action="searchStuInfo" method="post">{{ csrf_field() }}
                            <div class="col-lg-6" style="float: left;">
                                <div class="form-group">
                                    <!--                                <label for="disabledSelect">查询方式</label>-->
                                    <select id="disabledSelect" class="form-control" name="way" onchange="chan()">
                                        <option value="1">按学号查找</option>
                                        <option value="2">按课程编号查找</option>
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
@section('act5')
'active'
@endsection
</html>