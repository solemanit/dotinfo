/* revenue report */
var options = {
    chart: {
        height: 368,
        type: 'line',
        stacked: false,
        toolbar: { show: false }
    },
    series: [
        {
            name: 'Orders',
            type: 'area',
            data: [35, 65, 50, 70, 55, 60, 45, 43, 75, 55, 63, 68],
            color: "#4F46E5", /* primary color code only*/
        },
        {
            name: 'Earnings',
            type: 'column',
            data: [90, 100, 70, 110, 80, 85, 60, 30, 95, 40, 85, 35],
            color: "var(--color-success)"
        },
        {
            name: 'Refunds',
            type: 'line',
            data: [10, 15, 9, 14, 18, 10, 15, 9, 10, 15, 14, 18],
            color: "var(--color-warning)",
            stroke: {
                dashArray: 5,
                width: 2
            }
        }
    ],
    stroke: {
        width: [2, 0, 2],
        curve: 'smooth'
    },
    plotOptions: {
        bar: {
            columnWidth: '45%'
        }
    },
    fill: {
        opacity: [0.2, 1, 1]
    },
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    markers: {
        size: 5
    },
    xaxis: {
        type: 'category',
        labels: {
            style: {
                colors: 'var(--color-body)',
                fontSize: '12px',
                fontFamily: 'var(--ff-body)',
                fontWeight: 400,
                cssClass: 'apexcharts-xaxis-label',
            },
        },
    },
    yaxis: {
        labels: {
            style: {
                colors: 'var(--color-body)',
                fontSize: '12px',
                fontFamily: 'var(--ff-body)',
                fontWeight: 400,
                cssClass: 'apexcharts-yaxis-label',
            },
        },
    },
    legend: {
        position: "bottom"
    },
    tooltip: {
        shared: true,
        intersect: false,
        y: {
            formatter: function (val) {
                return "$" + val;
            }
        }
    }
};
var chart = new ApexCharts(document.querySelector("#revenueReport"), options);
chart.render();
/* revenue report */


/* Order Summary */
var options = {
    series: [{
        name: 'Total Orders',
        type: 'column',
        data: [45, 52, 38, 55, 42, 58, 60, 48, 62, 55, 68, 72]
    }, {
        name: 'Delivered',
        type: 'column',
        data: [38, 45, 32, 48, 36, 50, 52, 42, 55, 48, 60, 65]
    }, {
        name: 'Cancelled',
        type: 'line',
        data: [7, 7, 6, 7, 6, 8, 8, 6, 7, 7, 8, 7]
    }],
    chart: {
        toolbar: {
            show: false
        },
        height: 328,
        type: 'line',
        stacked: false,
        fontFamily: 'Poppins, Arial, sans-serif',
    },
    grid: {
        borderColor: '#f1f1f1',
        strokeDashArray: 3
    },
    dataLabels: {
        enabled: false
    },
    title: {
        text: undefined,
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        labels: {
            style: {
                colors: 'var(--color-body)',
                fontSize: '12px',
                fontFamily: 'var(--ff-body)',
                fontWeight: 400,
                cssClass: 'apexcharts-xaxis-label',
            },
        },
    },
    yaxis: [
        {
            show: true,
            axisTicks: {
                show: true,
            },
            axisBorder: {
                show: false,
                color: '#4eb6d0'
            },
            labels: {
                style: {
                    colors: 'var(--color-body)',
                    fontSize: '12px',
                    fontFamily: 'var(--ff-body)',
                    fontWeight: 400,
                    cssClass: 'apexcharts-yaxis-label',
                }
            },
            title: {
                text: undefined,
            },
            tooltip: {
                enabled: true
            }
        },
        {
            seriesName: 'Projects',
            opposite: true,
            axisTicks: {
                show: true,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                style: {
                    colors: 'var(--color-body)',
                    fontSize: '12px',
                    fontFamily: 'var(--ff-body)',
                    fontWeight: 400,
                    cssClass: 'apexcharts-yaxis-label',
                }
            },
            title: {
                text: undefined,
            },
        },
        {
            seriesName: 'Revenue',
            opposite: true,
            axisTicks: {
                show: true,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                show: false,
            },
            title: {
                text: undefined,
            }
        },
    ],

    tooltip: {
        enabled: true,
    },
    legend: {
        show: true,
        position: 'bottom',
        offsetX: 40,
        fontSize: '13px',
        fontWeight: 'normal',
        labels: {
            colors: '#acb1b1',
        },
        markers: {
            width: 10,
            height: 10,
        },
    },
    stroke: {
        width: [2, 2, 1.5],
        curve: 'smooth',
        lineCap: 'round',
        dashArray: [0, 0, 0],
    },
    plotOptions: {
        bar: {
            columnWidth: "40%",
            borderRadius: 2
        }
    },
    colors: ["var(--color-primary)", "var(--color-success)", "var(--color-warning)"]
};

var chart1 = new ApexCharts(document.querySelector("#order-summary"), options);
chart1.render();
/* Order Summary */