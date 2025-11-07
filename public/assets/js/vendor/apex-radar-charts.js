(function () {
    "use strict";

    /* basic */
    var options = {
        series: [{
            name: 'Series 1',
            data: [80, 50, 30, 40, 100, 20],
        }],
        chart: {
            height: 350,
            type: 'radar',
        },
        colors: ['#4F46E5'],
        title: {
            text: 'Basic Radar Chart'
        },
        yaxis: {
            stepSize: 20
        },
        xaxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June']
        }
    };

    var chart = new ApexCharts(document.querySelector("#basicRadarCharts"), options);
    chart.render();

    /* Multi */
    var options = {
        series: [{
            name: 'Series 1',
            data: [80, 50, 30, 40, 100, 20],
        }, {
            name: 'Series 2',
            data: [20, 30, 40, 80, 20, 80],
        }, {
            name: 'Series 3',
            data: [44, 76, 78, 13, 43, 10],
        }],
        chart: {
            height: 350,
            type: 'radar',
            dropShadow: {
                enabled: true,
                blur: 1,
                left: 1,
                top: 1
            }
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F'],
        title: {
            text: 'Radar Chart - Multi Series'
        },
        stroke: {
            width: 2
        },
        fill: {
            opacity: 0.1
        },
        markers: {
            size: 0
        },
        yaxis: {
            stepSize: 20
        },
        xaxis: {
            categories: ['2011', '2012', '2013', '2014', '2015', '2016']
        }
    };

    var chart = new ApexCharts(document.querySelector("#multipleSeriesRadarCharts"), options);
    chart.render();

    /* Radar with Polygon-fill */
    var options = {
        series: [{
            name: 'Series 1',
            data: [20, 100, 40, 30, 50, 80, 33],
        }],
        chart: {
            height: 350,
            type: 'radar',
        },
        dataLabels: {
            enabled: true
        },
        plotOptions: {
            radar: {
                size: 140,
                polygons: {
                    strokeColors: '#e9e9e9',
                    fill: {
                        colors: ['#f8f8f8', '#fff']
                    }
                }
            }
        },
        title: {
            text: 'Radar with Polygon Fill'
        },
        colors: ['#4F46E5'],
        markers: {
            size: 4,
            colors: ['#fff'],
            strokeColor: '#4F46E5',
            strokeWidth: 2,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val
                }
            }
        },
        xaxis: {
            categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        },
        yaxis: {
            labels: {
                formatter: function (val, i) {
                    if (i % 2 === 0) {
                        return val
                    } else {
                        return ''
                    }
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#polygonFillRadarCharts"), options);
    chart.render();

})();