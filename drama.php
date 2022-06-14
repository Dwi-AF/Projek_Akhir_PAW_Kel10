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
							<li><a href="drama.php" class="active">Drama</a></li>		
							<li><a href="anime.php">Anime</a></li>		
							<li><a href="forum.php">Forum</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="logout.php">Log-out</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Drama</h1>

							<div class="image main">
								<img src="images/banner-image-2-1920x300.jpg" class="img-fluid" alt="" />
							</div>
							
							<div class="container-fluid">
								<div class="row">
									<div class="row">
									
<?php
		require('config.php');

		$insert_query = "select * from movies where page_code=2";
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
								</div>
							</div>
						</div>
					</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

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