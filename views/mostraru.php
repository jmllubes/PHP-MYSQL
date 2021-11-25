<h2 class="text-center pt-5 pb-3">Mostrar Vols</h2>

<table class="table">
    <tr>
        <th scope="col">Codi</th>
        <th scope="col">Origen</th>
        <th scope="col">Destí</th>
        <th scope="col">Preu</th>
        <th scope="col">Foto</th>
        <th scope="col">Nombre de places</th>

    </tr>
<?php
$mysql=new mysqli('localhost','root','','vols');
if($mysql->connect_errno){
    die($mysql->connect_error);
}
$sql="SELECT * FROM vol";
$result=$mysql->query($sql);
if($result){

while($row=$result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['codi']."</td>";
    echo "<td>".$row['origen']."</td>";
    echo "<td>".$row['desti']."</td>";
    echo "<td>".$row['preu']."</td>";
    echo "<td><img src='../img/".$row['foto']."' width='100'></td>";
    echo "<td>".$row['nombre_places']."</td>";
    echo "</tr>";
}

}   ?>

</table>
