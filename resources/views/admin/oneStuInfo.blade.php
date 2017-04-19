<html>
@extends('layouts.app1')
@section('content1')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    详细信息
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index">主页</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> 成绩分布详情
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>图表结果</h2>
                <div class="table-responsive">
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>课程成绩</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart1"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>学号</th>
                                    <th>课程编号</th>
                                    <th>课程名称</th>
                                    <th>选择时间</th>
                                    <th>教师</th>
                                    <th>学分</th>
                                    <th>适合年级</th>
                                    <th>终止时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($stu as $user)
                                <tr>
                                    <td>{{ $user['studentNum'] }}</td>
                                    <td>{{ $user['classNum'] }}</td>
                                    <td>{{ $user['className'] }}</td>
                                    <td>{{ $user['chose_year'] }}</td>
                                    <td>{{ $user['teacherName'] }}</td>
                                    <td>{{ $user['credit'] }}</td>
                                    <td>{{ $user['suit_grade'] }}</td>
                                    <td>{{ $user['cancel_year'] }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>
    <script>
        Morris.Bar({
            element: 'morris-bar-chart1',
            data: [
                @forelse ($stu as $user)
                    {
                        device: {{ $user['classNum'] }},
                            geekbench: {{ $user['score'] }}
                    },
                @endforeach
            ],
            xkey: 'device',
            ykeys: ['geekbench'],
            labels: ['Geekbench'],
            barRatio: 0.4,
            xLabelAngle: 35,
            hideHover: 'auto',
            resize: true
        });
    </script>
</div>
<style>
    .pagination{
        margin: 0 !important;
    }
</style>
@endsection
@section('act5')
'active'
@endsection
</html>