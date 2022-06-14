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
							<li><a href="index.php" class="active">Home</a></li>
							<li><a href="movie.php">Movie</a></li>
							<li><a href="drama.php">Drama</a></li>
							<li><a href="anime.php">Anime</a></li>
							<li><a href="forum.php">Forum</a></li>
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
								<h1>Reasons why watching movies is good for you</h1>
								<p>Films help us learn | Films Help us process difficult life lesson | Films Inspire us to be a better person | Films Help us appreciate art</p>	
					<figure class="text-end">
					<blockquote class="blockquote">
					<p>"Of course stress relief is a key function of films, and it's a major function for large audiences of blockbuster films"</p> </blockquote>
					<figcaption class="blockquote-footer"> Dr Danks </figcaption> </figure>
					
							</header>

							<br>

							<h2 class="h2">THIS WEEK RECOMMENDATION</h2>
							
							<div class="row">
<?php
		require('config.php');

		$insert_query = "select * from movies where featured_code=1 ORDER BY page_code ASC";
		$ref=mysqli_query($con, $insert_query);
				
		if(mysqli_num_rows($ref)>0){
					
			while($row=mysqli_fetch_assoc($ref)){
				
				$filepath= $row['movie_img']; 

				echo "<tr>
				<div class=\"col-sm-4 text-center\">
				<img src='".$filepath."'class=\"img-fluid\" alt=\"\">
				<td><a class=\"m-n\" href=\"$row[movie_trailer]?\" class=\"text-dark\">$row[movie_name]</a></td>
				<p>$row[movie_origin] &nbsp;|&nbsp; $row[movie_genre] &nbsp;|&nbsp; $row[movie_year] &nbsp;|&nbsp; $row[movie_duration]</p>
				<p class=\"fw-bold\">$row[movie_rev]</p> </span>
				</div>
			 	</tr>";

				}
			}
		else
		{
		echo "Tidak ada film dalam database";
		header('Location: login.php');			
			}
?>
							</div>

							<p class="text-center"><a href="forum.php">Ayo Berdiskusi &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">							
			<figure class="text-center">
			<blockquote class="blockquote">
			<p>“Movies like a machine that generates empathy. It lets you understand a little bit more about different hopes, 
			aspirations, dreams, and fears.”</p>
			</blockquote>
			<figcaption class="blockquote-footer">
			Roger Ebert <cite title="Source Title">The legendary film critic</cite>
			</figcaption>
			</figure>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>