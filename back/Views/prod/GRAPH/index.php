<?php
	include 'C:\xampp\htdocs\imen\front\Controller\ProduitC.php';
  $m=new ProduitsC();
  $produits = $m->AccountNumber();
?>
<html>
<head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
   google.charts.load('current', {'packages':['corechart']});
</script>

</head>
<body>
  <div id="total">
    <h1>Forums number : <?=(int)$produits["nb"]?> </h1>
  </div>
<div id="chart_div"></div>

<script>
// Callback that draws the pie chart
google.charts.setOnLoadCallback(draw_my_chart);
function draw_my_chart() {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'language');
  data.addColumn('number', 'Nos');
//for(i = 0; i < my_2d.length; i++)
//data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
data.addRows([['MALE',2],
      ['FEMALE',3]]);
// above row adds the JavaScript two dimensional array data into required chart format
var options = {title:'Statistical',
                 width:600,
                 height:500,
             };

  // Instantiate and draw the chart
  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>

</body>
</html>



