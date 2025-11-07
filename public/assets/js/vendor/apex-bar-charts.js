(function () {
    "use strict";
    /* bar basic */
    var options = {
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
        chart: {
            type: 'bar',
            height: 430
        },
        colors: ['#4F46E5'],
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                'United States', 'China', 'Germany'
            ],
        }
    };

    var chart = new ApexCharts(document.querySelector("#basicChart"), options);
    chart.render();

    /* grouped */

    var options = {
        series: [{
            data: [44, 55, 41, 64, 22, 43, 21]
        }, {
            data: [53, 32, 33, 52, 13, 44, 32]
        }],
        chart: {
            type: 'bar',
            height: 430
        },
        colors: ['#4F46E5', '#FEBB7B'],
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        xaxis: {
            categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
        },
    };

    var chart = new ApexCharts(document.querySelector("#barGroupedChart"), options);
    chart.render();


    /* stacked */
    var options = {
        series: [{
            name: 'Marine Sprite',
            data: [44, 55, 41, 37, 22, 43, 21]
        }, {
            name: 'Striking Calf',
            data: [53, 32, 33, 52, 13, 43, 32]
        }, {
            name: 'Tank Picture',
            data: [12, 17, 11, 9, 15, 11, 20]
        }, {
            name: 'Bucket Slope',
            data: [9, 7, 5, 8, 6, 9, 4]
        }, {
            name: 'Reborn Kid',
            data: [25, 12, 19, 32, 25, 24, 10]
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF', '#E63232'],
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    total: {
                        enabled: true,
                        offsetX: 0,
                        style: {
                            fontSize: '13px',
                            fontWeight: 900
                        }
                    }
                }
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        title: {
            text: 'Fiction Books Sales'
        },
        xaxis: {
            categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
            labels: {
                formatter: function (val) {
                    return val + "K"
                }
            }
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + "K"
                }
            }
        },
        fill: {
            opacity: 1
        },
        legend: {
            position: 'top',
            horizontalAlign: 'center',
            offsetX: 40
        }
    };
    var chart = new ApexCharts(document.querySelector("#barStackedChart"), options);
    chart.render();

    /* stacked 100*/
    var options = {
        series: [{
            name: 'Marine Sprite',
            data: [44, 55, 41, 37, 22, 43, 21]
        }, {
            name: 'Striking Calf',
            data: [53, 32, 33, 52, 13, 43, 32]
        }, {
            name: 'Tank Picture',
            data: [12, 17, 11, 9, 15, 11, 20]
        }, {
            name: 'Bucket Slope',
            data: [9, 7, 5, 8, 6, 9, 4]
        }, {
            name: 'Reborn Kid',
            data: [25, 12, 19, 32, 25, 24, 10]
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            stackType: '100%'
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF', '#E63232'],
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        title: {
            text: '100% Stacked Bar'
        },
        xaxis: {
            categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + "K"
                }
            }
        },
        fill: {
            opacity: 1

        },
        legend: {
            position: 'top',
            horizontalAlign: 'center',
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#barStacked100Chart"), options);
    chart.render();

    /* Grouped Stacked Bars */

    var options = {
        series: [
            {
                name: 'Q1 Budget',
                group: 'budget',
                data: [44000, 55000, 41000, 67000, 22000]
            },
            {
                name: 'Q1 Actual',
                group: 'actual',
                data: [48000, 50000, 40000, 65000, 25000]
            },
            {
                name: 'Q2 Budget',
                group: 'budget',
                data: [13000, 36000, 20000, 8000, 13000]
            },
            {
                name: 'Q2 Actual',
                group: 'actual',
                data: [20000, 40000, 25000, 10000, 12000]
            }
        ],
        chart: {
            type: 'bar',
            height: 440,
            stacked: true,
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        dataLabels: {
            formatter: (val) => {
                return val / 1000 + 'K'
            }
        },
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        xaxis: {
            categories: [
                'Online advertising',
                'Sales Training',
                'Print advertising',
                'Catalogs',
                'Meetings'
            ],
            labels: {
                formatter: (val) => {
                    return val / 1000 + 'K'
                }
            }
        },
        fill: {
            opacity: 1,
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF'],
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#barGroupedStackedChart"), options);
    chart.render();

    /* Bar with Negative Values */

    var options = {
        series: [{
            name: 'Males',
            data: [0.4, 0.65, 0.76, 0.88, 1.5, 2.1, 2.9, 3.8, 3.9, 4.2, 4, 4.3, 4.1, 4.2, 4.5,
                3.9, 3.5, 3
            ]
        },
        {
            name: 'Females',
            data: [-0.8, -1.05, -1.06, -1.18, -1.4, -2.2, -2.85, -3.7, -3.96, -4.22, -4.3, -4.4,
            -4.1, -4, -4.1, -3.4, -3.1, -2.8
            ]
        }
        ],
        chart: {
            type: 'bar',
            height: 440,
            stacked: true
        },
        colors: ['#28A745', '#E63232'],
        plotOptions: {
            bar: {
                borderRadius: 5,
                borderRadiusApplication: 'end', // 'around', 'end'
                borderRadiusWhenStacked: 'all', // 'all', 'last'
                horizontal: true,
                barHeight: '80%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 1,
            colors: ["#fff"]
        },

        grid: {
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        yaxis: {
            stepSize: 1
        },
        tooltip: {
            shared: false,
            x: {
                formatter: function (val) {
                    return val
                }
            },
            y: {
                formatter: function (val) {
                    return Math.abs(val) + "%"
                }
            }
        },
        title: {
            text: 'Mauritius population pyramid 2011'
        },
        xaxis: {
            categories: ['85+', '80-84', '75-79', '70-74', '65-69', '60-64', '55-59', '50-54',
                '45-49', '40-44', '35-39', '30-34', '25-29', '20-24', '15-19', '10-14', '5-9',
                '0-4'
            ],
            title: {
                text: 'Percent'
            },
            labels: {
                formatter: function (val) {
                    return Math.abs(Math.round(val)) + "%"
                }
            }
        },
    };

    var chart = new ApexCharts(document.querySelector("#barNegativeValuesChart"), options);
    chart.render();

    /* Bar with Markers Chart */
    var options = {
        series: [
            {
                name: 'Actual',
                data: [
                    {
                        x: '2011',
                        y: 12,
                        goals: [
                            {
                                name: 'Expected',
                                value: 14,
                                strokeWidth: 2,
                                strokeDashArray: 2,
                                strokeColor: '#FEBB7B'
                            }
                        ]
                    },
                    {
                        x: '2012',
                        y: 44,
                        goals: [
                            {
                                name: 'Expected',
                                value: 54,
                                strokeWidth: 5,
                                strokeHeight: 10,
                                strokeColor: '#FEBB7B'
                            }
                        ]
                    },
                    {
                        x: '2013',
                        y: 54,
                        goals: [
                            {
                                name: 'Expected',
                                value: 52,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#FEBB7B'
                            }
                        ]
                    },
                    {
                        x: '2014',
                        y: 66,
                        goals: [
                            {
                                name: 'Expected',
                                value: 61,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#FEBB7B'
                            }
                        ]
                    },
                    {
                        x: '2015',
                        y: 81,
                        goals: [
                            {
                                name: 'Expected',
                                value: 66,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#FEBB7B'
                            }
                        ]
                    },
                    {
                        x: '2016',
                        y: 67,
                        goals: [
                            {
                                name: 'Expected',
                                value: 70,
                                strokeWidth: 5,
                                strokeHeight: 10,
                                strokeColor: '#FEBB7B'
                            }
                        ]
                    }
                ]
            }
        ],
        chart: {
            height: 350,
            type: 'bar'
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        colors: ['#4F46E5'],
        dataLabels: {
            formatter: function (val, opt) {
                const goals =
                    opt.w.config.series[opt.seriesIndex].data[opt.dataPointIndex]
                        .goals

                if (goals && goals.length) {
                    return `${val} / ${goals[0].value}`
                }
                return val
            }
        },
        legend: {
            show: true,
            showForSingleSeries: true,
            customLegendItems: ['Actual', 'Expected'],
            markers: {
                fillColors: ['#4F46E5', '#FEBB7B']
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#barMarkersChart"), options);
    chart.render();

    /* Reversed Bar Chart */
    var options = {
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        colors: ['#4F46E5'],
        annotations: {
            xaxis: [{
                x: 500,
                borderColor: '#00E396',
                label: {
                    borderColor: '#00E396',
                    style: {
                        color: '#fff',
                        background: '#00E396',
                    },
                    text: 'X annotation',
                }
            }],
            yaxis: [{
                y: 'July',
                y2: 'September',
                label: {
                    text: 'Y annotation'
                }
            }]
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: true
        },
        xaxis: {
            categories: ['June', 'July', 'August', 'September', 'October', 'November', 'December'],
        },
        grid: {
            xaxis: {
                lines: {
                    show: true
                }
            }
        },
        yaxis: {
            reversed: true,
            axisTicks: {
                show: true
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#reversedBarChart"), options);
    chart.render();

    /* Custom DataLabels Bar */
    var options = {
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
        chart: {
            type: 'bar',
            height: 380
        },
        plotOptions: {
            bar: {
                barHeight: '100%',
                distributed: true,
                horizontal: true,
                dataLabels: {
                    position: 'bottom'
                },
            }
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF', '#E63232', '#2b908f', '#f9a3a4', '#90ee7e',
            '#f48024', '#69d2e7'
        ],
        dataLabels: {
            enabled: true,
            textAnchor: 'start',
            style: {
                colors: ['#fff']
            },
            formatter: function (val, opt) {
                return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
            },
            offsetX: 0,
            dropShadow: {
                enabled: true
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                'United States', 'China', 'India'
            ],
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        title: {
            text: 'Custom DataLabels',
            align: 'center',
            floating: true
        },
        subtitle: {
            text: 'Category Names as DataLabels inside bars',
            align: 'center',
        },
        tooltip: {
            theme: 'dark',
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function () {
                        return ''
                    }
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#customDataLabelsBarChart"), options);
    chart.render();

    /* Patterned */
    var options = {
        series: [{
            name: 'Marine Sprite',
            data: [44, 55, 41, 37, 22, 43, 21]
        }, {
            name: 'Striking Calf',
            data: [53, 32, 33, 52, 13, 43, 32]
        }, {
            name: 'Tank Picture',
            data: [12, 17, 11, 9, 15, 11, 20]
        }, {
            name: 'Bucket Slope',
            data: [9, 7, 5, 8, 6, 9, 4]
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            dropShadow: {
                enabled: true,
                blur: 1,
                opacity: 0.5
            }
        },
        colors: ['#4F46E5', '#FF830F', '#1493FF', '#E63232'],
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '60%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 2,
        },
        title: {
            text: 'Compare Sales Strategy'
        },
        xaxis: {
            categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return val + "K"
                }
            }
        },
        fill: {
            type: 'pattern',
            opacity: 1,
            pattern: {
                style: ['circles', 'slantedLines', 'verticalLines', 'horizontalLines'], // string or array of strings

            }
        },
        states: {
            hover: {
                filter: 'none'
            }
        },
        legend: {
            position: 'right',
            offsetY: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#barPatternedChart"), options);
    chart.render();

    /* Bar with Images */
    var options = {
        series: [{
            name: 'coins',
            data: [2, 4, 3, 4, 3, 5, 5, 6.5, 6, 5, 4, 5, 8, 7, 7, 8, 8, 10, 9, 9, 12, 12,
                11, 12, 13, 14, 16, 14, 15, 17, 19, 21
            ]
        }],
        chart: {
            type: 'bar',
            height: 410,
            animations: {
                enabled: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '100%',

            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 1,
            colors: ['#000'],
        },
        labels: Array.apply(null, { length: 32 }).map(function (el, index) {
            return index + 1;
        }),
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            labels: {
                show: false
            },
            title: {
                text: 'Weight',
            },
        },
        grid: {
            position: 'back'
        },
        title: {
            text: 'Paths filled by clipped image',
            align: 'right',
            offsetY: 30
        },
        fill: {
            type: 'image',
            opacity: 0.87,
            image: {
                src: 'assets/images/bg/bar-chart-bg.webp',
                width: 600,
                height: 600,
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#barChartWithImages"), options);
    chart.render();

})();