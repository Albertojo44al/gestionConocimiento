<?php
$con = ibase_connect("C:\\AppServ\\www\\FBPHP\\gestion\\GESTIONDECONOCIMIENTO.FDB","SYSDBA","masterkey");
if(!$con){
    echo "Acceso Denegado!";
    exit;
}

?>
