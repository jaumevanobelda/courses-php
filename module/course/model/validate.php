<?php
/*
function validate() {
    
    echo "<script> console.log('Entra en validate') </script>";
    $continuar = true;
    $nombre = $_POST['nombre'];
    $select_nombre = "SELECT * FROM course WHERE nombre='$nombre'";
    $conexio = connect::con();
    $res_nombre = mysqli_query($conexio, $select_nombre)->fetch_object();
    connect::close($conexio);

    if(isset($res_nombre)){
        $continuar = false; 
        $error_nombre = "Ya existe un curso con ese nombre";
    }

    return $continuar;
}
*/

    
    echo "<script> console.log('Entra en validate.php') </script>";
    $continuar = true;
    $nombre = $_POST['nombre'] . "'";
    $hola = isset($_POST['update']);
    echo "<script> console.log('Isset update ') </script>";
    echo "<script> console.log('$hola ') </script>";
    if(isset($_GET['id'])){
        echo "<script> console.log('Entra en isset update ') </script>";
        $nombre = $nombre . " AND id !='" . $_GET['id'] . "'";   
    }

    $select_nombre = "SELECT * FROM course WHERE nombre='$nombre ";
    echo '<script> console.log("'.$select_nombre.'"); </script>';
    echo "<script> console.log('select'); </script>";
    $conexio = connect::con();  
    $res_nombre = mysqli_query($conexio, $select_nombre)->fetch_object();
    connect::close($conexio);

    if(isset($res_nombre)){
        $continuar = false; 
        $error_nombre = "Ya existe un curso con ese nombre";
    }
    echo '<script> console.log("'.$continuar.'"); </script>';

