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
                 echo " <li><a href='#?nav=$nav&&user=$user'>Create</a></li>
                        <li><a href='#?nav=$nav&&user=$user'>My courses</a></li>";
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
<style>
    .contenedor{
    grid-template-columns: auto auto auto;
    width: 80%;
    height: 80%;
    justify-content:space-between;
    display:grid;
    grid-row-gap: 10%;
    grid-column-gap: 10%;

    }
    .d1 a{
        text-decoration: none;
        color:#05787C;
    }
    .d1{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .d1:hover, a:hover {
        background-color:#2CB1C3;
        color: white;
    }
    .d1 img{
    width: 100%;
    height: 90%;
    }
    </style>

<head>
    <title>
    Courses
    </title>
</head>
    <Body>
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

