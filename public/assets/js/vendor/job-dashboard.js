document.addEventListener('DOMContentLoaded', function () {
    var options = {
        series: [{
            name: 'Job Openings',
            data: [18, 22, 25, 20, 28, 32, 30, 27, 35, 40, 38, 42]
        }, {
            name: 'Applications',
            data: [350, 420, 480, 520, 600, 750, 820, 780, 850, 920, 880, 950]
        }, {
            name: 'Hires',
            data: [15, 18, 20, 22, 25, 28, 30, 27, 32, 35, 38, 40]
        }],
        chart: {
            type: 'area',
            height: 359,
            stacked: false,
            toolbar: {
                show: false,
                tools: {
                    download: true,
                    selection: true,
                    zoom: true,
                    zoomin: true,
                    zoomout: true,
                    pan: true,
                    reset: true
                }
            },
            zoom: {
                enabled: true
            }
        },
        colors: ['#29DA82', '#1493FF', '#FF830F'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.6,
                opacityTo: 0.1,
                stops: [0, 90, 100]
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'center',
            markers: {
                radius: 2
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                style: {
                    colors: 'var(--color-body)',
                    fontSize: '12px'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: [
            {
                seriesName: 'Job Openings',

                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: true,
                    color: '#3b82f6'
                },
                labels: {
                    style: {
                        colors: '#3b82f6'
                    }
                },
            },
            {
                seriesName: 'Applications',
                show: false
            },
            {
                seriesName: 'Hires',
                opposite: true,
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: true,
                    color: '#6366f1'
                },
                labels: {
                    style: {
                        colors: '#6366f1'
                    }
                },
            }
        ],
        tooltip: {
            shared: true,
            intersect: false,
            show: false,
            y: {
                formatter: function (value, { series, seriesIndex, dataPointIndex, w }) {
                    if (seriesIndex === 1) {
                        return value.toLocaleString() + ' applications';
                    } else {
                        return value + (seriesIndex === 2 ? ' hires' : ' jobs');
                    }
                }
            },
            style: {
                fontSize: '14px'
            }
        },
        grid: {
            borderColor: '#f3f4f6',
            strokeDashArray: 4,
            padding: {
                top: 0,
                right: 20,
                bottom: 0,
                left: 20
            }
        },
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    height: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#recruitment-analytics-chart"), options);
    chart.render();
});

/* Visitors By Country Map */
var markers = [
    {
        name: "USA",
        coords: [37.0902, -95.7129],
    },
    {
        name: "Palestine",
        coords: [31.5, 34.4667],
    },
    {
        name: "Ireland",
        coords: [53.1424, -7.6921],
    },
    {
        name: "Brazil",
        coords: [-14.2350, -51.9253],
    },
];
var map = new jsVectorMap({
    map: "world_merc",
    selector: "#seles-countries",
    markersSelectable: true,
    zoomOnScroll: false,
    zoomButtons: false,

    onMarkerSelected(index, isSelected, selectedMarkers) {
        console.log(index, isSelected, selectedMarkers);
    },

    // -------- Labels --------
    labels: {
        markers: {
            render: function (marker) {
                return marker.name;
            },
        },
    },

    // -------- Marker and label style --------
    markers: markers,
    markerStyle: {
        hover: {
            stroke: "#DDD",
            strokeWidth: 3,
            fill: "#FFF",
        },
        selected: {
            fill: "#ff525d",
        },
    },
    regionStyle: {
        initial: {
            stroke: "var(--primary01)",
            strokeWidth: 1.5,
        }
    },
    markerLabelStyle: {
        initial: {
            fontFamily: 'Nunito Sans, sans-serif',
            fontSize: 13,
            fontWeight: 500,
            fill: "#35373e",
        },
    },
});
/* Visitors By Country Map */