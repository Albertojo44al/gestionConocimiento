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
    </nav>";



if(isset($_POST['enviar'])){
    $title = $_POST['title'];
    $subtema = $_POST['subtema'];
    $subtema2 = $_POST['subtema2'];
    $info = $_POST['info'];
    $info2 = $_POST['info2'];
    $color= $_POST['color'];


    $codigo = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );


    //insertar datos en la tabala de cursos
    $sqlCursos = "INSERT INTO CURSOS (CODIGO, FECHA_CREACION,CODIGO_CATEGORIAS,ACTIVO,NOMBRE_CURSO) VALUES ($codigo,CURRENT_DATE,$category,'A','$name');";
    $queryCursos = ibase_query($con,$sqlCursos);
     if(!$queryCursos){
        echo "<script> alert('error'); </script>";
        exit;
    }
    //insertar datos en la tabla cursos_x_usuarios
    $sqlCxU = "INSERT INTO CURSOS_X_USUARIOS(USUARIO,CODIGO) VALUES ('$user',$codigo);";
    $queryCxU = ibase_query($con,$sqlCxU);
    if(!$queryCursos){
        echo "<script> alert('error'); </script>";
        exit;
    }

    //insertar datos en la tabla contenido
    $codigoContenido = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );


    $sqlContenido = "INSERT INTO CONTENIDO (CODIGO_CONTENIDO,CODIGO_CURSOS, PLANTILLA) VALUES ($codigoContenido,$codigo,3);";
    $queryContenido = ibase_query($con,$sqlContenido);
      if(!$queryContenido){
        echo "<script> alert('error'); </script>";
        exit;
    }


        //envia los datos extraidos a la plantilla
    if($temp ==1){
        echo '
        <script type="text/javascript">
        window.location.href="plantilla1.php";
        </script>';
    }
    else  if($temp ==2){
        echo '<script type="text/javascript">
        window.location.href="plantilla2.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        window.location.href="plantilla3.php";
        </script>';
    }

}



?>


<html>
<head><title>
    Template 1
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
        Background color:  <input type="color" name="color" value="#2CB1C3"><br><br>
        Subtopic 1<br>
        <input name="subtema" type="text" size=35 style="font-size:18px"><br><br>
        Information<br>
        <textarea name="info" rows="10" cols="60"> ...</textarea><br><br>
        Subtopic 2<br>
        <input name="subtem2" type="text" size=35 style="font-size:18px"><br><br>
        Information<br>
        <textarea name="info2" rows="10" cols="60"> ...</textarea><br><br>
        <input id='crear' type="submit" name="enviar" value="create">
        </form>
    </div>
            </center>
    </body>
</html>
