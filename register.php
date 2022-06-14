<?php
require('config.php');
session_start();
 
$error = '';
$validate = '';

if( isset($_POST['submit']) ){
        $username = stripslashes($_POST['user_name']);
        $username = mysqli_real_escape_string($con, $username);
        $name     = stripslashes($_POST['user_full_name']);
        $name     = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_POST['user_email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['user_password']);
        $password = mysqli_real_escape_string($con, $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);
        if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
            if($password == $repass){
                if( cek_nama($name,$con) == 0 ){
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO users (user_name,user_full_name,user_email,user_password,user_role) VALUES ('$username','$nama','$email','$pass','1')";
                    $result   = mysqli_query($con, $query);
                    if ($result) {
                        $_SESSION['user_name'] = $username;
                        
                        header('Location: index.php');
                     
                    } else {
                        $error =  'Regristasi user gagal, silakan coba lagi';
                    }
                }else{
                        $error =  'Username sudah terdaftar, silakan coba lagi';
                }
            }else{
                $validate = 'Password salah, silakan cek ulang';
            }
             
        }else {
            $error =  'Data masih kosong, silakan cek ulang';
        }
    } 
    function cek_nama($username,$con){
        $nama = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM users WHERE user_name = '$nama'";
        if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
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
                <form class="form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="user_full_name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Alamat Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="user_email" aria-describeby="emailHelp" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="user_name" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="user_password" placeholder="Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Re-Password</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </section>
            </section>
        </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>