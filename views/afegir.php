<h2 class="text-center pt-5 pb-3">Afegir Vols</h2>
<form class="container mt-5 mb-5" action="views/afegir.php" method="post" enctype="multipart/form-data">
       <label for="">Origen</label>
    <input class="form-control"  type="text" name="origen" id="" required><br>
    <label for="">Destí</label>
    <input class="form-control"  type="text" name="desti" id="" required><br>
    <label for="">Preu</label>
    <input class="form-control"  type="number" name="preu" id="" required><br>
    <label for="">Nombre places</label>
    <input class="form-control"  type="number" name="nombreplaces" id="" required><br>
    <Label>Foto destí</Label>
    <input class="form-control"  type="file" name="foto" id="" required><br>
    <input class="btn btn-primary"  type="submit" name="registrar" value="Registrar">

<!-- sdasdasdasda -->
</form>
<?php
@session_start();
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
    $sql="INSERT INTO vol (origen, desti, preu, foto,nombre_places) VALUES ('$origen', '$desti', '$preu', '$nomcomplet', '$nombreplaces')";
    $result=$mysql->query($sql);
    
    header("Location:../index.php");
}
?>