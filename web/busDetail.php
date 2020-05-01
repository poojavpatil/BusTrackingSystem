<!DOCTYPE HTML>
<?php include 'dbo.php' ?>
<html lang="en">

<head>
	<title>Bus Tracking System</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Triple Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext"
	 rel="stylesheet">
	 
	 <script src="js/geo.js" type="text/javascript"></script>
	 <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs_ARejy-mzdZI-2LRsgZS5JSRJprsk8A&callback=initMap">
   </script>
	<!-- //web-fonts -->
</head>

<body>
	<div class="main-bg">
		<!-- title -->
		<h1>Bus Tracking System</h1>
		<!-- //title -->
		<div class="sub-main-amum-mk">
			
			<div>
				<div id="section1" class="section-amum-mkls">
					<article>
					<form>
						<table width='100%'>
							<tr>
								<td width="40%" style="vertical-align: top;">
									<table width='100%' class='table'>
										<tr>
											<td>Bus Stop Name</td>
											<td>Lat</td>
											<td>Lng</td>
											<td>starttime</td>
											<td>time_from_source</td>
										</tr>	
										<?php
										if(isset($_GET['bus_id'])){
											$query = "SELECT bs.*,bt.time,rs.time_from_source											
														FROM 
															bus b, 
															route_stops rs, 
															bus_stop bs,
															bus_timing bt
														WHERE 
															b.id = ".$_GET['bus_id']." And 
															b.route_id = rs.route_id And 
															rs.bus_stop_id = bs.id And
															bt.bus_id=b.id";
											$resultSet = dbo::getResultSetForQuery($query);
											if($resultSet){
												while($row = mysqli_fetch_array($resultSet)){
													echo "<tr data-type='busstop'>
															<td data-type='stop_name'>".$row['name']."</td>
															<td data-type='latitude'>".$row['lat']."</td>
															<td data-type='longitude'>".$row['lng']."</td>
															<td>".$row['time']."</td>
															<td>".$row['time_from_source']."</td>
														</tr>";
												}
											}
										}
									?>
									</table>
								</td>
								<td width='60%'>
									<div id="map" style="height:400px"><i class="ion ion-loading-a"></i></div>
								</td>
							</tr>
						</table>
						<button type="submit" class="btn submit" formaction="index.php">Back</button>
					</form>
					</article>
				</div>
			</div>
			<!-- //vertical tabs -->
			<div class="clear"></div>
		</div>
		<!-- copyright -->
		<div class="copyright">
			<h2>&copy; 2019 Triple Forms. All rights reserved.
			</h2>
			
		</div>
		<!-- //copyright -->
		
		<script src="https://www.classmatrix.in/js/jquery-2.1.4.min.js"></script>
		<script src="js/geo.js" type="text/javascript"></script>
	 <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs_ARejy-mzdZI-2LRsgZS5JSRJprsk8A&callback=initMap">
   </script>
	</div>

</body>

</html>