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
<h1>Register</h1>
</div>
<div class="login-form bg-light mt-4 p-4 text-center">
    <form class="form-control" action="index.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="mail" name="mail" placeholder="Mail">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="repeatpassword" placeholder="Repeat Password">
        <input type="submit" name="submit" value="Register">
    </form>
</div>
    <?php
    $mysql=new mysqli('localhost','root','','vols');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $mysql->set_charset('utf8');
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $repeatpassword=$_POST['repeatpassword'];
        $mail=$_POST['mail'];
        if($password==$repeatpassword){
            $password=md5($password);
            $sql="INSERT INTO usuari (nom,contrasenya,correu) VALUES ('$username','$password','$mail')";
            $result=$mysql->query($sql);
            if($result){
                echo '<p>You have been registered</p>';
            }else{
                echo '<p>Error</p>';
            }
        }else{
            echo '<p>Passwords do not match</p>';
        }
    }


?>