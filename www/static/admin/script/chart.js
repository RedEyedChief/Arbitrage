$(function () { 
        var chart = {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Використання системи'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Stats)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: []
        }
        
        var dateResolver = []
        var series = []
        $.post("/content/getChartData",{},function(data){
                data = JSON.parse(data)
                console.log(data)
                data = data.data
                var c = 0;
                
                var statKey = {
                        visits: "Відвідування",
                        algo: "Обчислення",
                        login: "Авторизації"
                }

                for (var key in data) {
                        series[key] = []
                        
                        data[key].forEach(function(date){
                                if (chart.xAxis.categories.indexOf(date.date)<0) {
                                        var id = chart.xAxis.categories.push(date.date);
                                        series[key][id-1] = parseInt(date.num)
                                        c++
                                        //console.log(date.date)
                                }
                                else{
                                        var id = chart.xAxis.categories.indexOf(date.date)
                                        series[key][id] = parseInt(date.num)
                                }
                                
                        })
                }
                
                for (var key in data) {
                        for (var i=0;i<c;i++)
                        {
                                if(series[key][i]===undefined) series[key][i] = 0
                        }
                }
                
                for (key in series){
                        console.log(key)
                        chart.series.push({name: statKey[key], data:series[key]})
                }
                //chart.xAxis.categories.for
                
                console.log(series)
                $("#container").highcharts(chart);
        });
    });

