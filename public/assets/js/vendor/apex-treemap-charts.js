(function () {
    "use strict";

    var options = {
        series: [
            {
                data: [
                    { x: 'New York', y: 218 },
                    { x: 'Los Angeles', y: 149 },
                    { x: 'Chicago', y: 184 },
                    { x: 'Houston', y: 55 },
                    { x: 'Phoenix', y: 84 },
                    { x: 'Philadelphia', y: 31 },
                    { x: 'San Antonio', y: 70 },
                    { x: 'San Diego', y: 30 },
                    { x: 'Dallas', y: 44 },
                    { x: 'San Jose', y: 68 },
                    { x: 'Austin', y: 28 },
                    { x: 'Jacksonville', y: 19 },
                    { x: 'Fort Worth', y: 29 }
                ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            height: 350,
            type: 'treemap'
        },
        title: {
            text: 'Basic Treemap'
        }
    };

    var chart = new ApexCharts(document.querySelector("#basicTreemapCharts"), options);
    chart.render();


    /* Multiple Series */
    var options = {
        series: [
            {
                name: 'Desktops',
                data: [
                    {
                        x: 'ABC',
                        y: 10
                    },
                    {
                        x: 'DEF',
                        y: 60
                    },
                    {
                        x: 'XYZ',
                        y: 41
                    }
                ]
            },
            {
                name: 'Mobile',
                data: [
                    {
                        x: 'ABCD',
                        y: 10
                    },
                    {
                        x: 'DEFG',
                        y: 20
                    },
                    {
                        x: 'WXYZ',
                        y: 51
                    },
                    {
                        x: 'PQR',
                        y: 30
                    },
                    {
                        x: 'MNO',
                        y: 20
                    },
                    {
                        x: 'CDE',
                        y: 30
                    }
                ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            height: 350,
            type: 'treemap'
        },
        title: {
            text: 'Multi-dimensional Treemap',
            align: 'center'
        }
    };

    var chart = new ApexCharts(document.querySelector("#multipleSeriesTreemapCharts"), options);
    chart.render();

    /* Distributed */
    var options = {
        series: [
            {
                data: [
                    { x: 'Dhaka', y: 218 },
                    { x: 'Chattogram', y: 149 },
                    { x: 'Khulna', y: 184 },
                    { x: 'Rajshahi', y: 55 },
                    { x: 'Sylhet', y: 84 },
                    { x: 'Barishal', y: 31 },
                    { x: 'Rangpur', y: 70 },
                    { x: 'Mymensingh', y: 30 },
                    { x: 'Cumilla', y: 44 },
                    { x: 'Narayanganj', y: 68 },
                    { x: 'Gazipur', y: 28 },
                    { x: 'Bogra', y: 19 },
                    { x: 'Jessore', y: 29 }
                ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            height: 350,
            type: 'treemap'
        },
        title: {
            text: 'Distibuted Treemap (different color for each cell)',
            align: 'center'
        },
        colors: [
            '#3B93A5',
            '#F7B844',
            '#ADD8C7',
            '#EC3C65',
            '#CDD7B6',
            '#C1F666',
            '#D43F97',
            '#1E5D8C',
            '#421243',
            '#7F94B0',
            '#EF6537',
            '#C0ADDB'
        ],
        plotOptions: {
            treemap: {
                distributed: true,
                enableShades: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#distributedTreemapCharts"), options);
    chart.render();

    /* Color Range */
    var options = {
        series: [
            {
                data: [
                    {
                        x: 'INTC',
                        y: 1.2
                    },
                    {
                        x: 'GS',
                        y: 0.4
                    },
                    {
                        x: 'CVX',
                        y: -1.4
                    },
                    {
                        x: 'GE',
                        y: 2.7
                    },
                    {
                        x: 'CAT',
                        y: -0.3
                    },
                    {
                        x: 'RTX',
                        y: 5.1
                    },
                    {
                        x: 'CSCO',
                        y: -2.3
                    },
                    {
                        x: 'JNJ',
                        y: 2.1
                    },
                    {
                        x: 'PG',
                        y: 0.3
                    },
                    {
                        x: 'TRV',
                        y: 0.12
                    },
                    {
                        x: 'MMM',
                        y: -2.31
                    },
                    {
                        x: 'NKE',
                        y: 3.98
                    },
                    {
                        x: 'IYT',
                        y: 1.67
                    }
                ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            height: 350,
            type: 'treemap'
        },
        title: {
            text: 'Treemap with Color scale'
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '12px',
            },
            formatter: function (text, op) {
                return [text, op.value]
            },
            offsetY: -4
        },
        plotOptions: {
            treemap: {
                enableShades: true,
                shadeIntensity: 0.5,
                reverseNegativeShade: true,
                colorScale: {
                    ranges: [
                        {
                            from: -6,
                            to: 0,
                            color: '#CD363A'
                        },
                        {
                            from: 0.001,
                            to: 6,
                            color: '#52B12C'
                        }
                    ]
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#colorRangeTreemapCharts"), options);
    chart.render();

})();