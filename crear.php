<!DOCTYPE>
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

    if(isset($_POST["t1"])){
            $cat = $_POST['category'];
            $name = $_POST['name'];
                 echo "<script type='text/javascript'>
            window.location.href='datosCurso.php?nav=$nav&&user=$user&&category=$cat&&name=$name&&plantilla=1';
            </script>";
    }else if(isset($_POST["t2"])){
            $cat = $_POST['category'];
            $name = $_POST['name'];
                 echo "<script type='text/javascript'>
            window.location.href='datosCurso.php?nav=$nav&&user=$user&&category=$cat&&name=$name&&plantilla=2';
            </script>";
    }else if(isset($_POST["t3"])){
            $cat = $_POST['category'];
            $name = $_POST['name'];
                 echo "<script type='text/javascript'>
            window.location.href='datosCurso.php?nav=$nav&&user=$user&&category=$cat&&name=$name&&plantilla=3';
            </script>";
    }


?>

<html>
    <head>
        <title>Create courses</title>
        <link rel="stylesheet" href="cursos.css">
    </head>
    <style>
      .t{
    height: 50%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .t img{
    width: 100%;
    height: 20%;
    }
    </style>
    <body>

        <center>
        <br><br><br><br>
        <h2>Create a new course</h2>
        <hr width=50%>
        <div class="contenedorG"><br><br>
             <form name="fe" action="" method="POST">
            <table id="tabla" cellpadding=7>
            <tr>
                <td ><label>Categories</label><br></td>
            </tr>
            <tr>
                <td ><input type="radio" name="category" value="1" required autofocus> <label> <br>Developing  </label>
                <input type="radio" name="category" value="2" required autofocus> <label> Design </label><br><br>
                <input type="radio" name="category" value="3" required autofocus> <label> Computing   </label>
                <input type="radio" name="category" value="4" required autofocus> <label> Marketing </label><br><br></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <td><label>Course name<br></label></td>
            </tr>
            <tr>
                 <td><label><input name="name" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr><td><label>Templates<br></label></td>
            </tr>
            <tr><td>
                <div class='contenedorP'>

                <div class='t'><img src='imagenes/plant1.JPG'><input id='crear' type="submit" name="t1" value="template 1"/></div>
                <div class='t'><img src='imagenes/plant2.JPG'><input id='crear' type="submit" name="t2" value="template 2"/></div>
                <div class='t'><img src='imagenes/plant3.JPG'><input id='crear' type="submit" name="t3" value="template 3"/></div>

                </div>
                </td>
            </tr>

            </table>
             </form>
        </div>
        </center>
    </body>
</html>



