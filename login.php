<!DOCTYPE>
<?

   include('conexion.php');
   include ('navbarInicio.php');

if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "LOG IN")
    {
       $usuario=$_POST['user'];
       $pass= $_POST['pass'];


    $sql= "SELECT NOMBRE_COMPLETO,CODIGO_ROL FROM USUARIOS WHERE USUARIO='$usuario' AND CONTRASENA='$pass'AND ACTIVO='A'";
    $insert = ibase_query($con,$sql);

    if($row=ibase_fetch_object($insert)){
        echo "<script type='text/javascript'>
		window.location.href='cursos.php?nav=$row->CODIGO_ROL && user=$usuario';
		</script>";

    }
    else{
         echo "<script> alert('INVALID USER/PASSWORD!'); </script>";
    }


}
}
?>

<html>

<head>
	<title>LOG IN</title>

</head>

<body>
<link rel="stylesheet" href="signUp.css">
<center>
    <br><br><br><br>
    <h2>LOG IN  <img src="imagenes/logoB.png" width="5%" height="7%">
	<hr width=50%></h2>
     <div class="contenedor">
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7>
                <tr>
                    <td><label>Username</label></td>
                </tr>
                <tr>
                    <td><label><input name="user" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
                    <td><label>Pasword</label></td>
                </tr>
                <tr>
				    <td><label><input name="pass" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>



                </table>
        <br>
        <br>

    <input id='crear' type="submit" name="btn1" value="LOG IN"/>


</form>
    </div>
</center>
</body>

</html>
