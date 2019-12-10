<script type="text/javascript">
<?
    include("conexion.php");
    $nav = $_GET['nav'];
    $user = $_GET['user'];
    $codigo = $_GET['codigo'];


    $sql="UPDATE CURSOS SET ACTIVO='N' WHERE CODIGO = $codigo;";
    $query = ibase_query($con,$sql);
    if(!query){
        echo "Error!!";
        exit;
    }
     echo "alert('The course has been remove!');
        window.location.href='cursos.php?user=$user&&nav=$nav';";
    ?>

</script>
