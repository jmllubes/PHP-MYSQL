<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="p-5 bg-primary text-white text-center">
  <h1>Vols</h1>
  <p>Pràctica de vols amb mysql</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>

    </ul>
  </div>
</nav>
<div class="p-5 text-center">
<h1 > Login </h1>
</div>
<div class="login-form bg-light mt-4 p-4 text-center">
<form class="form-control" action="login.php" method="post">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="Login" value="Login">

</form>
</div>


<?php
session_start();
if(isset($_POST['Login'])){
    $mysql=new mysqli('localhost','root','','vols');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $mysql->set_charset('utf8');
    $user=$_POST['user'];
    $password1=$_POST['password'];
    $password1=md5($password1);
    $sql1="SELECT * FROM usuari WHERE nom='$user' AND contrasenya='$password1'";
    $result1=$mysql->query($sql1);
    if($result1->num_rows>0){
        $_SESSION['user']=$user;
        $_SESSION['rol']=$result1->fetch_assoc()['rol'];
        echo '<p>You have been logged in</p>';
        header('Location: index.php');

    }else{
        echo '<p>Error</p>';
    }
}
?>