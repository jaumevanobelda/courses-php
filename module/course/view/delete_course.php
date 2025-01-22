<div id="contenido">

    <form autocomplete="on" method="post" name="delete_course" id="delete_course" action="index.php?page=controller_course&op=delete&id=<?php echo $_GET['id']; ?>"
        <table>
        <tr>
            <td align="center" colspan="2"> <h2> Estas seguro se que quieres borrar el curso: <?php echo $_GET['nombre']; echo " con el id: " . $_GET['id']; ?>? </h2> </td>        
        </tr>
        <tr>
        <td align="center"><button type="submit" class="Button_red"name="delete" id="delete">Aceptar</button></td>
        <td align="center"><a class="Button_green" href="index.php?page=controller_course&op=list">Cancelar</a></td>

        </tr>


        </table>

    </form>

</div>