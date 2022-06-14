<?php
session_start();

if( !isset($_SESSION['user_name']) ){
	$_SESSION['msg'] = 'Silakan login terlebih dahulu';
	header('Location: login.php');
  }

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>PAW HOME | Movies Website</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="fa fa-film"span> <span class="title">PAW HOME</span>
								</a>


							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="movie.php">Movie</a></li>
							<li><a href="drama.php">Drama</a></li>
							<li><a href="anime.php">Anime</a></li>
							<li><a href="forum.php" class="active">Forum</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="logout.php">Log-out</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="images/netflix-image-1-1920x700.jpg" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="images/slider-image-3-1920x700.jpg" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="images/disney-image-2-1920x700.jpg" alt="Third slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>

						<br>
						<br>

						<div class="inner">
							
							<!-- About Us -->
							<header id="inner">
								<p>Why enjoy movie alone when you can discuss it together</p>	
					<figure class="text-end">
					<blockquote class="blockquote">
					
					<div class="d-flex bd-highlight mb-3">
						<div class="p-2 bd-highlight"></div>
						<div class="p-2 bd-highlight">
							<a class="btn btn-primary btn-info" href="new.php" role="button">+ New Topic</a>
						</div>
						<div class="ml-auto p-2 bd-highlight"></div>
					</div>
				
					<div class="container">

				<table class="table table-striped ">
					<thead>
						<tr>
							<th scope="col">Forum</th>
							<th scope="col">Posts</th>
							<th scope="col">Date/Time</th>
						</tr>
					</thead>
					<tbody>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php        
            
		require('config.php');

		$insert_query = "select * from forum order by forum_id desc";
		$res=mysqli_query($con, $insert_query);
				
		if(mysqli_num_rows($res)>0){
					
			while($row=mysqli_fetch_assoc($res)){
						
				$z="select COUNT(comment) from comments where id_sheet=$row[forum_id]";
				$zz=mysqli_query($con, $z);
				$zzz=mysqli_fetch_array($zz);
				
		 echo "<tr>
			<td><a href=\"post.php?id=$row[forum_id]\" class=\"text-dark\">$row[question]</a></td>
			<td>$zzz[0]</td>
			<td>$row[time]</td>
		 </tr>";
			 
				}
			}
		else
		{
		echo "<tr>
			<td>Tidak ada forum terbuka</td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
					
			}
			  
			  
?>



</tbody>
      </table>
    </div>

      <br><br><br>
	  <footer id="footer">
		<div class="inner">
			<section>
			<ul class="icons">
				<center>
					<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
				<center>
			</ul>

		</footer>
   
  </body>
</html>