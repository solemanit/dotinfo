(function () {
    "use strict";

    /* Basic */
    var options = {
        series: [
            {
                data: [
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-02').getTime(),
                            new Date('2019-03-04').getTime()
                        ]
                    },
                    {
                        x: 'Test',
                        y: [
                            new Date('2019-03-04').getTime(),
                            new Date('2019-03-08').getTime()
                        ]
                    },
                    {
                        x: 'Validation',
                        y: [
                            new Date('2019-03-08').getTime(),
                            new Date('2019-03-12').getTime()
                        ]
                    },
                    {
                        x: 'Deployment',
                        y: [
                            new Date('2019-03-12').getTime(),
                            new Date('2019-03-18').getTime()
                        ]
                    }
                ]
            }
        ],
        chart: {
            height: 350,
            type: 'rangeBar'
        },
        colors: ['#4F46E5'],
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        xaxis: {
            type: 'datetime'
        }
    };

    var chart = new ApexCharts(document.querySelector("#basicTimelineCharts"), options);
    chart.render();

    /* Distributed */
    var options = {
        series: [
            {
                data: [
                    {
                        x: 'Analysis',
                        y: [
                            new Date('2019-02-27').getTime(),
                            new Date('2019-03-04').getTime()
                        ],
                        fillColor: '#008FFB'
                    },
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-04').getTime(),
                            new Date('2019-03-08').getTime()
                        ],
                        fillColor: '#00E396'
                    },
                    {
                        x: 'Coding',
                        y: [
                            new Date('2019-03-07').getTime(),
                            new Date('2019-03-10').getTime()
                        ],
                        fillColor: '#775DD0'
                    },
                    {
                        x: 'Testing',
                        y: [
                            new Date('2019-03-08').getTime(),
                            new Date('2019-03-12').getTime()
                        ],
                        fillColor: '#FEB019'
                    },
                    {
                        x: 'Deployment',
                        y: [
                            new Date('2019-03-12').getTime(),
                            new Date('2019-03-17').getTime()
                        ],
                        fillColor: '#FF4560'
                    }
                ]
            }
        ],
        chart: {
            height: 350,
            type: 'rangeBar'
        },
        colors: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF', '#E63232'],
        plotOptions: {
            bar: {
                horizontal: true,
                distributed: true,
                dataLabels: {
                    hideOverflowingLabels: false
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                var label = opts.w.globals.labels[opts.dataPointIndex]
                var a = moment(val[0])
                var b = moment(val[1])
                var diff = b.diff(a, 'days')
                return label + ': ' + diff + (diff > 1 ? ' days' : ' day')
            },
            style: {
                colors: ['#f3f4f5', '#fff']
            }
        },
        xaxis: {
            type: 'datetime'
        },
        yaxis: {
            show: false
        },
        grid: {
            row: {
                colors: ['#f3f4f5', '#fff'],
                opacity: 1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#distributedTimelineCharts"), options);
    chart.render();

    /* */
    var options = {
        series: [
            {
                name: 'Bob',
                data: [
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-05').getTime(),
                            new Date('2019-03-08').getTime()
                        ]
                    },
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-08').getTime(),
                            new Date('2019-03-11').getTime()
                        ]
                    },
                    {
                        x: 'Test',
                        y: [
                            new Date('2019-03-11').getTime(),
                            new Date('2019-03-16').getTime()
                        ]
                    }
                ]
            },
            {
                name: 'Joe',
                data: [
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-02').getTime(),
                            new Date('2019-03-05').getTime()
                        ]
                    },
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-06').getTime(),
                            new Date('2019-03-09').getTime()
                        ]
                    },
                    {
                        x: 'Test',
                        y: [
                            new Date('2019-03-10').getTime(),
                            new Date('2019-03-19').getTime()
                        ]
                    }
                ]
            }
        ],
        chart: {
            height: 350,
            type: 'rangeBar'
        },
        colors: ["#4F46E5", "#FEBB7B",],
        plotOptions: {
            bar: {
                borderRadius: 10,
                horizontal: true
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                var a = moment(val[0])
                var b = moment(val[1])
                var diff = b.diff(a, 'days')
                return diff + (diff > 1 ? ' days' : ' day')
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [50, 0, 100, 100]
            }
        },
        xaxis: {
            type: 'datetime'
        },
        legend: {
            position: 'top'
        }
    };

    var chart = new ApexCharts(document.querySelector("#multiSeriesTimelineCharts"), options);
    chart.render();

    /* advanced */
    var options = {
        series: [
            {
                name: 'Bob',
                data: [
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-05').getTime(),
                            new Date('2019-03-08').getTime()
                        ]
                    },
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-02').getTime(),
                            new Date('2019-03-05').getTime()
                        ]
                    },
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-05').getTime(),
                            new Date('2019-03-07').getTime()
                        ]
                    },
                    {
                        x: 'Test',
                        y: [
                            new Date('2019-03-03').getTime(),
                            new Date('2019-03-09').getTime()
                        ]
                    },
                    {
                        x: 'Test',
                        y: [
                            new Date('2019-03-08').getTime(),
                            new Date('2019-03-11').getTime()
                        ]
                    },
                    {
                        x: 'Validation',
                        y: [
                            new Date('2019-03-11').getTime(),
                            new Date('2019-03-16').getTime()
                        ]
                    },
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-01').getTime(),
                            new Date('2019-03-03').getTime()
                        ],
                    }
                ]
            },
            {
                name: 'Joe',
                data: [
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-02').getTime(),
                            new Date('2019-03-05').getTime()
                        ]
                    },
                    {
                        x: 'Test',
                        y: [
                            new Date('2019-03-06').getTime(),
                            new Date('2019-03-16').getTime()
                        ],
                        goals: [
                            {
                                name: 'Break',
                                value: new Date('2019-03-10').getTime(),
                                strokeColor: '#CD2F2A'
                            }
                        ]
                    },
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-03').getTime(),
                            new Date('2019-03-07').getTime()
                        ]
                    },
                    {
                        x: 'Deployment',
                        y: [
                            new Date('2019-03-20').getTime(),
                            new Date('2019-03-22').getTime()
                        ]
                    },
                    {
                        x: 'Design',
                        y: [
                            new Date('2019-03-10').getTime(),
                            new Date('2019-03-16').getTime()
                        ]
                    }
                ]
            },
            {
                name: 'Dan',
                data: [
                    {
                        x: 'Code',
                        y: [
                            new Date('2019-03-10').getTime(),
                            new Date('2019-03-17').getTime()
                        ]
                    },
                    {
                        x: 'Validation',
                        y: [
                            new Date('2019-03-05').getTime(),
                            new Date('2019-03-09').getTime()
                        ],
                        goals: [
                            {
                                name: 'Break',
                                value: new Date('2019-03-07').getTime(),
                                strokeColor: '#CD2F2A'
                            }
                        ]
                    },
                ]
            }
        ],
        chart: {
            height: 450,
            type: 'rangeBar'
        },
        colors: ["#4F46E5", "#FEBB7B",],
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '80%'
            }
        },
        xaxis: {
            type: 'datetime'
        },
        stroke: {
            width: 1
        },
        fill: {
            type: 'solid',
            opacity: 0.6
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#advancedTimelineCharts"), options);
    chart.render();

    /* Multiple series – Group rows */
    var options = {
        series: [
            // George Washington
            {
                name: 'George Washington',
                data: [
                    {
                        x: 'President',
                        y: [
                            new Date(1789, 3, 30).getTime(),
                            new Date(1797, 2, 4).getTime()
                        ]
                    },
                ]
            },
            // John Adams
            {
                name: 'John Adams',
                data: [
                    {
                        x: 'President',
                        y: [
                            new Date(1797, 2, 4).getTime(),
                            new Date(1801, 2, 4).getTime()
                        ]
                    },
                    {
                        x: 'Vice President',
                        y: [
                            new Date(1789, 3, 21).getTime(),
                            new Date(1797, 2, 4).getTime()
                        ]
                    }
                ]
            },
            // Thomas Jefferson
            {
                name: 'Thomas Jefferson',
                data: [
                    {
                        x: 'President',
                        y: [
                            new Date(1801, 2, 4).getTime(),
                            new Date(1809, 2, 4).getTime()
                        ]
                    },
                    {
                        x: 'Vice President',
                        y: [
                            new Date(1797, 2, 4).getTime(),
                            new Date(1801, 2, 4).getTime()
                        ]
                    },
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1790, 2, 22).getTime(),
                            new Date(1793, 11, 31).getTime()
                        ]
                    }
                ]
            },
            // Aaron Burr
            {
                name: 'Aaron Burr',
                data: [
                    {
                        x: 'Vice President',
                        y: [
                            new Date(1801, 2, 4).getTime(),
                            new Date(1805, 2, 4).getTime()
                        ]
                    }
                ]
            },
            // George Clinton
            {
                name: 'George Clinton',
                data: [
                    {
                        x: 'Vice President',
                        y: [
                            new Date(1805, 2, 4).getTime(),
                            new Date(1812, 3, 20).getTime()
                        ]
                    }
                ]
            },
            // John Jay
            {
                name: 'John Jay',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1789, 8, 25).getTime(),
                            new Date(1790, 2, 22).getTime()
                        ]
                    }
                ]
            },
            // Edmund Randolph
            {
                name: 'Edmund Randolph',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1794, 0, 2).getTime(),
                            new Date(1795, 7, 20).getTime()
                        ]
                    }
                ]
            },
            // Timothy Pickering
            {
                name: 'Timothy Pickering',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1795, 7, 20).getTime(),
                            new Date(1800, 4, 12).getTime()
                        ]
                    }
                ]
            },
            // Charles Lee
            {
                name: 'Charles Lee',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1800, 4, 13).getTime(),
                            new Date(1800, 5, 5).getTime()
                        ]
                    }
                ]
            },
            // John Marshall
            {
                name: 'John Marshall',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1800, 5, 13).getTime(),
                            new Date(1801, 2, 4).getTime()
                        ]
                    }
                ]
            },
            // Levi Lincoln
            {
                name: 'Levi Lincoln',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1801, 2, 5).getTime(),
                            new Date(1801, 4, 1).getTime()
                        ]
                    }
                ]
            },
            // James Madison
            {
                name: 'James Madison',
                data: [
                    {
                        x: 'Secretary of State',
                        y: [
                            new Date(1801, 4, 2).getTime(),
                            new Date(1809, 2, 3).getTime()
                        ]
                    }
                ]
            },
        ],
        chart: {
            height: 350,
            type: 'rangeBar'
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '50%',
                rangeBarGroupRows: true
            }
        },
        colors: [
            "#4F46E5", "#FEBB7B", "#28A745", "#1493FF", "#FF830F",
            "#E63232", "#546E7A", "#D4526E", "#8D5B4C", "#F86624",
            "#D7263D", "#1B998B", "#2E294E", "#F46036", "#E2C044"
        ],
        fill: {
            type: 'solid'
        },
        xaxis: {
            type: 'datetime'
        },
        legend: {
            position: 'right'
        },
        tooltip: {
            custom: function (opts) {
                const fromYear = new Date(opts.y1).getFullYear()
                const toYear = new Date(opts.y2).getFullYear()

                const w = opts.ctx.w
                let ylabel =
                    w.config.series[opts.seriesIndex].data?.[opts.dataPointIndex]?.x
                let seriesName = w.config.series[opts.seriesIndex].name
                    ? w.config.series[opts.seriesIndex].name
                    : ''
                const color = w.globals.colors[opts.seriesIndex]

                return (
                    '<div class="apexcharts-tooltip-rangebar">' +
                    '<div> <span class="series-name" style="color: ' +
                    color +
                    '">' +
                    (seriesName ? seriesName : '') +
                    '</span></div>' +
                    '<div> <span class="category">' +
                    ylabel +
                    ' </span> <span class="value start-value">' +
                    fromYear +
                    '</span> <span class="separator">-</span> <span class="value end-value">' +
                    toYear +
                    '</span></div>' +
                    '</div>'
                )
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#multiSeriesGroupRowsTimelineCharts"), options);
    chart.render();

    /* Dumbbell Chart (Horizontal) */
    var options = {
        series: [
            {
                data: [
                    {
                        x: 'Operations',
                        y: [2800, 4500]
                    },
                    {
                        x: 'Customer Success',
                        y: [3200, 4100]
                    },
                    {
                        x: 'Engineering',
                        y: [2950, 7800]
                    },
                    {
                        x: 'Marketing',
                        y: [3000, 4600]
                    },
                    {
                        x: 'Product',
                        y: [3500, 4100]
                    },
                    {
                        x: 'Data Science',
                        y: [4500, 6500]
                    },
                    {
                        x: 'Sales',
                        y: [4100, 5600]
                    }
                ]
            }
        ],
        chart: {
            height: 390,
            type: 'rangeBar',
            zoom: {
                enabled: false
            }
        },
        colors: ['#4F46E5', '#FEBB7B'],
        plotOptions: {
            bar: {
                horizontal: true,
                isDumbbell: true,
                dumbbellColors: [['#4F46E5', '#FEBB7B']]
            }
        },
        title: {
            text: 'Paygap Disparity'
        },
        legend: {
            show: true,
            showForSingleSeries: true,
            position: 'top',
            horizontalAlign: 'left',
            customLegendItems: ['Female', 'Male']
        },
        fill: {
            type: 'gradient',
            gradient: {
                gradientToColors: ['#FEBB7B'],
                inverseColors: false,
                stops: [0, 100]
            }
        },
        grid: {
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#dumbbellHorizontalTimelineCharts"), options);
    chart.render();

})();