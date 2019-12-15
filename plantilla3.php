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
    <body background='imagenes/fondo2.jpg'><br><br><br>
        <h1><center><b>$title</b></center></h1>";
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
        <hr width=50%>
        <div class='contenedorp1'>
        <div class='sub1p1'><br><br>
            <h2>
            $subtema2
            </h2><hr width=50%><br>
            <p>$info</p>
            </div>
        <div class='sub1p1'><br><br>
             <h2>
             $subtema
            </h2><hr width=50%><br>
            <p>$info2</p>
            </div>
        </div>
        </center><br>
 <p id='autor'>author:   $creador </p>
    </body>
</html>";
#?nav=3%20&&user=admin&&codigo=73969&&color=#2cb1c3
?>


    <style>
    body{
        padding: 3%;
    }
    .contenedorp1{
    background-color: #DBDBDB;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    grid-template-columns: auto auto;
    width: 80%;
    height: 80%;
    display:grid;

}
    .sub1p1{

    height:80%;
    width:90%;

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
    color: whitesmoke;
    font-size: 20px;
}
        h2{
            color: coral;
            font-family: fantasy;
        }
        h1{
            color: coral;

        }
    </style>
