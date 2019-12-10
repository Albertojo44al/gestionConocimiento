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

    $sql = "SELECT * FROM USUARIOS U WHERE U.USUARIO = '$user'";
    $query = ibase_query($con,$sql);
    $datos = ibase_fetch_object($query);

if($datos->CODIGO_ROL ==1)
    $codigo = "Standar";
else if($datos->CODIGO_ROL ==2)
    $codigo = "Content Creator";
else
    $codigo = "Administrator";
echo "<body>
        <br><br><br><br><br>
         <div align='right' class='edit'>
        <a href='editarPerfil.php'>Edit Profile</a>
        </div>
    <div class='contenedor1'>
            <div class='info'>
            <img src='imagenes/user.png'>
            </div>
            <div class='espacio'></div>
            <div class='texto'><br><br>
            <label>Full name: $datos->NOMBRE_COMPLETO</label><br>
            <label>Username: $datos->USUARIO</label><br>
            <label>E-mail: $datos->CORREO_ELECTRONICO</label><br>
            <label>Role:  $codigo   </label>
        </div>
    </div>
    </body>"

?>


<html>
<head>
    <style>
        body{
            padding: 3%;
        }
    .contenedor1{
    width: 80%;
    height: 50%;
    display: flex;
    justify-content: flex-start;
}
    .info{
    width: 32%;
    height: 100%;

}
    .info img{
    width: 100%;
    height: 100%;
    border-radius: 100em;
    padding: 10%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color:#2CB1C3;
}
    .espacio{
    width: 10%;
}
    .texto{
    border-radius: 100%;
    width: 40%;
    height: 60%;
    text-align:left;
}
    .texto label{
    padding: 20px;
    font-size: 20px;
   font-family: sans-serif;
}

    .edit a{
    text-decoration: none;
    color:white;
    background:#2CB1C3;
    padding: 10px 12px;
    border-radius: 5px;
}
    .edit a:hover{
    background :#05787C;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    </style>
    <title>Profile </title>
    <meta charset="UTF-8"></head>

</html>
