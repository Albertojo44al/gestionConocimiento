<?
include ('conexion.php');
include('bootstrap.php');
include('navBarPlantillas.php');
$nav = $_GET['nav'];
$user = $_GET['user'];


$codigoCurso = $_GET['codigo'];

$sql = "SELECT SUBTEMA,INFORMACION, NOMBRE_CURSO, TITULO FROM CURSOS C inner join CONTENIDO CON ON CON.CODIGO_CURSOS=C.CODIGO INNER JOIN SUBTEMAS SUB ON
SUB.CODIGO_CONTENIDO = CON.CODIGO_CONTENIDO WHERE C.CODIGO = $codigoCurso;";
$query = ibase_query($con,$sql);

$contador = 0;
while($row = ibase_fetch_object($query)){
    $contador++;
    $nombre = $row->NOMBRE_CURSO;
    $title = $row->TITULO;
    if($contador ==1){
    $subtema = $row->SUBTEMA;
    $info = $row->INFORMACION;
    }else{
    $subtema2 = $row->SUBTEMA;
    $info2 = $row->INFORMACION;
    }

}


echo "
<html>
<head>
    <title>
    $nombre
    </title>
</head>
    <body style='background-color:#2cb1c3'><br><br><br>




        <h1><center><b>$title</b></center></h1>

        <div align='right' class='eliminar'>
        <a href='eliminarCurso.php?codigo=$codigoCurso&&user=$user&&nav=$nav'>Delete Course</a>
        </div>

         <center>
        <hr width=50%>
        <div class='contenedorp1'>
        <div class='sub1p1'>
            <h2>
            $subtema
            </h2><br>
            <p>$info</p>
            </div>
        <div class='sub1p1'>
             <h2>
             $subtema2
            </h2><br>
            <p>$info2</p>
            </div>

        </div>
        </center>

        <div class='modificar'>

        </div>

    </body>
</html>";
#?nav=3%20&&user=admin&&codigo=73969&&color=#2cb1c3
?>

    <style>
      body{
            padding: 3%;
        }
    .contenedorp1{
    background-color: #f2f2f2;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    grid-template-columns: auto auto;
    width: 90%;
    height: 80%;
    display:grid;
    padding: 5%;
}
    .sub1p1{
    border-radius: 5em;
    height:80%;
    width:95%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    .eliminar a{
    text-decoration: none;
    color:white;
    background: darkred;
    padding: 10px 12px;
    border-radius: 5px;
    text-align: right;
}
    .eliminar a:hover{
    background :#C71313;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    </style>
