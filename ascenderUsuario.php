<script type="text/javascript">

<?
    include('conexion.php');
    $user= $_GET['user'];
    $prom= $_GET['prom'];
    $rol=$_GET['rol'];

    if($prom==2 && $rol < 3){
        $sql = "Update USUARIOS SET CODIGO_ROL = CODIGO_ROL+1 WHERE USUARIO='$user'";
        $query = ibase_query($con,$sql);
    }else if($prom==1 && $rol > 1){
        $sql = "Update USUARIOS SET CODIGO_ROL = CODIGO_ROL-1 WHERE USUARIO='$user'";
        $query = ibase_query($con,$sql);
    }

?>
window.location.href="users.php";


</script>
