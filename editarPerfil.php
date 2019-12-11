<?
include('conexion.php');
include('bootstrap.php');

$nav = $_GET['nav'];
$user = $_GET['user'];
 echo "
<body>
<link rel='stylesheet' href='index.css'>
    <nav class='navbar navbar-fixed-top navbar-inverse'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a class='navbar-brand'><img src='imagenes/logo.png' width='25px' height='100%'></a>
            </div>
            <div class='collapse navbar-collapse' id='myNavbar'>
                <ul class='nav navbar-nav'>
                    <li><a href='cursos.php?nav=$nav&&user=$user'>Courses</a></li>
                    <li><a href='#?nav=$nav&&user=$user'>Categories</a></li>";
                if($nav==2 || $nav==3){
                 echo " <li><a href='crear.php?nav=$nav&&user=$user'>Create</a></li>
                        <li><a href='myCourses.php?nav=$nav&&user=$user'>My courses</a></li>";
                    if($nav==3){
                    echo "<li><a href='users.php?nav=$nav&&user=$user'>Users</a></li>";
                    }
                }
             echo " </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <li class='active'><a href='perfil.php?nav=$nav&&user=$user'><span class='glyphicon glyphicon-user'></span> Profile</a></li>
                    <li><a href='index.html'><span class='glyphicon glyphicon-log-in'></span> Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <center>";


if (isset($_POST["btn1"]))
{
    $cpass = $_POST['cpass'];
    $newpass = $_POST['newpass'];
    $newpass2 = $_POST['newpass2'];
    if($newpass != $newpass2 || $cpass != $_GET['pss']){
        echo "<script> alert('Password do not match!'); </script>";
    }else{
        $sql = "UPDATE USUARIOS SET CONTRASENA = '$newpass' WHERE USUARIO = '$user'AND CONTRASENA ='$cpass';";
        $query = ibase_query($con,$sql);
        echo "<script>alert('The password has been change!');
        window.location.href='perfil.php?user=$user&&nav=$nav';</script>";
    }


}


?>

<html>

<head>
	<title>EDIT PROFILE</title>
<style>

#cambiar{
    background-color:#2CB1C3;
    border:0em;
    border-radius:0.7em;
    color:#FFF;
    cursor:pointer;
    font-family: "Arial";
    font-weight: bold;
    padding:0.2em;
    width:10em;
}
    #cambiar:hover{
         background-color:#05787C;
         box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }
    </style>
</head>

<body>
<link rel="stylesheet" href="signUp.css">
<center>
    <br><br><br><br>
    <h2>CHANGE PASSWORD
	<hr width=50%></h2>
     <div class="contenedor">
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7>
                <tr>
                    <td><label>Current password</label></td>
                </tr>
                <tr>
                    <td><label><input name="cpass" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
                    <td><label>New password</label></td>
                </tr>
                <tr>
				    <td><label><input name="newpass" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                    <tr>
                    <td><label>Confirm new password</label></td>
                </tr>
                <tr>
				    <td><label><input name="newpass2" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>



                </table>
        <br>
        <br>

    <input id='cambiar' type="submit" name="btn1" value="CHANGE"/>


</form>
    </div>
</center>
</body>

</html>
