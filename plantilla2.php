<?
include ('conexion.php');
include('bootstrap.php');
include('navBarPlantillas.php');
$nav = $_GET['nav'];
$user = $_GET['user'];




$codigoCurso = $_GET['codigo'];

$sql = "SELECT SUBTEMA,USUARIO,INFORMACION, NOMBRE_CURSO, TITULO FROM CURSOS_X_USUARIOS cxc inner join CURSOS C on cxc.CODIGO = c.CODIGO inner join CONTENIDO CON ON CON.CODIGO_CURSOS=C.CODIGO INNER JOIN SUBTEMAS SUB ON
SUB.CODIGO_CONTENIDO = CON.CODIGO_CONTENIDO WHERE C.CODIGO = $codigoCurso;";
$query = ibase_query($con,$sql);

$contador = 0;
while($row = ibase_fetch_object($query)){
    $contador++;
    $nombre = $row->NOMBRE_CURSO;
    $title = $row->TITULO;
       $creador = $row->USUARIO;
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
    <body background='imagenes/fonodo1.jpg'><br><br><br>


        <h1><center><b
        >$title</b></center></h1>";
    if($creador == $user || $nav==3){
        echo "<div align='right' class='eliminar'>
        <a href='eliminarCurso.php?codigo=$codigoCurso&&user=$user&&nav=$nav'>Delete Course</a><br><br>
        </div>
        <div align='right' class='modificar'>
        <a href='modificarCurso.php?codigo=$codigoCurso&&user=$user&&nav=$nav'>Modify Course</a>
        </div>";
    }
        echo "
        <center>
        <hr width=50%><br><br>
        <div class='contenedorp1'>
        <div class='sub1p1'>
            <h2>
            $subtema2
            </h2><br>
            <p>$info</p>
            </div>
        <div class='sub1p1'>
             <h2>
             $subtema
            </h2><br>
            <p>$info2</p>
            </div>
        </div>
        </center>

        <p id='autor'>author:   $creador </p>
    </body>
</html>";
?>

    <style>
         body{
            padding: 3%;
        }
    .contenedorp1{


    width: 90%;
    height: 90%;
}
    .sub1p1{

    background-color: #f2f2f2;
    border-radius: 5em;
    height:40%;
    width:80%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    .sub1p1 p{
       padding: 2%;

}
    .eliminar a{
    text-decoration: none;
    color:white;
    background: darkred;
    padding: 10px 12px;
    border-radius: 5px;
}
    .eliminar a:hover{
    background :#C71313;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    .modificar a{
    text-decoration: none;
    color:white;
    background: #023C4A;
    padding: 10px 12px;
    border-radius: 5px;
    text-align: right;
}
    .modificar a:hover{
    background :#0FB5DD;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    #autor{

    font-size: 20px;
}

    </style>
