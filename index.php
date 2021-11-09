<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Login-Registre</title>
</head>
<body>
    <h1>Register</h1>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="mail" name="mail" placeholder="Mail">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="repeatpassword" placeholder="Repeat Password">
        <input type="submit" name="submit" value="Register">
    </form>
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
</body>
</html>