<!DOCTYPE>
<?
include ('conexion.php');
include ('navbarInicio.php');

if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "Crear usuario")
    {
       $usuario=$_POST['user'];
       $fullname=$_POST['name'];
       $pass = $_POST['pass'];
       $email = $_POST['email'];
       $typeUser = $_POST['us'];

        $verificar= "SELECT USUARIO FROM USUARIOS WHERE USUARIO='$usuario'";
        $insertVerificar = ibase_query($con,$verificar);

        if(!$row=ibase_fetch_object($insertVerificar)){

            $sql= "INSERT INTO USUARIOS( USUARIO,CONTRASENA,NOMBRE_COMPLETO,CORREO_ELECTRONICO,CODIGO_ROL,ACTIVO) VALUES('$usuario','$pass','$fullname','$email','$typeUser','A')";
            $insert = ibase_query($con,$sql);
            if(!insert){
                echo '';
                exit;
            }

            echo "<script> alert('User created successfully!!'); </script>";
            echo '
            <script type="text/javascript">
            window.location.href="index.html";
            </script>';
        }
         else{
            echo "<script> alert('User $row->USUARIO already used!'); </script>";
        }

    }

}
?>

<html>

<title>New User</title>

<body>
<link rel="stylesheet" href="signUp.css">
<center>
    <br><br><br><br>

    <h2>NEW USER  <img src="imagenes/logoB.png" width="5%" height="7%">
	<hr width=50%></h2>
     <div class="contenedor">
	<form name="fe" action="" method="POST">
                <table id='tabla'>
                     <div class="form-label-group">
                 <tr>
                   <td><label >Username</label></td> </tr>
                <tr>
                   <td><label><input name="user" type="text" size=35 style="font-size:18px" required autofocus/></label></td></tr>
                <tr>
                   <td> <label>Full name</label></td> </tr>
                <tr>
				   <td><label><input name="name" type="text" size=35 style="font-size:18px" required autofocus/></label></td></tr>
                <tr>
                    <td> <label>Password</label> </td></tr>
                <tr>
				    <td><label><input name="pass" type="password" size=35 style="font-size:18px" required autofocus/></label></td></tr>
                <tr>
                    <td><label>E-mail</label> </td></tr>
                <tr>
                    <td><label><input name="email" type="email" size=35 style="font-size:18px" required autofocus/></label></td></tr>
                    </div>
                <tr>
                    <td> <label>Users</label> </td></tr>
                <tr>
                    <td algn="center">
                    <input type="radio" name="us" value="1" required autofocus> <label>Standar</label><br>
				    <input type="radio" name="us" value="2" required autofocus > <label>Content Creator </label><br></td></tr>

                </table>

        <br>
        <br>

    <input id='crear' type="submit" name="btn1" value="Crear usuario"/>


</form>
</div>

</center>
</body>

</html>

