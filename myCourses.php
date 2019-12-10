<?
   include('conexion.php');
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
                 echo " <li><a href='crear.php?nav=$nav&&user=$user'>Create</a></li>
                        <li class='active' ><a href='myCourses.php?nav=$nav&&user=$user'>My courses</a></li>";
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

?>

<html lang="es">
    <style>
        hr{
             border-width:3px;

        }
        .el a{
            text-decoration: none;
            color: darkred;
        }
        .el a:hover{
            text-decoration: none;
            color:white;
            background: darkred;
            padding: 10px 12px;
            border-radius: 5px;
        }
        .btn a{
            text-decoration: none;
            color:#05787C;
        }

        .btn a:hover {
            background-color:#05787C;
            color: white;
            text-decoration: none;
            padding: 10px 0px;
            border-radius: 5px;
        }
        #tabla{
             border-spacing: 5px;
            border-collapse: separate;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }


    </style>
    <head>
    <title> My Courses</title>
    </head>
    <body>
        <center>
            <br><br><br>
        <h2>My Current Courses</h2>
	    <hr width=50%>
	    <br>

            <?
            $sql= "SELECT C.CODIGO,C.FECHA_CREACION,C.NOMBRE_CURSO,C.ACTIVO FROM CURSOS C
                   INNER JOIN CURSOS_X_USUARIOS CU ON Cu.CODIGO=C.CODIGO
                   WHERE CU.USUARIO = '$user'
                   ORDER BY C.FECHA_CREACION ASC;";
            $query=ibase_query($con,$sql);
            if(!res){
                echo 'Error !!';
                exit;
            }
            echo "<table rules=none width=60% cellpadding=5px id=tabla>\n";
            echo "
                    <tr>
                    <td align=center><b>COURSE COD</b></td>
                    <td align=center><b>NAME</b></td>
                    <td align=center><b>CREATION DATE</b></td>
                    <td align=center><b>ACTIONS</b></td>
                    </tr>
                    <tr>
                    <td align=center><hr> </td>
				    <td align=center><hr> </td>
				    <td align=center><hr> </td>
                    <td align=center><hr> </td>
                    </tr>\n";
            while($row=ibase_fetch_object($query)){
                if($row->ACTIVO == 'A'){
                echo"<tr>
                     <td align=center> $row->CODIGO</td>
                     <td align=center> $row->NOMBRE_CURSO</td>
                     <td align=center> $row->FECHA_CREACION </td>
                     <td align=center><div class='el'><a href='eliminarCurso.php?user=$user&&nav=$nav&&codigo=$row->CODIGO'>   Delete</a></div>
                     </td>

                     </tr>\n";
                }
            }
            echo "</table>\n";
            ?>
        </center>
    </body>

</html>
