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

<h2 class="text-center pt-5 pb-3">Modificar Vols</h2>
<?php 
@session_start();
if(isset($_REQUEST["actualitza"])){
    $j = $_REQUEST["actualitza"];
    $_SESSION['codi']=$j;
    $mysql=new mysqli('localhost','root','','vols');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="SELECT * FROM vol WHERE codi='$j'";
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();

?>
<form class="container mt-5 mb-5" action="actualitzar.php" method="post" enctype="multipart/form-data">
    <label for="">Origen</label>
    <input class="form-control"  type="text" name="origen" value="<?php echo $row['origen'];?>" required><br>
    <label for="">Destí</label>
    <input class="form-control"  type="text" name="desti" value="<?php echo $row['desti'];?>" required><br>
    <label for="">Preu</label>
    <input class="form-control"  type="number" name="preu"value="<?php echo $row['preu'];?>" required><br>
    <label for="">Nombre places</label>
    <input class="form-control"  type="number" name="nombreplaces" value="<?php echo $row['nombre_places'];?>" required><br>
    <Label>Foto destí</Label>
    <input class="form-control"  type="file" name="foto" value="<?php echo $row['foto'];}?>" required><br>
    <input class="btn btn-primary"  type="submit" name="registrar" value="Registrar">

</form>
<?php

if(isset($_REQUEST["registrar"])){
    $origen=$_REQUEST["origen"];
    $desti=$_REQUEST["desti"];
    $preu=$_REQUEST["preu"];
    $nombreplaces=$_REQUEST["nombreplaces"];
    $today = date("YmdHis");
    $extensio = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],"."));
    $nom = substr($_FILES['foto']['name'],0, strpos($_FILES['foto']['name'],"."));
    $nomcomplet =  $nom . $today . $extensio;
    copy($_FILES['foto']['tmp_name'], "../img/" . $nomcomplet);
    $mysql=new mysqli('localhost','root','','vols');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="UPDATE vol SET origen='$origen', desti='$desti', preu='$preu', 
    foto='$nomcomplet',nombre_places='$nombreplaces' WHERE codi=".$_SESSION['codi'];
    $result=$mysql->query($sql);
    
    header("Location:../index.php");
}
?>

<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>

</body>
</html>