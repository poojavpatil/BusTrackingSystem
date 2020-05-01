<?php
$host="localhost";
$user="root";
$db="bustrack";
$password="";
$query="select * from stops";
if (isset($_GET['b_id'])){
	$query .= " where b_id=".$_GET['b_id'];
	}
	
$link = mysqli_connect($host, $user,$password);
$link->set_charset("utf8");
mysqli_select_db($link,$db);
$result = mysqli_query($link,$query);
//var_dump($result);
$num_rows = 0;
if($result){
	echo "<table>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr data-type='busstop'><td data-type='stop_no'>".$row['stop_no']."</td><td data-type='name'>".$row['stop_name']."</td><td data-type='latitude'>".$row['latitude']."</td><td data-type='longitude'>".$row['longitude']."</td></tr>";

	}
	echo "</table>";
	}
?>
<script src="https://www.classmatrix.in/js/jquery-2.1.4.min.js"></script>
<input type="button" id="routebtn" value="route" onclick='calcRoute1()'/>
<div id="map-canvas"></div>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs_ARejy-mzdZI-2LRsgZS5JSRJprsk8A&callback=initMap">
   </script>
   
   <script src="geo.js" type="text/javascript"></script>
   
   <div id="map" style="height:400px"><i class="ion ion-loading-a"></i></div>