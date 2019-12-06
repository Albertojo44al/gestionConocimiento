<script type="text/javascript">
<?
    include("conexion.php");
    $user = $_GET['user'];
    $username = $_GET['usern'];

    $sql="UPDATE USUARIOS SET ACTIVO ='N' WHERE USUARIO= '$username'";
    $query= ibase_query($con,$sql);
    if(!query){
        echo "Error!!";
        exit;
    }
    echo "alert('The user has been remove!');
        window.location.href='users.php?user=$user';";

?>


</script>
