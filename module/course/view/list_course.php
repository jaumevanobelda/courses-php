<?php

$table = '<table id="table_list" > <tr>';
$i = 0;
foreach ($estructura as $columna){
    $table = $table . "<td class='td$columna'> $columna </td>";
    $i = $i + 1;
}
$table = $table . "<td></td> </tr>";

foreach($select as $row){
    $table = $table . "
    <tr>";
    $i = 0;
    foreach($estructura as $elemento){
        $table = $table . "<td  class='td$elemento'>". $row[$elemento]."</td>";
        $i = $i + 1;
    }

   $table = $table . '<td class="table_button"> <div class="read_course"  id="'. $row['id'] .'">Read One </div>';
   $table = $table . '     <a class="Button_green" href="index.php?page=controller_course&op=update&id='. $row['id'] .'">Update </a> ';
   $table = $table . '     <a class="Button_red" href="index.php?page=controller_course&op=delete&id='. $row['id'] .'&nombre='. $row['nombre'] .'">Delete </a> </td>';
   $table = $table . "</tr>";
   
}
$table = $table . "</table>";

?>

<div class="contenido">

    <h1> Lista de usuarios </h1>
    <div id="div_botones">
        <a href="index.php?page=controller_course&op=create"> <img src="view/img/anadir.png"> </a>
        <a href="index.php?page=controller_course&op=delete_all" class="Button_red" > Borrar todos los cursos </a>
        <a href="index.php?page=controller_course&op=restore_backup" class="Button_blue" > Restaurar backup </a>
        <a href="index.php?page=controller_course&op=dummies" class="Button_green" > Crear dummies </a>
    </div>
    <?php 
    echo $table;

    ?>
<style>
.tdnombre { max-width:150px; ;}
.tdid {display:none;}
.tddescription {display:table-cell; max-width:200px;}
/* .tdllenguatge {display:none;}
.tdstart {display:none;}
.tdend {display:none;}
.tdbuydate {display:none;} */
</style>


<section id="readone" >
    <!-- <div id="readonediv" style="display: none;">

    <table border=2>
        <tr>
            <td>nombre: </td>
            <td id="nombre"></td>
        </tr>
        <tr>
            <td>descripcion: </td>
            <td id="description"></td>
        </tr>
        <tr>
            <td>categoria: </td>
            <td id="categoria"></td>
        </tr>
        <tr>
            <td>llenguatges: </td>
            <td id="llenguatge"></td>
        </tr>
        <tr>
            <td>nivel: </td>
            <td id="level"></td>
        </tr>
        <tr>
            <td>precio: </td>
            <td id="price"></td>
        </tr>
        <tr>
            <td>fecha de inicio: </td>
            <td id="start"></td>
        </tr>
        <tr>
            <td>fecha final: </td>
            <td id="end"></td>
        </tr>
        <tr>
            <td>Fecha de compra: </td>
            <td id="buydate"></td>
        </tr>

        </table> </div>




    </div> -->


</section>





</div>


