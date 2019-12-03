<!DOCTYPE>
<?
include ('conexion.php');

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


        $sql= "INSERT INTO USUARIOS( USUARIO,CONTRASENA,NOMBRE_COMPLETO,CORREO_ELECTRONICO,CODIGO_ROL) VALUES('$usuario','$pass','$fullname','$email','$typeUser')";
        $insert = ibase_query($con,$sql);
        if(!insert){
            echo 'Usuario ya existente';
            exit;
        }
        echo "<script> alert('Usuario creado exitosamente!!'); </script>";
        ?>
		<script type="text/javascript">
		window.location.href="index.html";
		</script>
		<?
    }

}
?>

<html>

<style>

	body{
		font-family:"Segoe UI";
		font-size:32px;
	}

	#tabla
	{
		font-size: 20px;
	}

	#crear{
		background-color:#2CB1C3;
		border:0em;
		border-radius:0.7em;
		color:#FFF;
		cursor:pointer;
		font-family: "Arial";
		font-weight: bold;
		padding:0.5em;
		width:20em;

	}
</style>

<head>
	<title>Nuevo Usuario</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"><img src="imagenes/logo.png" width="25px" height="100%"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>


<center>
    <br><br>
    <h2>REGISTRAR NUEVO USUARIO  <img src="imagenes/logoB.png" width="5%" height="7%">
	<hr width=50%></h2>

	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7>
                <tr>
                    <td align="center"><b>Username:  </b></td><td><label><input name="user" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
				    <td align="center"><b>Full name:  </b></td><td><label><input name="name" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
				    <td align="center"><b>Password:  </b></td><td><label><input name="pass" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
				    <td align="center"><b>E-mail:  </b></td><td><label><input name="email" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
                    <td align="center"><b>User: </b></td>


                    <td algn="center">
                    <input type="radio" name="us" value="1"><label>Standar</label><br>
				    <input type="radio" name="us" value="2" > <label>Content Creator</label><br>
                    <input type="radio" name="us" value="3" ><label>Administrator</label><br>
                    </td>

                 </tr>

                </table>
        <br>
        <br>

    <input id='crear' type="submit" name="btn1" value="Crear usuario"/>


</form>

</center>
</body>

</html>

