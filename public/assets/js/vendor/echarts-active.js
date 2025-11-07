(function () {
    "use strict";

    // 1. Line Chart
    var lineChart = echarts.init(document.getElementById('lineChart'));
    lineChart.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [{ data: [150, 230, 224, 218, 135], type: 'line' }]
    });

    // 2. Stacked Line Chart
    var stackedLineChart = echarts.init(document.getElementById('stackedLineChart'));
    stackedLineChart.setOption({
        color: ['#4F46E5', '#FEBB7B', '#FF830F'],
        legend: { data: ['Email', 'Affiliate', 'Video Ads'] },
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [
            { name: 'Email', type: 'line', stack: 'total', data: [120, 132, 101, 134, 90] },
            { name: 'Affiliate', type: 'line', stack: 'total', data: [220, 182, 191, 234, 290] },
            { name: 'Video Ads', type: 'line', stack: 'total', data: [150, 232, 201, 154, 190] }
        ]
    });

    // 3. Area Chart
    var areaChart = echarts.init(document.getElementById('areaChart'));
    areaChart.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [{ data: [120, 132, 101, 134, 90], type: 'line', areaStyle: {} }]
    });

    // 4. Stacked Area Chart
    var stackedAreaChart = echarts.init(document.getElementById('stackedAreaChart'));
    stackedAreaChart.setOption({
        color: ['#4F46E5', '#FEBB7B', '#FF830F'],
        legend: { data: ['Email', 'Affiliate', 'Video Ads'] },
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [
            { name: 'Email', type: 'line', stack: 'total', areaStyle: {}, data: [120, 132, 101, 134, 90] },
            { name: 'Affiliate', type: 'line', stack: 'total', areaStyle: {}, data: [220, 182, 191, 234, 290] },
            { name: 'Video Ads', type: 'line', stack: 'total', areaStyle: {}, data: [150, 232, 201, 154, 190] }
        ]
    });

    // 5. Step Line Chart
    var stepLineChart = echarts.init(document.getElementById('stepLineChart'));
    stepLineChart.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [{ data: [150, 230, 224, 218, 135], type: 'line', step: 'middle' }]
    });

    // 6. Line Y Category
    var lineYCategory = echarts.init(document.getElementById('lineYCategory'));
    lineYCategory.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'value' },
        yAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        series: [{ data: [150, 230, 224, 218, 135], type: 'line' }]
    });

    // 7. Basic Bar Chart
    var basicBarChart = echarts.init(document.getElementById('basicBarChart'));
    basicBarChart.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [{ data: [120, 200, 150, 80, 70], type: 'bar' }]
    });

    // 8. Bar Label Chart
    var barLabelChart = echarts.init(document.getElementById('barLabelChart'));
    barLabelChart.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: { type: 'value' },
        series: [{
            data: [120, 200, 150, 80, 70],
            type: 'bar',
            label: { show: true, position: 'top' }
        }]
    });

    // 9. Horizontal Bar Chart
    var horizontalBarChart = echarts.init(document.getElementById('horizontalBarChart'));
    horizontalBarChart.setOption({
        color: ['#4F46E5'],
        xAxis: { type: 'value' },
        yAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        series: [{ data: [120, 200, 150, 80, 70], type: 'bar' }]
    });

    // 10. Stacked Horizontal Bar Chart
    var stackedHorizontalBarChart = echarts.init(document.getElementById('stackedHorizontalBarChart'));
    stackedHorizontalBarChart.setOption({
        color: ['#4F46E5', '#FEBB7B', '#FF830F'],
        legend: { data: ['Email', 'Affiliate', 'Video Ads'] },
        xAxis: { type: 'value' },
        yAxis: { type: 'category', data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        series: [
            { name: 'Email', type: 'bar', stack: 'total', data: [120, 132, 101, 134, 90] },
            { name: 'Affiliate', type: 'bar', stack: 'total', data: [220, 182, 191, 234, 290] },
            { name: 'Video Ads', type: 'bar', stack: 'total', data: [150, 232, 201, 154, 190] }
        ]
    });

    // 11. Pie Chart
    var pieChart = echarts.init(document.getElementById('pieChart'));
    pieChart.setOption({
        color: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF', '#E63232'],
        series: [{
            type: 'pie',
            radius: '50%',
            data: [
                { value: 335, name: 'Direct' },
                { value: 310, name: 'Email' },
                { value: 234, name: 'Affiliate' },
                { value: 135, name: 'Video Ads' },
                { value: 1548, name: 'Search Engine' }
            ]
        }]
    });

    // 12. Doughnut Chart
    var doughnutChart = echarts.init(document.getElementById('doughnutChart'));
    doughnutChart.setOption({
        color: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF', '#E63232'],
        series: [{
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: { show: false, position: 'center' },
            emphasis: { label: { show: true, fontSize: '30', fontWeight: 'bold' } },
            labelLine: { show: false },
            data: [
                { value: 335, name: 'Direct' },
                { value: 310, name: 'Email' },
                { value: 234, name: 'Affiliate' },
                { value: 135, name: 'Video Ads' },
                { value: 1548, name: 'Search Engine' }
            ]
        }]
    });

    // 13. Basic Scatter Chart
    var scatterChart = echarts.init(document.getElementById('scatterChart'));
    scatterChart.setOption({
        color: ['#4F46E5'],
        xAxis: {},
        yAxis: {},
        series: [{
            symbolSize: 20,
            data: [
                [10, 20], [20, 30], [30, 40], [40, 50], [50, 60]
            ],
            type: 'scatter'
        }]
    });

    // 14. Candlestick Chart
    var candlestickChart = echarts.init(document.getElementById('candlestickChart'));
    candlestickChart.setOption({
        color: ['#4F46E5', '#FEBB7B'],
        xAxis: { data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
        yAxis: {},
        series: [{
            type: 'candlestick',
            data: [
                [20, 30, 10, 35],
                [40, 35, 30, 55],
                [33, 38, 33, 40],
                [40, 40, 32, 42],
                [30, 30, 20, 35]
            ]
        }]
    });

    // 15. Graph Chart (Force-Directed)
    var graphChart = echarts.init(document.getElementById('graphChart'));
    graphChart.setOption({
        color: ['#4F46E5'],
        series: [{
            type: 'graph',
            layout: 'force',
            roam: true,
            data: [
                { name: 'Node1', value: 100 },
                { name: 'Node2', value: 200 },
                { name: 'Node3', value: 300 }
            ],
            links: [
                { source: 'Node1', target: 'Node2' },
                { source: 'Node2', target: 'Node3' }
            ]
        }]
    });

    // 16. Treemap Chart
    var treemapChart = echarts.init(document.getElementById('treemapChart'));
    treemapChart.setOption({
        color: ['#4F46E5', '#FEBB7B', '#FF830F', '#1493FF'],
        series: [{
            type: 'treemap',
            data: [
                { name: 'A', value: 6 },
                { name: 'B', value: 4 },
                { name: 'C', value: 3 },
                { name: 'D', value: 2 }
            ]
        }]
    });

})();