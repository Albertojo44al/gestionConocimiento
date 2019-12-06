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
                    <li><a href='cursos.php?nav=3&&user=$user'>Courses</a></li>
                    <li><a href='#?nav=3&&user=$user'>Categories</a></li>
                    <li><a href='#?nav=3&&user=$user'>Create</a></li>
                    <li><a href='#?nav=3&&user=$user'>My courses</a></li>
                    <li class='active'><a href='users.php?nav=3&&user=$user'>Users</a></li>
                    </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href='perfil.php?user=$user&&nav=3'><span class='glyphicon glyphicon-user'></span> Profile</a></li>
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
    <title> Users</title>
    </head>
    <body>
        <center>
            <br><br>
        <h2>Current users</h2>
	    <hr width=50%>
	    <br>

            <?
            $sql= "SELECT USUARIO, NOMBRE_COMPLETO,CODIGO_ROL,ACTIVO FROM USUARIOS U ORDER BY U.NOMBRE_COMPLETO ASC";
            $query=ibase_query($con,$sql);
            if(!res){
                echo 'Error !!';
                exit;
            }
            echo "<table rules=none width=60% cellpadding=5px id=tabla>\n";
            echo "
                    <tr>
                    <td align=center><b>USERNAME</b></td>
                    <td align=center><b>FULLNAME</b></td>
                    <td align=center><b>ROLES</b></td>
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
                if($row->CODIGO_ROL == 1)
                    $rol = "Standar";
                else if($row->CODIGO_ROL == 2)
                    $rol = "Content creator";
                else if($row->CODIGO_ROL == 3)
                    $rol = "Administrator";
                echo"<tr>
                     <td align=center> $row->USUARIO</td>
                     <td align=center> $row->NOMBRE_COMPLETO</td>
                     <td align=center> $rol </td>
                     <td align=center><div class='el'><a href='eliminarUsuario.php?user=$user&&usern=$row->USUARIO'>   Delete</a></div>

                      <div class='btn'><a href='ascenderUsuario.php?user=$user&&usern=$row->USUARIO&& prom=2 && rol=$row->CODIGO_ROL'>      Promotion</a></div>
                     <div class='btn'><a href='ascenderUsuario.php?user=$user&& usern=$row->USUARIO && prom=1 && rol=$row->CODIGO_ROL'>       Demotion</a> </div></td>

                     </tr>\n";
                }
            }
            echo "</table>\n";
            ?>
        </center>
    </body>

</html>
