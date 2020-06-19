function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

// Load the Visualization API and the corechart package.
google.charts.load('current', {callback: function () { drawChart();$(window).resize(drawChart);},'packages':['corechart', 'line', 'bar']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart1);
  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Team');
    data.addColumn('number', 'Wins');
    data.addRows([
      ['CSK', 3],
      ['MI', 4],
      ['KKR', 2],
      ['SRH', 2],
      ['RR', 1]
      ]);

    // Set chart options
    var options = {'title':'Winner of IPL Seasons',
                  };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawChart1() {

  var data = google.visualization.arrayToDataTable([
        ['Team', 'Played', 'Won'],
        ['MI', 187, 109],
        ['SRH', 183, 100],
        ['RCB', 180, 92],
        ['KKR', 178, 87],
        ['DC', 177, 84],
        ['KXIP', 176, 82],
        ['CSK', 164, 77],
        ['RR', 147, 75]
      ]);

      var options = {
        chart: {
          title: 'Matches played by teams and won'
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };

      var chart = new google.charts.Bar(document.getElementById('barchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
 }
