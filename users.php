<? include('navAdministrador.php');
   include('conexion.php');


?>

<html lang="es">
    <style>
        a{
        color: black;
            text-decoration: none;
            color: #05787C
        }
        a:hover, a:active {
            background-color:#05787C;
            color: white;
            text-decoration: none;
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
            echo "<table border=1 rules=none width=60% cellpadding=5px id=tabla>\n";
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
                     <td align=center><a href='eliminarUsuario.php?user=$row->USUARIO'>       Delete</a>
                     <a href='ascenderUsuario.php?user=$row->USUARIO&& prom=2 && rol=$row->CODIGO_ROL'> |Promotion</a>
                     <a href='ascenderUsuario.php?user=$row->USUARIO && prom=1 && rol=$row->CODIGO_ROL'>|Demotion</a></td>
                     </tr>\n";
                }
            }
            echo "</table>\n";
            ?>
        </center>
    </body>

</html>
