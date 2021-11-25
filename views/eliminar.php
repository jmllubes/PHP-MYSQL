<!-- <h2 class="text-center pt-5 pb-3">Eliminar Vols</h2>
<form class="container mt-5 mb-5" action="views/eliminar.php" method="post" enctype="multipart/form-data">
 -->
<!-- <select class="form-select" name="vols" id="" required>
<?php
/*     $mysql=new mysqli('localhost','root','','vols');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="SELECT * FROM vol";
    $result=$mysql->query($sql);
    if($result){
        while($row=$result->fetch_assoc()){
            echo "<option value='".$row['codi']."'>"."Origen: ".$row['origen']." --- Desti: ".$row['desti']."</option>";
        }
    }
    
 */
    ?> 
</select>
<br>
<input class="btn btn-primary"  type="submit" name="eliminar" value="Eliminar">
</form> -->

<?php 
if(isset($_REQUEST["elimina"])){
    $j = $_REQUEST["elimina"];
    $mysql=new mysqli('localhost','root','','vols');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="DELETE FROM vol WHERE codi='$j'";
    $result=$mysql->query($sql);
    header("Location:../index.php");
}
?>