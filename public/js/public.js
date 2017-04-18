/**
 * Created by Tako on 2017/3/29.
 */

function makeAmChartForm(yeardata) {
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "chalk",
        "legend": {
            "equalWidths": false,
            "useGraphSettings": true,
            "valueAlign": "left",
            "valueWidth": 120
        },
        "dataProvider": yeardata,
        "valueAxes": [{
            "id": "uvAxis",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left",
            "title": "uv"
        }, {
            "id": "pvAxis",
            "pv": "mm",
            "pvUnits": {
                "hh": "h ",
                "mm": "min"
            },
            "axisAlpha": 0,
            "gridAlpha": 0,
            "inside": true,
            "position": "right",
            "title": "pv"
        }],
        "graphs": [{
            "alphaField": "alpha",
            "balloonText": "[[value]] 次",
            "dashLengthField": "dashLength",
            "fillAlphas": 0.7,
            "legendPeriodValueText": "总共: [[value.sum]] 次",
            "legendValueText": "[[value]] 次",
            "title": "uv",
            "type": "column",
            "valueField": "uv",
            "valueAxis": "uvAxis"
        },{
            "bullet": "square",
            "balloonText": "[[value]] 次",
            "bulletBorderAlpha": 1,
            "bulletBorderThickness": 1,
            "dashLengthField": "dashLength",
            "legendPeriodValueText": "总共: [[value.sum]] 次",
            "legendValueText": "[[value]] 次",
            "title": "pv",
            "fillAlphas": 0,
            "valueField": "pv",
            "valueAxis": "pvAxis"
        }],
        "chartCursor": {
            "categoryBalloonDateFormat": "DD",
            "cursorAlpha": 0.1,
            "cursorColor":"#000000",
            "fullWidth":true,
            "valueBalloonsEnabled": false,
            "zoomable": false
        },
        "dataDateFormat": "YYYY-MM-DD",
        "categoryField": "date",
        "categoryAxis": {
            "dateFormats": [{
                "period": "DD",
                "format": "MMM DD"
            }, {
                "period": "WW",
                "format": "MMM DD"
            }, {
                "period": "MM",
                "format": "MMM YYYY"
            }, {
                "period": "YYYY",
                "format": "MMM YYYY"
            }],
            "parseDates": true,
            "autoGridCount": false,
            "axisColor": "#555555",
            "gridAlpha": 0.1,
            "gridColor": "#FFFFFF",
            "gridCount": 50,
            "equalSpacing" : true,
        },
        "export": {
            "enabled": true
        }
    });
    $("#yearUvCounts").text(getSum(yeardata,'uv'));
    $("#yearPvCounts").text(getSum(yeardata,'pv'));
}

function makeMorrisForm(weekdata){
    //Morris Chart (Total Visits)
    var totalVisitChart = Morris.Bar({
        element: 'weekVisitChart',
        data: weekdata,
        xkey: 'time',
        ykeys: ['uv', 'pv'],
        labels: ['UV', 'PV'],
        barColors: ['#999', '#eee'],
        hideHover: 'auto',
        grid: true,
        gridTextColor: '#777',
    });

    $("#weekUvCounts").text(getSum(weekdata,'uv'));
    $("#weekPvCounts").text(getSum(weekdata,'pv'));
}

function makeFlotChartForm(monthdata) {

    function plotWithOptions() {
        $.plot("#placeholder",
            [monthdata['pv'],monthdata['uv']],
            {
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: '#eee',
                        steps: false,

                    },
                    points: {
                        show: true,
                        fill: false
                    }
                },

                grid: {
                    color: ['#fff',"#999"],
                    hoverable: true,
                    autoHighlight: true,
                },
                colors: [ '#bbb',"#999"],
                xaxis: {
                    ticks: [[0, "4周前"], [1, "3周前"], [2, "2周前"], [3, "1周前"], [4, "本周"]]
                }
        });
    }

    $("<div id='tooltip'></div>").css({
        position: "absolute",
        display: "none",
        border: "1px solid #222",
        padding: "4px",
        color: "#fff",
        "border-radius": "4px",
        "background-color": "rgb(0,0,0)",
        opacity: 0.90
    }).appendTo("body");

    $("#placeholder").bind("plothover", function (event, pos, item) {

        var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
        $("#hoverdata").text(str);

        if (item) {
            var x = item.datapoint[0],
                y = item.datapoint[1];

            $("#tooltip").html("浏览量 : " + y)
                .css({top: item.pageY+5, left: item.pageX+5})
                .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });

    plotWithOptions();

    $("#monthUvCounts").text(getSum(monthdata['uv'],1));
    $("#monthPvCounts").text(getSum(monthdata['pv'],1));
}

function getAccessToken() {
    const data = {
        name: 'Token Name',
        scopes: []
    };

    axios.post('/oauth/personal-access-tokens', data)
        .then(response => {
        localStorage.token = response.data.accessToken;
}).catch (response => {
        // 列出响应错误信息...
    });
}

function getUserData() {
    var token = localStorage.token;
    var config = {
        headers: {'Authorization': 'Bearer '+token}
    };
    axios.get('/api/user',config)
        .then(response => {
        console.log(response.data);
});
}
function getChartsData(url,authname) {
    var token = localStorage.token;
    var config = {
        headers: {'Authorization': 'Bearer '+token},
        name: authname
    };

    axios.post(url,config)
        .then(response => {
        makeMorrisForm(response.data['weekdata']);
    makeFlotChartForm(response.data['monthdata']);
    makeAmChartForm(response.data['yeardata']);
    //console.log(response.data);
});
}

function postData(url,authname){
    var token = localStorage.token;
    var config = {
        headers: {'Authorization': 'Bearer '+token},
        name: authname
    };
    return axios.post(url,config);
}

function getData(url){
    var token = localStorage.token;
    var config = {
        headers: {'Authorization': 'Bearer '+token},
    };
    return axios.get(url,config);
}

function getSum(dataArray,dataKey) {
    var sum = dataArray.reduce(
        function(sum, current){
            return sum + current[dataKey];
        }, 0
    );
    return sum;
}




