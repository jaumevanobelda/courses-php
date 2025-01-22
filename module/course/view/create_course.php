<?php
$array_error = array('error_nombre','error_descripcion','error_categoria','error_nivel','error_precio','error_start','error_end','error_buydate','error_llenguatge');

foreach ($array_error as $error){
    if(!isset ($$error)){
        $$error = "";
    }
}
?>

<div id="contenido"> </div>

<form autocomplete="on" method="post" name="create_course" id="create_course" 
    action="index.php?page=controller_course&op=create">

    <h3> Crear usuario</h3>

    <table>

        <tr>
            <td>nombre: </td>
            <td> <input type="text" id="nombre" name="nombre" required> </td>
            <td>
                <p class="error" id="error_nombre"> <?php echo $error_nombre; ?> </p>
            </td>

        </tr>
        <tr>
            <td>descripcion: </td>
            <td> <input type="text" id="descripcion" name="descripcion" required> </td>
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
                        <td><input type="radio" id="categoria" name="categoria" value="Backend">Backend</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="radio" id="categoria" name="categoria" value="Frontend">Frontend</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="radio" id="categoria" name="categoria" value="fullstack">fullstack</input> </td>
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
                <!-- <select multiple id="llenguatge" name="llenguatge" required> -->
                        <td><input type="checkbox" id="llenguatge" name="llenguatge[]" value="javascript">javascript</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="php">php</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="phyton">phyton</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="java">java</input> </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" id="llenguatge" name="llenguatge[]" value="c++">c++</input> </td>
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
            <td> <input type="number" id="precio" name="precio" required> </td>
            <td>
                <p class="error" id="error_precio"> <?php echo $error_precio; ?> </p>
            </td>

        </tr>
        <tr>
            <td>Fecha de inicio: </td>
            <td> <input type="text" class="fecha" id="start" name="start" required> </td>
            <td>
                <p class="error" id="error_start"> <?php echo $error_start; ?> </p>
            </td>

        </tr>
        <tr>
            <td>Fecha final: </td>
            <td> <input type="text" class="fecha" id="end" name="end" required> </td>
            <td>
                <p class="error" id="error_end"> <?php echo $error_end; ?> </p>
            </td>

        </tr>
        <tr>
            <td>Fecha de compra: </td>
            <td> <input type="text" class="fecha" id="buydate" name="buydate" required> </td>
            <td>
                <p class="error" id="error_buydate"> <?php echo $error_buydate; ?> </p>
            </td>

        </tr>

        <tr>

            <td> <button onclick="validate('create')"> enviar </button> </td>
        </tr>
        <tr>
            <td> <a href="index.php?page=controller_course&op=list">Volver</a> </td>

        </tr>
    </table>
</form>
</div>