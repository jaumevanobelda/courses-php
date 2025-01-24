<?php
//include("model/DAOCourse.php");
$path = $_SERVER['DOCUMENT_ROOT']. '/tema5';
include($path. '/module/course/model/DAOCourse.php');

switch($_GET['op']){

    case 'list';

    try{
        $DAOCourse = new DAOCourse();
        $select = $DAOCourse->select_all_courses();
        $estructura = $DAOCourse->get_estructura();
    }catch (Exception $e){
        die('<script>window.location.href="index.php?page=503";</script>');
    }

    if($select == false){
        die('<script>window.location.href="index.php?page=503";</script>');
    }
    include("view/list_course.php");
    break;

    case 'create';
    //include("module/course/model/validate.php");
    //$issetLog = isset($_POST['create']);
    //echo "<script> console.log('$issetLog') </script>";
    //$logCreate = $_POST['create'];
    //echo "<script> console.log('post create $logCreate') </script>";
    if($_POST){
        echo "<script> console.log('issetCreate') </script>";

        //$validate = validate();
        include_once("module/course/model/validate.php");
        $validate = $continuar;
        echo "<script> console.log('validate = $validate') </script>";

        if($validate === false){
            echo "<script> console.log('Validate es false') </script>";
        }

        if($validate === true){
            
        echo "<script> console.log('Validate es true') </script>";

            try{
                $DAOCourse = new DAOCourse();
                $insert = $DAOCourse->insert_course($_POST);
            }catch (Exception $e){
                die('<script>window.location.href="index.php?page=503";</script>');
            }
            if($insert){
                echo '<script language="javascript">
            swal({
                title: "Exito!",
                text: "Creado en la base de datos correctamente",
                type: "success",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=controller_course&op=list";
                }, 2000);
             </script>';
            }else{
                die('<script>window.location.href="index.php?page=503";</script>');
            }

        }
    } else{
        include("view/create_course.php");  
    }   
    break;

    case 'update';

    //include("module/course/model/validate.php");
    if($_POST){
        //$validate = validate();
        include_once("module/course/model/validate.php");
        $validate = $continuar;

        if($validate === true){

            try{
                $DAOCourse = new DAOCourse();
                $update = $DAOCourse->update_course($_POST,$_GET['id']);
            }catch (Exception $e){
                die('<script>window.location.href="index.php?page=503";</script>');
            }
            if($update){
                echo '<script language="javascript">
            swal({
                title: "Exito!",
                text: "Actualizado en la base de datos correctamente",
                type: "success",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=controller_course&op=list";
                }, 2000);
             </script>';
            }else{
                die('<script>window.location.href="index.php?page=503";</script>');
            }

        }else{
            // echo '<script language="javascript">setTimeout(() => {
            //     window.location.href="index.php?page=controller_course&op=list";
            // }, 2000);</script>';
        }
    }
    try{
        $DAOCourse = new DAOCourse();
        $select = $DAOCourse->select_course($_GET['id']);
        $course = get_object_vars($select);
    }catch (Exception $e){
        die('<script>window.location.href="index.php?page=503";</script>');
    }

    if($select == false){
        die('<script>window.location.href="index.php?page=503";</script>');
    }
    include("view/update_course.php");
    break;

    case 'read_modal';
    //die('<script>window.location.href="index.php?page=503";</script>');
    try{
        $DAOCourse = new DAOCourse();
        $select = $DAOCourse->select_course($_POST['id']);
        $course = get_object_vars($select);
    }catch (Exception $e){
        echo json_encode("error");
    }

    if($select == false){
        echo json_encode("error");
    }
    echo json_encode($course);

    break;

    case 'delete';

    if (isset($_POST['delete'])){
        try{
            $DAOCourse = new DAOCourse();
            $delete = $DAOCourse->delete_course($_GET['id']);
        }catch (Exception $e){
            die('<script>window.location.href="index.php?page=503";</script>');
        }
        if($delete){
            // echo '<script language="javascript">setTimeout(() => {
            //     toastr.success("Borrado en la base de datos correctamente");
            // }, 1000);
            //     setTimeout(() => {
            //     window.location.href="index.php?page=controller_course&op=list";
            // }, 2000);</script>';
            echo '<script language="javascript">
            swal({
                title: "Exito!",
                text: "Curso borrado correctamente",
                type: "success",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=controller_course&op=list";
                }, 2000);
             </script>';
             die();
        }else{
            die('<script>window.location.href="index.php?page=503"; ');
        }


    } 
    include("view/delete_course.php");
    break;

    case 'delete_all';

    if (isset($_POST['delete'])){

        try{
            $DAOCourse = new DAOCourse();
            $backup = $DAOCourse->backup();
        }catch (Exception $e){
            echo '<script language="javascript">
            swal({
                title: "Ha ocurrido un error!",
                text: "Fallo al crear un backup",
                type: "error",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=503";
                }, 2000);
             </script>';
        }
        try{
            $DAOCourse = new DAOCourse();
            $delete = $DAOCourse->delete_all_courses();
        }catch (Exception $e){
            die('<script>window.location.href="index.php?page=503";</script>');
        }
        if($delete){
            die ('<script language="javascript">swal({
            title:"Exito!",
            text:"Se han borrado los cursos correctamente",
            type:"success",
            timer:2000});
                setTimeout(() => {
                window.location.href="index.php?page=controller_course&op=list";
            }, 2000);</script> <h1> Borrando los cursos </h1>');
            
        }else{
            die('<script>window.location.href="index.php?page=503"; ');
        }


    } 
    include("view/delete_all_courses.php");
    break;

    case 'restore_backup';

    if(isset($_GET['create'])){
        echo '<script language="javascript">setTimeout(() => {
        toastr.success("Backup creado correctamente");
    }, 100);</script>';
    }

    if(!isset($_GET['file'])){
        include("view/restore_backup.php");
    } else{
        echo "<h1> Restaurando backup </h1>";
        try{
            $date = gmdate('Y-m-d H:i:s', time());
            $DAOCourse = new DAOCourse();
            $backup = $DAOCourse->backup();
        }catch (Exception $e){
            echo '<script language="javascript">
            swal({
                title: "Ha ocurrido un error!",
                text: "Fallo al restaurar un backup",
                type: "error",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=503";
                }, 2000);
             </script>';
        }
        try{
            $DAOCourse = new DAOCourse();
            $delete = $DAOCourse->delete_all_courses();
        }catch (Exception $e){
            die('<script>window.location.href="index.php?page=503";</script>');
        }
        try{
            $DAOCourse = new DAOCourse();
            $delete = $DAOCourse->restore_backup($_GET['file']);
        }catch (Exception $e){
            echo '<script language="javascript">
            swal({
                title: "Ha ocurrido un error!",
                text: "Fallo al restaurar un backup",
                type: "error",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=503";
                }, 2000);
             </script>';
        }
        if(!$delete){
            $date = (str_replace(":","-",$date));
            try{
                $DAOCourse = new DAOCourse();
                $delete = $DAOCourse->restore_backup("/wamp64/tmp/Course_backup/$date");
            }catch (Exception $e){
                die('<script>window.location.href="index.php?page=503";</script>');
            }
            echo '<script language="javascript">
            swal({
                title: "Ha ocurrido un error!",
                text: "Fallo al restaurar un backup",
                type: "error",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=503";
                }, 2000);
             </script>';
        }
        echo '<script language="javascript">
            swal({
                title: "Exito!",
                text: "Backup restaurado correctamente",
                type: "success",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=controller_course&op=list";
                }, 2000);
             </script>';
    }
    break;

    case 'create_backup';
    echo "<h1> creando backup </h1>";

    try{
        $DAOCourse = new DAOCourse();
        $backup = $DAOCourse->backup();
    }catch (Exception $e){
        echo '<script language="javascript">
        swal({
            title: "Ha ocurrido un error!",
            text: "Fallo al restaurar un backup",
            type: "error",
            timer: 2000
        });
         setTimeout(() => {
                window.location.href="index.php?page=503";
            }, 2000);
         </script>';
    }
    echo '<script language="javascript">
    swal({
        title: "Exito!",
        text: "Backup creado correctamente",
        type: "success",
        timer: 2000
    });
     setTimeout(() => {
            window.location.href="index.php?page=controller_course&op=restore_backup";
        }, 2000);
     </script>';
    break;

    case 'dummies';
    include_once("module\course\model\dummies.php");
    $dummies = dummies();

    // include_once("module/course/model/validate.php");
    // $validate = $continuar;
    // echo "<script> console.log('validate = $validate') </script>";

    // if($validate === false){
    //     echo "<script> console.log('Validate es false') </script>";
    // }

    // if($validate === true){
        
    // echo "<script> console.log('Validate es true') </script>";

        try{
            $DAOCourse = new DAOCourse();
            $insert = $DAOCourse->insert_course($dummies);
        }catch (Exception $e){
            die('<script>window.location.href="index.php?page=503";</script>');
        }
        if($insert){
            echo '<script language="javascript">
            swal({
                title: "Exito!",
                text: "Dummies creados correctamente",
                type: "success",
                timer: 2000
            });
             setTimeout(() => {
                    window.location.href="index.php?page=controller_course&op=list";
                }, 2000);
             </script>';
        }else{
            die('<script>window.location.href="index.php?page=503";</script>');
        }

    // } else{
    //     echo '<script language="javascript">
    //     toastr.success("ha ocurrido un fallo");
    //     window.location.href="index.php?page=controller_course&op=list"; </script>';
    // }
    break;


    default;
    include("view/inc/error404.php");
    break;
    
}