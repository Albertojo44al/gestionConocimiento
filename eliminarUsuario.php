<script type="text/javascript">
<?
    include("conexion.php");
    $username = $_GET['user'];

    $sql="UPDATE USUARIOS SET ACTIVO ='N' WHERE USUARIO= '$username'";
    $query= ibase_query($con,$sql);
    if(!query){
        echo "Error!!";
        exit;
    }
?>
alert("The user has been remove!");
window.location.href="users.php";

</script>
