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
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> 成绩分布图</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <br> 课程编号 {{ $spread['classNum'] }} </br>
                        <br> 课程名称 {{ $spread['name'] }} </br>
                        <br> 课程人数 {{ $spread['times'] }} </br>
                        <br> 课程平局加权 {{ $spread['scores'] }} </br>
                        <br> 未参加考试人数 {{ $spread['no'] }} </br>
                        <br> 满分人数 {{ $spread['full'] }} </br>
                        <br> A人数 {{ $spread['A'] }} </br>
                        <br> B人数 {{ $spread['B'] }} </br>
                        <br> C人数 {{ $spread['C'] }} </br>
                        <br> D人数 {{ $spread['D'] }} </br>
                        <br> 不及格人数 {{ $spread['not'] }} </br>
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
        Morris.Donut({
            element: 'morris-donut-chart',
            data: [{
                label: "未考试",
                value: {{ $spread['no'] }}
            }, {
                label: "90-99分",
                value: {{ $spread['A'] }}
            }, {
                label: "80-89分",
                value: {{ $spread['B'] }}
            }, {
            label: "70-79分",
                value: {{ $spread['C'] }}
            }, {
            label: "60-69分",
                value: {{ $spread['D'] }}
            }, {
            label: "满分",
                value: {{ $spread['full'] }}
            }, {
            label: "不及格",
                value: {{ $spread['not'] }}
            }
            ],
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