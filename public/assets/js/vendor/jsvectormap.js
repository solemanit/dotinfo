(function () {
    "use strict";

    /* basic vector map */
    var map = new jsVectorMap({
        selector: "#world-map",
        map: "world_merc",
        backgroundColor: "var(--color-white)",

        // Continent labels (manually placed)
        labels: {
            markers: {
                render: function (marker) {
                    // Define continent names and their coordinates
                    const continents = [
                        { name: "NORTH AMERICA", coords: [45, -100] },
                        { name: "SOUTH AMERICA", coords: [-20, -60] },
                        { name: "EUROPE", coords: [55, 20] },
                        { name: "AFRICA", coords: [0, 20] },
                        { name: "ASIA", coords: [45, 100] },
                        { name: "AUSTRALIA", coords: [-25, 135] },
                        { name: "ANTARCTICA", coords: [-80, 0] }
                    ];

                    // Find matching continent
                    const continent = continents.find(c => c.name === marker.name);
                    return continent ? continent.name : "";
                }
            }
        },

        // Markers for continent labels
        markers: [
            { name: "NORTH AMERICA", coords: [45, -100] },
            { name: "SOUTH AMERICA", coords: [-20, -60] },
            { name: "EUROPE", coords: [55, 20] },
            { name: "AFRICA", coords: [0, 20] },
            { name: "ASIA", coords: [45, 100] },
            { name: "AUSTRALIA", coords: [-25, 135] },
            { name: "ANTARCTICA", coords: [-80, 0] }
        ],

        // Style for continent labels
        markerLabelStyle: {
            initial: {
                fontFamily: "Arial",
                fontSize: 12,
                fontWeight: "bold",
                fill: "#333"
            }
        },

        // Basic map styling
        regionStyle: {
            initial: {
                fill: "#e9ecef",
                stroke: "var(--color-white)",
                strokeWidth: 0.5
            }
        }
    });
    /* map with markers */
    var markers = [{
        name: 'Russia',
        coords: [61, 105],
        style: {
            fill: '#F5F5F5'
        }
    },
    {
        name: 'Greenland',
        coords: [72, -42],
        style: {
            fill: '#ff9251'
        }
    },
    {
        name: 'Canada',
        coords: [56, -106],
        style: {
            fill: '#56de80'
        }
    },
    {
        name: 'Palestine',
        coords: [31.5, 34.8],
        style: {
            fill: 'yellow'
        }
    },
    {
        name: 'Brazil',
        coords: [-14.2350, -51.9253],
        style: {
            fill: '#000'
        }
    },
    ];

    var map = new jsVectorMap({
        map: 'world_merc',
        selector: '#marker-map',
        markersSelectable: true,
        // markersSelectableOne: true,

        onMarkerSelected(index, isSelected, selectedMarkers) {
            console.log(index, isSelected, selectedMarkers);
        },

        // -------- Labels --------
        labels: {
            markers: {
                render: function (marker) {
                    return marker.name
                },
            },
        },

        // -------- Marker and label style --------
        markers: markers,
        markerStyle: {
            hover: {
                stroke: "#DDD",
                strokeWidth: 3,
                fill: '#FFF'
            },
            selected: {
                fill: '#ff525d'
            }
        },
        markerLabelStyle: {
            initial: {
                fontFamily: 'Poppins',
                fontSize: 13,
                fontWeight: 500,
                fill: '#35373e',
            },
        },
    })

    /* map with image markers */
    var markers = [
        {
            name: 'Palestine',
            coords: [31.5, 34.8],
        },
        {
            name: 'Russia',
            coords: [61, 105],
        },
        {
            name: 'greenland',
            coords: [72, -42],
        },
        {
            name: 'Canada',
            coords: [56, -106],
        },
    ];
    var map = new jsVectorMap({
        map: 'world_merc',
        selector: '#marker-image-map',

        labels: {
            markers: {
                render: function (marker) {
                    return marker.name
                }
            }
        },
        markers: markers,
        markerStyle: {
            initial: {
                image: true
            }
        },
        series: {
            markers: [{
                attribute: 'image',
                scale: {
                    marker1title: {
                        url: 'assets/images/logo/favicon.svg',
                        offset: [10, 0]
                    },
                    marker2title: {
                        url: 'assets/images/logo/favicon.svg',
                        offset: [10, 0]
                    }
                },
                values: {
                    0: 'marker1title',
                    1: 'marker2title',
                    2: 'marker2title',
                    3: 'marker1title',
                }
            }],
        }
    })

    /* maps with lines */
    var markers = [
        { name: 'Brazil', coords: [-14.2350, -51.9253], offsets: [0, 5], style: { fill: 'green' } },
        { name: 'USA', coords: [37.0902, -95.7129], offsets: [0, 5], style: { fill: 'blue' } },
        { name: 'Russia', coords: [61.5240, 105.3188], offsets: [0, 5], style: { fill: 'red' } },
        { name: 'Australia', coords: [-25.2744, 133.7751], offsets: [0, 5], style: { fill: 'yellow' } },
        { name: 'Palestine', coords: [31.9522, 35.2332], offsets: [0, 5], style: { fill: 'black' } },
    ];
    var lines = [
        { from: 'Brazil', to: 'USA', style: { stroke: '#abb0b7', strokeWidth: 1.5 } },
        { from: 'USA', to: 'Russia', style: { stroke: '#abb0b7', strokeWidth: 1.5 } },
        { from: 'Russia', to: 'Australia', style: { stroke: '#abb0b7', strokeWidth: 1.5 } },
        { from: 'Australia', to: 'Palestine', style: { stroke: '#abb0b7', strokeWidth: 1.5 } },
    ];

    new jsVectorMap({
        map: 'world_merc',
        selector: document.querySelector('#lines-map'),
        labels: {
            markers: {
                render: function (marker) {
                    return marker.name;
                },
                offsets: function (index) {
                    return markers[index].offsets || [0, 0];
                }
            },
        },
        markers: markers,
        lines: lines,
        lineStyle: {
            animation: true,
            strokeDasharray: "6 3 6",
        },
        markerStyle: {
            initial: {
                r: 6,
                fill: '#1266f1',
                stroke: '#fff',
                strokeWidth: 3,
            }
        },
        markerLabelStyle: {
            initial: {
                fontSize: 13,
                fontWeight: 500,
                fill: '#35373e',
            },
        },
    });
    /* us vector map */
    var map = new jsVectorMap({
        selector: "#us-map",
        map: "us_merc_en",
        regionStyle: {
            initial: {
                stroke: "#e9e9e9",
                strokeWidth: .15,
                fill: "var(--color-info)",
                fillOpacity: 1
            }
        },
    });

    /* russia vector map */
    var map = new jsVectorMap({
        selector: "#russia-map",
        map: "russia",
        regionStyle: {
            initial: {
                stroke: "#e9e9e9",
                strokeWidth: .15,
                fill: "var(--color-danger)",
                fillOpacity: 1
            }
        },
    });

    /* brasil vector map */
    var map = new jsVectorMap({
        selector: "#brasil-map",
        map: "brasil",
        regionStyle: {
            initial: {
                stroke: "#e9e9e9",
                strokeWidth: .15,
                fill: "var(--color-success)",
                fillOpacity: 1
            }
        },
    });


})();