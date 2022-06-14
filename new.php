<?php
  require('config.php');
  session_start();
      
    if(isset($_POST['submit'])){

    $user = $_SESSION['user_name'];

    $query      = "SELECT * FROM users WHERE user_name = '$user'";
    $result     = mysqli_query($con, $query);
    $rows       = mysqli_num_rows($result);

    if ($rows != 0) {
        $id   = mysqli_fetch_assoc($result)['user_id'];                         
    }
    
    $qu = $_POST['question'];
    $de = $_POST['description'];
           
    if($qu=='' || $de==''){
      echo "<script>alert('$id')</script>";
    } else {
      
      date_default_timezone_set('Asia/Jakarta');

      $timestamp = time();
      $date_time = date("d-m-Y (D) H:i:s", $timestamp);
      
           
      $insert_query = "insert into forum (question, description, author_id, time) values ('$qu','$de','$id','$date_time')";
      $res=mysqli_query($con, $insert_query);  
          if ($res) {
            echo "<script>alert('Forum telah dibuat')</script>";
            header('Location: forum.php');
                     
          } else {
            $error =  'Regristasi user gagal, silakan coba lagi';
          }  
                 
      }
           
       }

    if(isset($_POST['back'])){
        header('Location: forum.php');
        exit;
      }
           
?>

  <!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
<body>
        <section class="container-fluid mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container" action="new.php" method="POST">
                    <h4 class="text-center font-weight-bold"> Forum baru </h4>

                    
                    <div class="form-group">
                        <label for="title">Judul Forum</label>
                        <input type="text" class="form-control" id="title" name="question" placeholder="Judul forum">
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <input type="text" class="form-control" id="desc" name="description" placeholder="Deskripsi">
                    </div>

              <button type="submit" name="submit" class="btn btn-primary btn-block">Buat Forum</button>
              <button type="back" name="back" class="btn btn-primary btn-block">Batal</button>
        </div>
        </div>
    </div>
            </section>
            </section>
        </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>