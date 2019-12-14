<?
include ('conexion.php');
include('bootstrap.php');

//extrae los datos enviados de la pagina anterior
$nav = $_GET['nav'];
$user = $_GET['user'];
$category= $_GET['category'];
$name = $_GET['name'];
$temp = $_GET['plantilla'];
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



if(isset($_POST['enviar'])){
    $title = $_POST['title'];
    $subtema1 = $_POST['subtema'];
    $subtema2 = $_POST['subtema2'];
    $info1 = $_POST['info'];
    $info2 = $_POST['info2'];
    $color= $_POST['color'];


    #$codigo = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );




    //insertar datos en la tabala de cursos
    $sqlCursos = "INSERT INTO CURSOS (CODIGO, FECHA_CREACION,CODIGO_CATEGORIAS,ACTIVO,NOMBRE_CURSO) VALUES (gen_id(CODIGO_CURSO, 1) ,CURRENT_DATE,$category,'A','$name');";
    $queryCursos = ibase_query($con,$sqlCursos);
     if(!$queryCursos){
        echo "<script> alert('error Cursos'); </script>";
        exit;
    }
    //insertar datos en la tabla cursos_x_usuarios
    $sqlCxU = "INSERT INTO CURSOS_X_USUARIOS VALUES ('$user',gen_id(CODIGO_CURSO, 0));";
    $queryCxU = ibase_query($con,$sqlCxU);
    if(!$queryCursos){
        echo "<script> alert('error CursosxUsuarios'); </script>";
        exit;
    }

    $sqlCodigo = 'select gen_id(CODIGO_CURSO, 0) as CODIGO from RDB$DATABASE;';
    $queryCodigo = ibase_query($con,$sqlCodigo);
    if(!$queryCodigo){
        echo "<script> alert('error Codigo'); </script>";
        exit;
    }

    $codigo = ibase_fetch_object($queryCodigo);



    //insertar datos en la tabla contenido

    $sqlContenido = "INSERT INTO CONTENIDO (CODIGO_CONTENIDO,CODIGO_CURSOS, PLANTILLA,TITULO) VALUES (gen_id(CODIGO_CONTENIDO, 1),gen_id(CODIGO_CURSO, 0),$temp,'$title');";
    $queryContenido = ibase_query($con,$sqlContenido);
      if(!$queryContenido){
        echo "<script> alert('error conetenido'); </script>";
        exit;
    }


    //insertar datos en subtemas
     $sqlSub2 = "INSERT INTO SUBTEMAS (CODIGO_CONTENIDO,SUBTEMA,INFORMACION) VALUES (gen_id(CODIGO_CONTENIDO, 0),'$subtema2','$info2');";
    $querySub2 = ibase_query($con,$sqlSub2);
    if(!$querySub2){
        echo "<script> alert('error subtemas'); </script>";
        exit;
    }


    $sqlSub = "INSERT INTO SUBTEMAS (CODIGO_CONTENIDO,SUBTEMA,INFORMACION) VALUES (gen_id(CODIGO_CONTENIDO, 0),'$subtema1','$info1');";
    $querySub = ibase_query($con,$sqlSub);
    if(!$querySub){
        echo "<script> alert('error'); </script>";
        exit;
    }




        //envia los datos extraidos a las plantillas
    if($temp==1){
        echo "
        <script type='text/javascript'>
        window.location.href='plantilla1.php?nav=$nav&&user=$user&&codigo=$codigo->CODIGO';
        </script>";
    }
    else  if($temp==2){
        echo "<script type='text/javascript'>
        window.location.href='plantilla2.php?nav=$nav&&user=$user&&codigo=$codigo->CODIGO';
        </script>";
    }
    else if($temp==3){
       echo "<script type='text/javascript'>
        window.location.href='plantilla3.php?nav=$nav&&user=$user&&codigo=$codigo->CODIGO';
        </script>";
    }

}


?>


<html>
<head><title>
    Cursos
    </title>
</head>
    <body>
        <link rel="stylesheet" href="signUp.css">
        <center>
        <br><br><br><br><br>
    <div class="contenedor" id="form">
        <form method="POST">
        Title <br>
        <input name="title" type="text" size=35 style="font-size:18px"><br><br>
        Subtopic 1<br>
        <input name="subtema" type="text" size=35 style="font-size:18px"><br><br>
        Information<br>
        <textarea name="info" rows="10" cols="60"> ...</textarea><br><br>
        Subtopic 2<br>
        <input name="subtema2" type="text" size=35 style="font-size:18px"><br><br>
        Information<br>
        <textarea name="info2" rows="10" cols="60"> ...</textarea><br><br>
        <input id='crear' type="submit" name="enviar" value="create">
        </form>
    </div>
            </center>
    </body>
</html>
