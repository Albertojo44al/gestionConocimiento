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
                    <li><a href='categorias.php?nav=$nav&&user=$user'>Categories</a></li>";
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

    $sql = "SELECT * FROM CURSOS cur inner join contenido con on cur.CODIGO = con.CODIGO_CURSOS;";
    $query = ibase_query($con,$sql);
    if(!$query){
       echo "<script> alert('error'); </script>";
        exit;
    }

    echo"<html>

        <head>
        <title>
        Courses
        </title>
        </head>
        <Body>
        <link rel='stylesheet' href='cursos.css'>
            <br><br><br><br>
            <h1><b>Current Courses</b></h1>
            <hr width=50%>
        <br><br><br><br>
    <div class='contenedor'>";
$contador =0;
    while($row=ibase_fetch_object($query)){
        if($row->ACTIVO == 'A'){
        $contador++;
        echo "<div class='d1'>";
        if($row->PLANTILLA ==1){
           echo " <a href='plantilla1.php?nav=$nav&&user=$user&&codigo=$row->CODIGO'>";
        }else if($row->PLANTILLA ==2){
           echo " <a href='plantilla2.php?nav=$nav&&user=$user&&codigo=$row->CODIGO'>";
        }else if($row->PLANTILLA ==3){
           echo " <a href='plantilla3.php?nav=$nav&&user=$user&&codigo=$row->CODIGO'>";
        }

            echo "<img src='imagenes/image4.jpg'>$row->NOMBRE_CURSO</a></div>";
        }
    }
    echo "</div>
    <br><br>
       </Body>
       </html>";
if($contador ==1){
    echo " <style>.d1{
        width: 50%;
        height: 40%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        </style>";
}
 else if($contador < 4){
 echo " <style>.d1{
        width: 100%;
        height: 35%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        </style>";
 }else{
     echo " <style>.d1{
        height: 70%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        </style>";
 }

?>

<style>
    .contenedor{
    grid-template-columns: auto auto auto;
    width: 80%;
    height: 100%;
    justify-content:space-between;
    display:grid;
    grid-row-gap: 10%;
    grid-column-gap: 10%;

    }
    .d1 a{
        text-decoration: none;
        color:#05787C;
        font-size: 20px;

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






