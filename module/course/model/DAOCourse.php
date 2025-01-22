<?php
    include("C:/wamp64/www/tema5/model/connect.php");

    class DAOCourse{
        function insert_course($valor){
            $name = $valor["nombre"];
            $description = $valor["descripcion"];
            $categoria = $valor["categoria"];
            $level = $valor["nivel"];
            $price = $valor["precio"];
            $start = $valor["start"];
            $end = $valor["end"];
            $buydate = $valor["buydate"]; 
            foreach ($valor['llenguatge'] as $single_languatge) {
                if(! isset($llenguatge)){
                    $llenguatge = "";
                }else{
                    $llenguatge = $llenguatge . ":";
                }
        	    $llenguatge = $llenguatge .  $single_languatge;
        	}

            $insert = "INSERT INTO course (nombre,description,categoria,llenguatge,level,price,start,end,buydate)
            Values('". $name. "','". $description. "','". $categoria. "','". $llenguatge. "','". $level. "','". $price ."','". $start."','". $end ."','". $buydate. "');";
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$insert);
            connect::close($conexio);       
            return $resultado;
        }
        function select_all_courses(){
            echo '<script> console.log("Ejecutado select_all_courses()")</script>';
            $select = "SELECT * FROM course ORDER BY id ASC";
            echo '<script> console.log("Select")</script>';
            $conexio = connect::con();
            echo '<script> console.log("Conexio")</script>';
            $resultado = mysqli_query($conexio,$select);
            connect::close($conexio);
            
            return $resultado;
        }
        function select_order($order){
            $select = "SELECT * FROM course $order";
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$select);
            connect::close($conexio);
            
            return $resultado;
        }
        function select_course($id){
            $select = "SELECT * FROM course WHERE id='$id'";
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$select)->fetch_object();
            connect::close($conexio);
            return $resultado;
        }
        function update_course($valor,$id){
            $name = $valor["nombre"];
            $description = $valor["descripcion"];
            $categoria = $valor["categoria"];
            $level = $valor["nivel"];
            $price = $valor["precio"];
            $start = $valor["start"];
            $end = $valor["end"];
            $buydate = $valor["buydate"];  
            foreach ($valor['llenguatge'] as $single_languatge) {
                if(! isset($llenguatge)){
                    $llenguatge = "";
                }else{
                    $llenguatge = $llenguatge . ":";
                }
        	    $llenguatge = $llenguatge .  $single_languatge;
        	}

            $update = "UPDATE course SET nombre='$name',description='$description',categoria='$categoria',llenguatge='$llenguatge',
            level='$level',
            price='$price',
            start='$start',
            end='$end',
            buydate='$buydate'
            WHERE id=$id";

            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$update);
            connect::close($conexio);
            return $resultado;
        }
        function delete_course($id){
            $delete = "DELETE FROM course WHERE id='$id'";
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$delete);
            connect::close($conexio);
            return $resultado;
        }
        function delete_all_courses(){
            $delete = "DELETE FROM course;";
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$delete);
            connect::close($conexio);
            return $resultado;
        }
        function backup(){
            $date = gmdate('Y-m-d H:i:s', time());
            $backup = "SELECT * INTO OUTFILE '/wamp64/tmp/Course_backup/backup_". $date .".sql' FROM course;";
            $backup = (str_replace(":","-",$backup));
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$backup);
            connect::close($conexio);
            return $resultado;
        }
        function restore_backup($file){
            $backup = 'LOAD DATA INFILE "/wamp64/tmp/Course_backup/'. $file .'" INTO table course;';
            $conexio = connect::con();
            $resultado = mysqli_query($conexio,$backup);
            connect::close($conexio);
            return $resultado;
        }

        function get_estructura(){
            $conexio = connect::con();
            $getTable = "SHOW TABLES FROM COURSE ;";
            $tableConsult = mysqli_query($conexio,$getTable);
            while($row = mysqli_fetch_array($tableConsult)){
                $tableName = $row[0];
            }
            $describe = "DESCRIBE ".$tableName.";";
            $describeConsulta = $conexio->query($describe);
            $estructura = array();
            while($row = mysqli_fetch_array($describeConsulta)){
                $estructura[] = $row['Field'];
            }
            return $estructura;
        }

        function get_id_array(){
            $estructura = DAOCourse::get_estructura();
            $selectID = "SELECT " .$estructura[0]. " FROM course;";
            $conexio = connect::con();
            $consultaID = $conexio->query($selectID);
            $IdArray = array();
            while($row = $consultaID->fetch_assoc()) {
                $IdArray[] = $row[$estructura[0]];
            } 
            return $IdArray;
        }



    }


?>