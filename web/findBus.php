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
						<table width='100%' class='table'>
							<tr>
								<td>Bus Id</td>
								<td>Bus Number</td>
								<td>Detail And Path</td>
							</tr>	
							<?php
							if(isset($_GET['source_stop']) && isset($_GET['destination_stop'])){
								$query = "select *
										From bus
										where route_id in 
											(	select 
													r1.route_id
												FROM
													route_stops r1
												WHERE
													r1.bus_stop_id = 3 AND
													r1.route_id in (select route_id from route_stops where bus_stop_id = 8)
											 )";
								$resultSet = dbo::getResultSetForQuery($query);
								if($resultSet){
									while($row = mysqli_fetch_array($resultSet)){
										echo "<tr>
												<td>".$row['id']."</td>
												<td>".$row['vehicle_number']."</td>
												<td><a href='busDetail.php?bus_id=".$row['id']."'>More Detail...</td>
											</tr>";
									}
								}
							}
							elseif(isset($_GET['route_name'])){
								$query = "SELECT b.* 
										FROM route r,bus b
										WHERE r.name='".$_GET['route_name']."' and
										b.route_id=r.id";
								//echo $query;
								$resultSet = dbo::getResultSetForQuery($query);
								if($resultSet){
									while($row = mysqli_fetch_array($resultSet)){
										echo "<tr>
												<td>".$row['id']."</td>
												<td>".$row['vehicle_number']."</td>
												<td><a href='busDetail.php?bus_id=".$row['id']."'>More Detail...</td>
											</tr>";
									}
								}
							}
						?>
						</table>
					</form>
					</article>
				</div>
				<!--div id="section2" class="section-amum-mkls">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="icon-left-amum-mkpvt"><span class="fa fa-pencil-square" aria-hidden="true"></span>Register</label>
					<article>
						<form action="#" method="post">
							<h3 class="legend">Register Here</h3>
							<div class="input">
								<span class="fa fa-user-o" aria-hidden="true"></span>
								<input type="text" placeholder="Username" name="name" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Confirm Password" name="password" required />
							</div>
							<button type="submit" class="btn submit">Register</button>
						</form>
					</article>
				</div>
				<div id="section3" class="section-amum-mkls">
					<input type="radio" name="sections" id="option3">
					<label for="option3" class="icon-left-amum-mkpvt"><span class="fa fa-lock" aria-hidden="true"></span>Forgot Password?</label>
					<article>
						<form action="#" method="post">
							<h3 class="legend last">Reset Password</h3>
							<p class="para-style">Enter your email address below and we'll send you an email with instructions.</p>
							<p class="para-style-2"><strong>Need Help?</strong> Learn more about how to <a href="#">retrieve an existing
									account.</a></p>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" required />
							</div>
							<button type="submit" class="btn submit last-btn">Reset</button>
						</form>
					</article>
				</div-->
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
	</div>

</body>

</html>