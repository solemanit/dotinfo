// Chart 2
var options2 = {
    series: [{
        name: 'series',
        data: [45, 52, 38, 45, 49, 55, 60]
    }],
    chart: {
        height: 150,
        width: '100%',
        type: 'area',
        offsetY: 2,
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    colors: ['#4F46E5'],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.5,
            stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false,
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2025-09-19T00:00:00.000Z", "2025-09-19T01:30:00.000Z", "2025-09-19T02:30:00.000Z", "2025-09-19T03:30:00.000Z", "2025-09-19T04:30:00.000Z", "2025-09-19T05:30:00.000Z", "2025-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
            style: {
                fontSize: '12px',
            }
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0,
            style: {
                fontSize: '12px',
            }
        }
    },
    yaxis: {
        show: false,
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
    grid: {
        show: false,
        borderColor: '#eee',
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0

        }
    },
};
var chart2 = new ApexCharts(document.querySelector("#profileChart2"), options2);
chart2.render();

// Chart 3
var options3 = {
    series: [{
        name: 'series3',
        data: [72, 68, 70, 65, 62, 70, 75]
    }],
    chart: {
        height: 150,
        width: '100%',
        type: 'area',
        offsetY: 2,
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    colors: ['#FEBB7B'],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.5,
            stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false,
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2025-09-19T00:00:00.000Z", "2025-09-19T01:30:00.000Z", "2025-09-19T02:30:00.000Z", "2025-09-19T03:30:00.000Z", "2025-09-19T04:30:00.000Z", "2025-09-19T05:30:00.000Z", "2025-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
            style: {
                fontSize: '12px',
            }
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0,
            style: {
                fontSize: '12px',
            }
        }
    },
    yaxis: {
        show: false,
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
    grid: {
        show: false,
        borderColor: '#eee',
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0

        }
    },
};
var chart3 = new ApexCharts(document.querySelector("#profileChart3"), options3);
chart3.render();

// Chart 4
var options4 = {
    series: [{
        name: 'series4',
        data: [30, 40, 35, 50, 49, 45, 55]
    }],
    chart: {
        height: 150,
        width: '100%',
        type: 'area',
        offsetY: 2,
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    colors: ['#28A745'],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.5,
            stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false,
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2025-09-19T00:00:00.000Z", "2025-09-19T01:30:00.000Z", "2025-09-19T02:30:00.000Z", "2025-09-19T03:30:00.000Z", "2025-09-19T04:30:00.000Z", "2025-09-19T05:30:00.000Z", "2025-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
            style: {
                fontSize: '12px',
            }
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0,
            style: {
                fontSize: '12px',
            }
        }
    },
    yaxis: {
        show: false,
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
    grid: {
        show: false,
        borderColor: '#eee',
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0

        }
    },
};
var chart4 = new ApexCharts(document.querySelector("#profileChart4"), options4);
chart4.render();

// Chart 5
var options5 = {
    series: [{
        name: 'series5',
        data: [80, 75, 82, 78, 75, 80, 85]
    }],
    chart: {
        height: 150,
        width: '100%',
        type: 'area',
        offsetY: 2,
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    colors: ['#1493FF'],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.5,
            stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false,
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2025-09-19T00:00:00.000Z", "2025-09-19T01:30:00.000Z", "2025-09-19T02:30:00.000Z", "2025-09-19T03:30:00.000Z", "2025-09-19T04:30:00.000Z", "2025-09-19T05:30:00.000Z", "2025-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
            style: {
                fontSize: '12px',
            }
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0,
            style: {
                fontSize: '12px',
            }
        }
    },
    yaxis: {
        show: false,
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
    grid: {
        show: false,
        borderColor: '#eee',
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0

        }
    },
};
var chart5 = new ApexCharts(document.querySelector("#profileChart5"), options5);
chart5.render();