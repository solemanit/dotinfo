(function () {
    "use strict";

    /* Simple pi */

    var options = {
        series: [44, 55, 13, 43, 22],
        chart: {
            width: 400,
            type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#simplePieCharts"), options);
    chart.render();

    /* donut */
    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
            type: 'donut',
            with: 100,
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#simpleDonutPieCharts"), options);
    chart.render();

    /* donut update*/

    var options = {
        series: [44, 55, 13, 33],
        chart: {
            width: 380,
            type: 'donut',
        },
        dataLabels: {
            enabled: false
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: 'right',
            offsetY: 0,
            height: 230,
        }
    };

    var chart = new ApexCharts(document.querySelector("#simpleDonutUpdatePieCharts"), options);
    chart.render();


    function appendData() {
        var arr = chart.w.globals.series.slice()
        arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
        return arr;
    }

    function removeData() {
        var arr = chart.w.globals.series.slice()
        arr.pop()
        return arr;
    }

    function randomize() {
        return chart.w.globals.series.map(function () {
            return Math.floor(Math.random() * (100 - 1 + 1)) + 1
        })
    }

    function reset() {
        return options.series
    }

    document.querySelector("#randomize").addEventListener("click", function () {
        chart.updateSeries(randomize())
    })

    document.querySelector("#add").addEventListener("click", function () {
        chart.updateSeries(appendData())
    })

    document.querySelector("#remove").addEventListener("click", function () {
        chart.updateSeries(removeData())
    })

    document.querySelector("#reset").addEventListener("click", function () {
        chart.updateSeries(reset())
    })

    /* monochrome */
    var options = {
        series: [25, 15, 44, 55, 41, 17],
        chart: {
            width: '400px',
            height: '400px',
            type: 'pie',
        },
        labels: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ],
        theme: {
            monochrome: {
                enabled: true,
            },
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    offset: -5,
                },
            },
        },
        grid: {
            padding: {
                top: 0,
                bottom: 0,
                left: 0,
                right: 0,
            },
        },
        dataLabels: {
            formatter(val, opts) {
                const name = opts.w.globals.labels[opts.seriesIndex]
                return [name, val.toFixed(1) + '%']
            },
        },
        legend: {
            show: false,
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 320
                },
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#monochromePieCharts"), options);
    chart.render();

    /* Gradient Donut */
    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
            width: 400,
            type: 'donut',
        },
        plotOptions: {
            pie: {
                startAngle: -90,
                endAngle: 270
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'gradient',
        },
        legend: {
            formatter: function (val, opts) {
                return val + " - " + opts.w.globals.series[opts.seriesIndex]
            }
        },
        title: {
            text: 'Gradient Donut with custom Start-angle'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#gradientDonutPieCharts"), options);
    chart.render();

    /* Donut with Pattern */
    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
            width: 380,
            type: 'donut',
            dropShadow: {
                enabled: true,
                color: '#111',
                top: -1,
                left: 3,
                blur: 3,
                opacity: 0.5
            }
        },
        stroke: {
            width: 0,
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        total: {
                            showAlways: true,
                            show: true
                        }
                    }
                }
            }
        },
        labels: ["Comedy", "Action", "SciFi", "Drama", "Horror"],
        dataLabels: {
            dropShadow: {
                blur: 3,
                opacity: 1
            }
        },
        fill: {
            type: 'pattern',
            opacity: 1,
            pattern: {
                enabled: true,
                style: ['verticalLines', 'squares', 'horizontalLines', 'circles', 'slantedLines'],
            },
        },
        states: {
            hover: {
                filter: 'none'
            }
        },
        theme: {
            palette: 'palette2'
        },
        title: {
            text: "Favourite Movie Type"
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#donutPatternPieCharts"), options);
    chart.render();

    /* pie image */
    var options = {
        series: [44, 33, 54, 45],
        chart: {
            width: 380,
            type: 'pie',
        },
        colors: ['#93C3EE', '#E5C6A0', '#669DB5', '#94A74A'],
        fill: {
            type: 'image',
            opacity: 0.85,
            image: {
                src: ['assets/images/bg/bar-chart-bg.webp', 'assets/images/bg/bar-chart-bg2.webp', 'assets/images/bg/bar-chart-bg.webp', 'assets/images/bg/bar-chart-bg2.webp'],
                width: 25,
                imagedHeight: 25
            },
        },
        stroke: {
            width: 4
        },
        dataLabels: {
            enabled: true,
            style: {
                colors: ['#111']
            },
            background: {
                enabled: true,
                foreColor: '#fff',
                borderWidth: 0
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#imagePieCharts"), options);
    chart.render();


})();