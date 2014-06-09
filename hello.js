		
		//Testing with Google Chart
		google.load("visualization", "1", {packages:["corechart"]});

var i = 2007;

/* initialize chart */
function drawChart(data, options) {
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    return(chart);
}

/* update the chart */
function updateChart(data, chart, options) {
    i = (i + 1);
    
    data.addRow([ ""+i /* change the number to a string */,
        Math.round((Math.random() * 1000)) /* random value */,
                 Math.round((Math.random() * 1000)) /* random value */ ]);
    chart.draw(data, options);
    
    setTimeout(function(){updateChart(data, chart, options)}, 5000);
}

$(function() {
   /* set variables */
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
    ]);
    
    var options = {
        title: 'Company Performance',
        "curveType": "function",
    };
    
    var chart = drawChart(data, options);
    
    updateChart(data, chart, options);
});
