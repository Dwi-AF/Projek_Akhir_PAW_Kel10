<?php
session_start();

if( !isset($_SESSION['user_name']) ){
	$_SESSION['msg'] = 'Silakan login terlebih dahulu';
	header('Location: login.php');
  }

?>

<!doctype html>
<html lang="en">
  <head>
    
  <html lang="en">
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
							<li><a href="forum.php">Forum</a></li>
							<li><a href="about.php">About</a></li>
                            <li><a href="logout.php">Log-out</a></li>
						</ul>
					</nav>

                <!-- Main -->
                <div id="main">

                        <div class="container">
                        <table class="table table-striped ">
        
     <?php   
        
        require('config.php'); 
    
        $user = $_SESSION['user_name'];

            $q = $_GET['id'];
            $insert_query = "select * from forum where forum_id=$q";
            $ref=mysqli_query($con, $insert_query);
            $arr=mysqli_fetch_array($ref);

            $dmy=$arr['author_id'];
            
            $query      = "SELECT * FROM users WHERE user_id = '$dmy'";
            $res=mysqli_query($con, $query);
            $ark=mysqli_fetch_array($res);


        
        $qq=$arr['question'];
        $dd=$arr['description'];
        $aa=$ark['user_name'];
        $tt=$arr['time'];

        if(isset($_POST['submit'])){
    
            $query      = "SELECT * FROM users WHERE user_name = '$user'";
            $result     = mysqli_query($con, $query);
            $rows       = mysqli_num_rows($result);
        
            if ($rows != 0) {
                $id   = mysqli_fetch_assoc($result)['user_id'];                         
            } 
              
              
          $comment = $_POST['comment'];
          $author = $id;
          $owner = $q;
              
              if($comment==''){
                     echo "<script>alert('Please Enter all the Fields')</script>";
                 }
              else{
                  
                  date_default_timezone_set('Asia/Kolkata');                                          //TIME
      
                  $timestamp = time();
                  $date_time = date("d-m-Y (D) H:i:s", $timestamp);
                  
                             $ins_query = "insert into comments (comment, commentor_id, id_sheet, time) values ('$comment','$author', '$owner', '$date_time')";
      
                          $result=mysqli_query($con, $ins_query);
                  
                  echo "<script>window.location.href='post.php?id=$q'</script>";
                } 
            }
        
        
            echo "<div class=\"list-group\">
                    <div class=\"d-flex w-100 justify-content-between\">
                        <h5 class=\"display-4\">$qq</h5>
                            <small>$tt by <b>$aa</b></small>
                    </div>
                    <h5><p class=\"mb-1\">$dd</p></h5>
                </div><br><br>";
            
            $insert_query1 = "select * from comments where id_sheet=$q";
            $res1=mysqli_query($con, $insert_query1);
                
            if(mysqli_num_rows($res1)>0){
                    
               while($row1=mysqli_fetch_assoc($res1)){

                $query0      = "SELECT * FROM users WHERE user_id = $row1[commentor_id]";
                $ret=mysqli_query($con, $query0);
                $ark=mysqli_fetch_array($ret);                
        
                echo "<div class=\"card bg-light border-primary mb-3\">
                <div class=\"card-body\">
                <div class=\"col-12 col-sm-6 col-md-8\">$row1[comment]</div>
                <div class=\"col-6 col-md-4\"><small>$row1[time] by <b>$ark[user_name]</b></small></div>
                </div>
                </div>
                </div>";

        
           }
           }
        else{
            echo "<div class=\"container\"><center>Belum ada komentar</center></div>";
        }
        
                
        
        ?>

            </div>
            </div>

            </div>
            

            </form>

            </div></div>
            <div class="inner"> 

            <!--Input Box-->
            <div class="inner">
            <br>

            <div class="card bg-light border-dark"><div class="card-body">

            <form action="#" method="post">

            <div class="input-group mb-3">
            <input type="text" name="comment" class="form-control" placeholder="Enter Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="submit">Post Comment</button>
            </div>
            </div>

            </div>
            

            </form>

            </div></div>
            <div class="inner"> 


    		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>               
                
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