<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id='chart_div'></div>
<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Sensor 1');
      data.addRows([
         <?php
           $username = "root"; 
           $password = ""; 
           $server = "127.0.0.1"; 
           $db = "desainiot2"; 
           $connect = mysqli_connect($server,$username,$password,$db); 
           $query = "SELECT sensor_id,sensor_value FROM sensorvalue ORDER BY sensor_id DESC LIMIT 10;";
           $tampil = mysqli_query($connect,$query);
		   while ($data = mysqli_fetch_array($tampil)) {
	          print "[".$data['sensor_id'].",".$data['sensor_value']."], ";
            }
         ?> 
      ]);
      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Celcius'
        },
	//curveType: 'function',
        colors: ['#a52714', '#097138']
      };
 
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

</script>