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
			<div class="image-style">

			</div>
			<!-- vertical tabs -->
			<div class="vertical-tab">
				<div id="section1" class="section-amum-mkls">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="icon-left-amum-mkpvt"><span class="fa fa-user-circle" aria-hidden="true"></span>Search By <br>Source Destination</label>
					<article>
						<form action="<?php if(isset($_GET['source_stop'])) echo 'findBus.php'; else echo '.';?>" method="get">
							<h3 class="legend">Search By Source Destination</h3>
							
							<h3>Source Stop</h3>
							<div class="input">
								
								<span class="fa fa-map-marker" aria-hidden="true"></span>
								<select name="source_stop">
									<?php
										if(isset($_GET['source_stop'])){
											$query = "select * from bus_stop where id=".$_GET['source_stop'];
											$resultSet = dbo::getResultSetForQuery($query);
											if($resultSet){
												while($row = mysqli_fetch_array($resultSet)){
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
											}
										}else{
											$query = "select * from bus_stop order by name";
											$resultSet = dbo::getResultSetForQuery($query);
											if($resultSet){
												while($row = mysqli_fetch_array($resultSet)){
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
											}
										}
									?>
								</select>
							</div>
							<?php
								if(isset($_GET['source_stop'])){
							?>
								<h3>Destination Stop</h3>
								<div class="input">
									<span class="fa fa-map-marker" aria-hidden="true"></span>
									<select name="destination_stop">
										<?php
											if(isset($_GET['source_stop'])){
												$query = "	select * 
															from bus_stop 
															where 
																id in 
																	(SELECT 
																			DISTINCT(r2.bus_stop_id) 
																	FROM 
																		route_stops r1, 
																		route_stops r2 
																	WHERE 
																		r1.bus_stop_id = ".$_GET['source_stop']." AND 
																		r1.route_id = r2.route_id AND 
																		r2.stop_number >= r1.stop_number);";
												$resultSet = dbo::getResultSetForQuery($query);
												if($resultSet){
													while($row = mysqli_fetch_array($resultSet)){
														if($row['id'] != $_GET['source_stop'])
														echo "<option value='".$row['id']."'>".$row['name']."</option>";
													}
												}
											}
										?>
									</select>
								</div>
							<?php } ?>
							<button type="submit" class="btn submit">Search Bus</button>
							
							<a class="submit" href='index.php' style="padding-right: 0px;padding-left: 0px;text-align: center;background-color: #2196F3;">Reset</a>
						</form>
					</article>
				</div>
				<div id="section2" class="section-amum-mkls">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="icon-left-amum-mkpvt"><span class="fa fa-user-circle" aria-hidden="true"></span>Search By Bus Number</label>
					<article>
						<form action="findBus.php">
							<h3 class="legend">Search By Bus Number</h3>
							
							<h3>Bus Number</h3>
							<div class="input">
								
								<span class="fa fa-map-marker" aria-hidden="true"></span>
								<select name="route_name">
								<!--<input type="text" placeholder="Username" name="name" required />-->
								<?php
										
											$query = "select * from route order by id";
											$resultSet = dbo::getResultSetForQuery($query);
											if($resultSet){
												while($row = mysqli_fetch_array($resultSet)){
													echo "<option value='".$row['name']."'>".$row['name']."</option>";
												}
											}
									?>
								</select>
							</div>
							
							<!--div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Confirm Password" name="password" required />
							</div>
							<button type="submit" class="btn submit">Register</button>-->
							<button type="submit" class="btn submit">Search Bus</button>
								
						</form>
					</article>
				</div>
				<!--div id="section3" class="section-amum-mkls">
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