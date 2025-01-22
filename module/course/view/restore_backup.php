<?php
$ls = scandir("/wamp64/tmp/Course_backup");
$table = "<table border=1px> ";
for ($i=2; $i < sizeof($ls) ; $i++) { 
    $table = $table . '
    <tr>
        <td> <a href="index.php?page=controller_course&op=restore_backup&file='. $ls[$i].'"> '. $ls[$i].' </a>  <td>
    </tr>
    ';

}   
$table = $table . "</table>";
?>
<div class="contenido">

    <h1> Restaurar backup</h1>
    <a href="index.php?page=controller_course&op=create_backup" class="Button_green"> Crear backup </a>

    <?php echo $table; ?>

    <a class="volver" href="index.php?page=controller_course&op=list">Volver</a>
</div>
