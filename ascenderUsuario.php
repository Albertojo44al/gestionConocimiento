<script type="text/javascript">

<?
    include('conexion.php');
    $user= $_GET['user'];
    $prom= $_GET['prom'];

    if($prom==2 && $_GET['rol'] < 3){
        $sql = "Update USUARIOS SET CODIGO_ROL = CODIGO_ROL+1 WHERE USUARIO='$user'";
        $query = ibase_query($con,$sql);
    }else if($prom==1 && $_GET['rol'] > 0){
        $sql = "Update USUARIOS SET CODIGO_ROL = CODIGO_ROL-1 WHERE USUARIO='$user'";
        $query = ibase_query($con,$sql);
    }
    else{
        echo "Error!!";
    }

    if(!query){
        echo "Error!!";
        exit;
    }
?>
window.location.href="users.php";


</script>
