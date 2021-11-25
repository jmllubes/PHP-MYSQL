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
<?php
@session_start();
?>
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
<?php
  if(isset($_SESSION['user'])){
    echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>';
  }
?>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <div class="row">
    <?php
    if(isset($_SESSION['user']) and $_SESSION['rol'] == 'admin'){
      include 'views/afegir.php';
      include 'views/mostrar.php';
      }
      if(isset($_SESSION['user']) and $_SESSION['rol'] == 'usuari'){
        include 'views/mostraru.php';
      }
    ?>
</div>
</div>
<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>

</body>
</html>