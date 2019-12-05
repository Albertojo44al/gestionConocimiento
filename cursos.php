<?

$nav = $_GET['nav'];
if($nav==1)
    include('navEstandar.php');
else if($nav == 2)
    include('navCreador.php');
else
include('navAdministrador.php');



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
    .d1 img{
    width: 100%;
    height: 100%;
    border-radius: 2em;
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
    <div class="d1"><a href=""><img src="imagenes/image4.jpg">Curso 1</a></div>
    <div class="d1"><a href=""><img src="imagenes/image2.jpg">Curso 2</a></div>
    <div class="d1"><a href=""><img src="imagenes/image3.jpg">Curso 3</a></div>
    <div class="d1"><a href=""><img src="imagenes/image1.jpg">Curso 4</a></div>
    <div class="d1"><a href=""><img src="imagenes/image5.jpg">Curso 5</a></div>
    <div class="d1"><a href=""><img src="imagenes/image5.jpg">Curso 6</a></div>
    </div>
    <br><br>
    </Body>
</html>

