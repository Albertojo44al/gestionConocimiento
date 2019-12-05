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

