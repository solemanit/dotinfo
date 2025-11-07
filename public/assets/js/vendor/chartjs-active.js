(function () {
    "use strict";

    // Line Chart
    new Chart(document.getElementById("lineChart"), {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [
                {
                    label: "Sales 2024",
                    data: [10, 20, 15, 25, 30],
                    borderColor: '1C4B42',
                    backgroundColor: "rgba(28, 75, 66, 0.1)",
                    fill: true,
                    tension: 0.4, // Curve the line
                },
                {
                    label: "Sales 2025",
                    data: [15, 18, 20, 22, 35],
                    borderColor: "#FEBB7B",
                    backgroundColor: "rgba(180, 231, 23, 0.1)",
                    fill: true,
                    tension: 0.4, // Curve the line
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    // Bar Chart
    new Chart(document.getElementById("barChart"), {
        type: "bar",
        data: {
            labels: ["A", "B", "C", "D"],
            datasets: [{
                label: "Votes",
                data: [12, 19, 3, 5],
                backgroundColor: ['#4F46E5'],
            }]
        }
    });

    // Pie Chart
    new Chart(document.getElementById("pieChart"), {
        type: "pie",
        data: {
            labels: ["Red", "Blue", "Yellow"],
            datasets: [{
                data: [300, 50, 100],
                backgroundColor: ['#4F46E5', '#FEBB7B', '#FF830F']
            }]
        }
    });

    // Donut Chart
    new Chart(document.getElementById("donutChart"), {
        type: "doughnut",
        data: {
            labels: ["Apple", "Samsung", "Huawei"],
            datasets: [{
                data: [100, 150, 250],
                backgroundColor: ['#4F46E5', '#FEBB7B', '#FF830F']
            }]
        }
    });

    // Polar Area Chart
    new Chart(document.getElementById("polarChart"), {
        type: "polarArea",
        data: {
            labels: ["North", "South", "East", "West"],
            datasets: [{
                data: [11, 16, 7, 3],
                backgroundColor: ['#4F46E5', '#FEBB7B', '#FF830F', '#E63232']
            }]
        }
    });

    // Radar Chart
    new Chart(document.getElementById("radarChart"), {
        type: "radar",
        data: {
            labels: ["Running", "Swimming", "Eating", "Cycling"],
            datasets: [{
                label: "Person A",
                data: [20, 10, 4, 2],
                borderColor: "#4F46E5",
                backgroundColor: "rgba(28, 75, 66, 0.1)",
            }]
        }
    });

})();
