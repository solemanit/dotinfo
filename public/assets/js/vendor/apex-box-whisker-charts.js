(function () {
    "use strict";

    var options = {
        series: [
            {
                type: 'boxPlot',
                data: [
                    {
                        x: 'Jan 2015',
                        y: [54, 66, 69, 75, 88]
                    },
                    {
                        x: 'Jan 2016',
                        y: [43, 65, 69, 76, 81]
                    },
                    {
                        x: 'Jan 2017',
                        y: [31, 39, 45, 51, 59]
                    },
                    {
                        x: 'Jan 2018',
                        y: [39, 46, 55, 65, 71]
                    },
                    {
                        x: 'Jan 2019',
                        y: [29, 31, 35, 39, 44]
                    },
                    {
                        x: 'Jan 2020',
                        y: [41, 49, 58, 61, 67]
                    },
                    {
                        x: 'Jan 2021',
                        y: [54, 59, 66, 71, 88]
                    }
                ]
            }
        ],
        chart: {
            type: 'boxPlot',
            height: 350
        },
        title: {
            text: 'Basic BoxPlot Chart',
            align: 'left'
        },
        plotOptions: {
            boxPlot: {
                colors: {
                    upper: '#4F46E5',
                    lower: '#FEBB7B'
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#basicBoxWhiskerCharts"), options);
    chart.render();

    //////////
    var options = {
        series: [
            {
                name: 'box',
                type: 'boxPlot',
                data: [
                    {
                        x: 'Alice',
                        y: [54, 66, 69, 75, 88],
                        goals: [
                            {
                                value: 32,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                        ],
                    },
                    {
                        x: 'Bob',
                        y: [43, 65, 69, 76, 81],
                        goals: [
                            {
                                value: 35,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                            {
                                value: 95,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                        ],
                    },
                    {
                        x: 'Charlie',
                        y: [31, 39, 45, 51, 59],
                        goals: [
                            {
                                value: 64,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                            {
                                value: 75,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                        ],
                    },
                    {
                        x: 'David',
                        y: [39, 46, 55, 65, 71],
                        goals: [
                            {
                                value: 27,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                            {
                                value: 77,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                        ],
                    },
                    {
                        x: 'Ahmed',
                        y: [29, 31, 35, 39, 44],
                        goals: [
                            {
                                value: 10,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                            {
                                value: 56,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                            {
                                value: 62,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                            {
                                value: 98,
                                strokeWidth: 0,
                                strokeHeight: 13,
                                strokeLineCap: 'round',
                                strokeColor: '#FEB019',
                            },
                        ],
                    },
                ],
            },
        ],
        chart: {
            type: 'boxPlot',
            height: 350,
        },
        colors: ['#1E2C29', '#FEBB7B'],
        title: {
            text: 'BoxPlot chart with outliers',
            align: 'left',
        },
        xaxis: {
            type: 'category',
        },
        plotOptions: {
            boxPlot: {
                colors: {
                    upper: '#4F46E5',
                    lower: '#FEBB7B'
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#boxplotScatterBoxWhiskerCharts"), options);
    chart.render();

    //////////
    var options = {
        series: [
            {
                data: [
                    {
                        x: 'Category A',
                        y: [54, 66, 69, 75, 88],
                        goals: [
                            {
                                value: 90,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#F283B6',
                            },
                            {
                                value: 93,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#F283B6',
                            },
                        ],
                    },
                    {
                        x: 'Category B',
                        y: [43, 65, 69, 76, 81],
                    },
                    {
                        x: 'Category C',
                        y: [31, 39, 45, 51, 59],
                    },
                    {
                        x: 'Category D',
                        y: [39, 46, 55, 65, 71],
                        goals: [
                            {
                                value: 30,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#F283B6',
                            },
                            {
                                value: 32,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#F283B6',
                            },
                            {
                                value: 76,
                                strokeWidth: 10,
                                strokeHeight: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#F283B6',
                            },
                        ],
                    },
                    {
                        x: 'Category E',
                        y: [41, 49, 58, 61, 67],
                    },

                ],
            },
        ],
        chart: {
            type: 'boxPlot',
            height: 350
        },
        title: {
            text: 'Horizontal BoxPlot with Outliers',
            align: 'left'
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '40%'
            },
            boxPlot: {
                colors: {
                    upper: '#1E2C29',
                    lower: '#FEBB7B'
                }
            }
        },
        stroke: {
            colors: ['#333']
        }
    };

    var chart = new ApexCharts(document.querySelector("#horizontalBoxWhiskerCharts"), options);
    chart.render();


})();