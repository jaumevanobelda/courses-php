<div id="contenido">

    <h1> Datos del curso</h1>

    <table border="2">

    <tr>
        <td>id: </td>
        <td> <?php echo $course['id'] ?>   </td>
    </tr>
    <tr>
        <td>nombre: </td>
        <td> <?php echo $course['nombre'] ?>   </td>
    </tr>
    <tr>
        <td>descripcion: </td>
        <td> <?php echo $course['description'] ?>   </td>
    </tr>
    <tr>
        <td>categoria: </td>
        <td> <?php echo $course['categoria'] ?>   </td>
    </tr>
    <tr>
        <td>llenguatges: </td>
        <td> <?php echo $course['llenguatge'] ?>   </td>
    </tr>
    <tr>
        <td>nivel: </td>
        <td> <?php echo $course['level'] ?>   </td>
    </tr>
    <tr>
        <td>precio: </td>
        <td> <?php echo $course['price'] ?>   </td>
    </tr>
    <tr>
        <td>fecha de inicio: </td>
        <td> <?php echo $course['start'] ?>   </td>
    </tr>
    <tr>
        <td>fecha final: </td>
        <td> <?php echo $course['end'] ?>   </td>
    </tr>
    <tr>
        <td>Fecha de compra: </td>
        <td> <?php echo $course['buydate'] ?>   </td>
    </tr>

    </table>

    <a class="volver" href="index.php?page=controller_course&op=list">Volver</a>



</div>