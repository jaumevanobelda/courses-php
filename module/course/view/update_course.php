<?php
$array_error = array('error_nombre','error_descripcion','error_categoria','error_llenguatge','error_nivel','error_precio','error_start','error_end','error_buydate');

foreach ($array_error as $error){
    if(!isset ($$error)){
        $$error = "";
    }
}
?>

<div id="contenido"> 
<form autocomplete="on" method="post" name="update_course" id="update_course"
    action="index.php?page=controller_course&op=update&id=<?php echo $_GET['id']; ?> ">

    <h3>Cambiar usuario</h3>
   
    <table>
    <!-- <tr>
        <td>Id:</td>
        <td><input type="text" id="id" name="id" placeholder="id" value="<?php //echo $course['id'];?>" readonly/></td>
    </tr> -->

        <tr>
            <td>nombre: </td>
            <td> <input type="text" id="nombre" name="nombre" value="<?php echo $course['nombre']; ?>" required> </td>
            <td>
                <p class="error" id="error_nombre"> <?php echo $error_nombre; ?> </p>
            </td>

        </tr>
        <tr>
            <td>descripcion: </td>
            <td> <input type="text" id="descripcion" name="descripcion" value="<?php echo $course['description']; ?>" required> </td>
            <td>
                <p class="error" id="error_descripcion"> <?php echo $error_descripcion; ?> </p>
            </td>

        </tr>
        <tr>
            <td>categoria: </td>
            <td>        
                <table>
                    <tr>
                <!-- <select multiple id="categoria" name="categoria" required> -->
                        <td><input type="radio" id="categoria" name="categoria" value="Backend" <?php if($course['categoria'] === "Backend" ){ echo "checked";}?> >Backend</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="radio" id="categoria" name="categoria" value="Frontend" <?php if($course['categoria'] === "Frontend" ){ echo "checked";}?> >Frontend</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="radio" id="categoria" name="categoria" value="fullstack"<?php if($course['categoria'] === "fullstack" ){ echo "checked";}?> >fullstack</input> </td>
                    </tr>
                    <!-- <option value="Fullstack">Fullstack</option> -->
                </table>
            </td>
            <td>
                <p class="error" id="error_categoria"> <?php echo $error_categoria; ?> </p>
            </td>

        </tr>

        <tr>
            <td>llenguatge: </td>
            <td>        
                <table>
                    <tr>
                        <?php
                         $llenguatge=explode(":", $course['llenguatge']);
                          ?>
                <!-- <select multiple id="llenguatge" name="llenguatge" required> -->
                        <td><input type="checkbox" id="llenguatge" name="llenguatge[]" value="javascript"  <?php if( in_array("javascript",$llenguatge) ){ echo "checked";}?>  >javascript</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="php" <?php if( in_array("php",$llenguatge) ){ echo "checked";}?>>php</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="phyton" <?php if( in_array("phyton",$llenguatge) ){ echo "checked";}?>>phyton</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="java" <?php if( in_array("java",$llenguatge) ){ echo "checked";}?>>java</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="c++" <?php if( in_array("c++",$llenguatge) ){ echo "checked";}?>>c++</input> </td>
                    </tr>
                    <!-- <option value="Fullstack">Fullstack</option> -->
                </table>
            </td>
            <td>
                <p class="error" id="error_llenguatge"> <?php echo $error_llenguatge; ?> </p>
            </td>

        </tr>
        <tr>
            <td>nivel: </td>
            <td>
                <select id="nivel" name="nivel" required>
                    <option value="bajo">bajo</option>
                    <option value="medio">medio</option>
                    <option value="alto">alto</option>
                </select>
            </td>
            <td>
                <p class="error" id="error_nivel"> <?php echo $error_nivel; ?> </p>
            </td>

        </tr>
        <tr>
            <td>precio: </td>
            <td> <input type="number" id="precio" name="precio" value="<?php echo $course['price']; ?>" required> </td>
            <td>
                <p class="error" id="error_precio"> <?php echo $error_precio; ?> </p>
            </td>

        </tr>
        <tr>
            <td>Fecha de inicio: </td>
            <td> <input type="text" class="fecha" id="start" name="start" value="<?php echo $course['start']; ?>" required> </td>
            <td>
                <p class="error" id="error_start"> <?php echo $error_start; ?> </p>
            </td>
        </tr>
        <tr>
            <td>Fecha final: </td>
            <td> <input type="text" class="fecha" id="end" name="end" value="<?php echo $course['end']; ?>" required> </td>
            <td>
                <p class="error" id="error_end"> <?php echo $error_end; ?> </p>
            </td>

        </tr>
        <tr>
            <td>Fecha de compra: </td>
            <td> <input type="text" class="fecha" id="buydate" name="buydate" value="<?php echo $course['buydate']; ?>" required> </td>
            <td>
                <p class="error" id="error_buydate"> <?php echo $error_buydate; ?> </p>
            </td>

        </tr>

        <tr>

            <td> <button onclick="validate('update')"> enviar </button> </td>
        </tr>
        <tr>
            <td> <a href="index.php?page=controller_course&op=list">Volver</a> </td>

        </tr>
    </table>
</form>
</div>