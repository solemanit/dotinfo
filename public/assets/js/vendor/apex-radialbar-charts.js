(function () {
    "use strict";

    /* basic */
    var options = {
        series: [70],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        colors: ['#4F46E5'],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '70%',
                }
            },
        },
        labels: ['Cricket'],
    };

    var chart = new ApexCharts(document.querySelector("#basicRadialBarCharts"), options);
    chart.render();

    /* Multiple */
    var options = {
        series: [44, 55, 67, 83],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function (w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 249
                        }
                    }
                }
            }
        },
        labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF'],
    };

    var chart = new ApexCharts(document.querySelector("#multipleRadialBarCharts"), options);
    chart.render();

    /* Custom Angle Circle */
    var options = {
        series: [76, 67, 61, 90],
        chart: {
            height: 390,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: '30%',
                    background: 'transparent',
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    }
                },
                barLabels: {
                    enabled: true,
                    useSeriesColors: true,
                    offsetX: -8,
                    fontSize: '16px',
                    formatter: function (seriesName, opts) {
                        return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                    },
                },
            }
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF'],
        labels: ['Vimeo', 'Messenger', 'Facebook', 'LinkedIn'],
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#customAngleCircleRadialBarCharts"), options);
    chart.render();

    /* Gradient */
    var options = {
        series: [75],
        chart: {
            height: 350,
            type: 'radialBar',
            toolbar: {
                show: true
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 225,
                hollow: {
                    margin: 0,
                    size: '70%',
                    background: '#fff',
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: 'front',
                    dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.5
                    }
                },
                track: {
                    background: '#fff',
                    strokeWidth: '67%',
                    margin: 0, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.7
                    }
                },

                dataLabels: {
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: '#888',
                        fontSize: '17px'
                    },
                    value: {
                        formatter: function (val) {
                            return parseInt(val);
                        },
                        color: '#111',
                        fontSize: '36px',
                        show: true,
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientToColors: ['#4F46E5'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: 'round'
        },
        labels: ['Percent'],
    };

    var chart = new ApexCharts(document.querySelector("#gradientRadialBarCharts"), options);
    chart.render();

    /* Stroked Gauge */
    var options = {
        series: [67],
        chart: {
            height: 350,
            type: 'radialBar',
            offsetY: -10
        },
        colors: ['#4F46E5'],
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '16px',
                        color: undefined,
                        offsetY: 120
                    },
                    value: {
                        offsetY: 76,
                        fontSize: '22px',
                        color: undefined,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.15,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4
        },
        labels: ['Median Ratio'],
    };

    var chart = new ApexCharts(document.querySelector("#strokedGaugeRadialBarCharts"), options);
    chart.render();

    /* Semi Circle Gauge */
    var options = {
        series: [76],
        chart: {
            type: 'radialBar',
            offsetY: -20,
            sparkline: {
                enabled: true
            }
        },
        colors: ['#4F46E5'],
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: {
                    background: "#e7e7e7",
                    strokeWidth: '97%',
                    margin: 5, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: 2,
                        left: 0,
                        color: '#444',
                        opacity: 1,
                        blur: 2
                    }
                },
                dataLabels: {
                    name: {
                        show: false
                    },
                    value: {
                        offsetY: -2,
                        fontSize: '22px'
                    }
                }
            }
        },
        grid: {
            padding: {
                top: -10
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                shadeIntensity: 0.4,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 53, 91]
            },
        },
        labels: ['Average Results'],
    };

    var chart = new ApexCharts(document.querySelector("#semiCircleGaugeRadialBarCharts"), options);
    chart.render();

    /* image */

    var options = {
        series: [67],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 15,
                    size: '70%',
                    image: 'assets/images/shop/order-done.png',
                    imageWidth: 64,
                    imageHeight: 64,
                    imageClipped: false
                },
                dataLabels: {
                    name: {
                        show: false,
                        color: '#fff'
                    },
                    value: {
                        show: true,
                        color: '#333',
                        offsetY: 70,
                        fontSize: '22px'
                    }
                }
            }
        },
        fill: {
            type: 'image',
            image: {
                src: ['assets/images/bg/bar-chart-bg.webp'],
            }
        },
        stroke: {
            lineCap: 'round'
        },
        labels: ['Volatility'],
    };

    var chart = new ApexCharts(document.querySelector("#imageRadialBarCharts"), options);
    chart.render();

})();