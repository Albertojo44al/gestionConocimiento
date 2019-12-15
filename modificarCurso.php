<?
include ('conexion.php');
include('bootstrap.php');

$nav = $_GET['nav'];
$user = $_GET['user'];

$codigoCurso = $_GET['codigo'];

$sql = "SELECT SUBTEMA,INFORMACION, NOMBRE_CURSO, TITULO, CON.CODIGO_CONTENIDO FROM CURSOS_X_USUARIOS cxc inner join CURSOS C on cxc.CODIGO = c.CODIGO inner join CONTENIDO CON ON CON.CODIGO_CURSOS=C.CODIGO INNER JOIN SUBTEMAS SUB ON
SUB.CODIGO_CONTENIDO = CON.CODIGO_CONTENIDO WHERE C.CODIGO = $codigoCurso;";
$query = ibase_query($con,$sql);

$contador = 0;
while($row = ibase_fetch_object($query)){
    $contador++;
    $nombre = $row->NOMBRE_CURSO;
    $title = $row->TITULO;
    $codigoContenido = $row->CODIGO_CONTENIDO;
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
                 echo " <li class='active'><a href='crear.php?nav=$nav&&user=$user'>Create</a></li>
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
    </nav>";


echo "
<html>
<head><title>
    Cursos
    </title>
</head>
    <body>
        <link rel='stylesheet' href='signUp.css'>
        <center>
        <br><br><br><br><br>
    <div class='contenedor' id='form'>
        <form method='POST'>
        Title <br>
        <input name='titulo' type='text' size=35 style='font-size:18px' value='$title'><br><br>
        <h2>$subtema2</h2><br>
        Information<br>
        <textarea name='informacion1' rows='10' cols='60'>$info</textarea><br><br>
        <h2>$subtema</h2><br>
        Information<br>
        <textarea name='informacion2' rows='10' cols='60'>$info2</textarea><br><br>
        <input id='crear' type='submit' name='modificar' value='modify'>

        </form>
    </div>
            </center>
    </body>
</html>";

    if(isset($_POST['modificar'])){
        $titulo = $_POST['titulo'];
        $informacion1 = $_POST['informacion1'];
        $infomracion2 = $_POST['informacion2'];

        $sqlContenido = "UPDATE CONTENIDO CON SET TITULO = '$titulo' WHERE CON.CODIGO_CONTENIDO = $codigoContenido;";
        $queryContenido = ibase_query($con,$sqlContenido);
        if(!$queryContenido){
        echo "<script> alert('error Contenido'); </script>";
        exit;

        }
        $sqlSubtema = "UPDATE SUBTEMAS SUB SET INFORMACION='$informacion1' WHERE SUB.SUBTEMA= '$subtema' AND SUB.CODIGO_CONTENIDO= $codigoContenido;";
        $querySubtema = ibase_query($con,$sqlSubtema);
        if(!$querySubtema){
        echo "<script> alert('error Subtema1'); </script>";
        exit;
        }

        $sqlSubtema2 = "UPDATE SUBTEMAS SUB SET INFORMACION='$informacion2' WHERE SUB.SUBTEMA= '$subtema2' AND SUB.CODIGO_CONTENIDO= $codigoContenido;";
        $querySubtema2 = ibase_query($con,$sqlSubtema2);
        if(!$querySubtema){
        echo "<script> alert('error Subtema2'); </script>";
        exit;
        }


        echo "<script type='text/javascript'>
        window.location.href='myCourses.php?nav=$nav&&user=$user';
        </script>";
    }


?>
