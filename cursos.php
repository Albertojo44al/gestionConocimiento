<?
include ('conexion.php');
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
                    <li class='active'><a href='cursos.php?nav=$nav&&user=$user'>Courses</a></li>
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
                    <li><a href='perfil.php?nav=$nav&&user=$user'><span class='glyphicon glyphicon-user'></span> Profile</a></li>
                    <li><a href='index.html'><span class='glyphicon glyphicon-log-in'></span> Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <center>";

?>

<html>

<head>
    <title>
    Courses
    </title>
</head>
    <Body>
        <link rel="stylesheet" href="cursos.css">
        <br><br><br><br>
         <h1><b>Current Courses</b></h1>
        <hr width=50%>
        <br><br><br><br>
     <div class="contenedor">
    <div class="d1"><a href=""><img src="imagenes/image4.jpg"><p>Curso 1</p></a></div>
    <div class="d1"><a href=""><img src="imagenes/image2.jpg"><p>Curso 2</p></a></div>
    <div class="d1"><a href=""><img src="imagenes/image3.jpg"><p>Curso 3</p></a></div>
    <div class="d1"><a href=""><img src="imagenes/image1.jpg"><p>Curso 4</p></a></div>
    <div class="d1"><a href=""><img src="imagenes/image5.jpg"><p>Curso 5</p></a></div>
    <div class="d1"><a href=""><img src="imagenes/image5.jpg"><p>Curso 6</p></a></div>
    </div>
    <br><br>
    </Body>
</html>

