<?php

include_once("utils/random.php");

function dummies(){
    do {
        $nombre = string(rand(5,12));
        $res_nombre=null;
        $select_nombre = "SELECT * FROM course WHERE nombre='$nombre'";
        $conexio = connect::con();  
        $res_nombre = mysqli_query($conexio, $select_nombre)->fetch_object();
    } while (isset($res_nombre));
    $descripcion = string(rand(5,15));

    switch (rand(0,2)){
        case 0;
        $categoria = "frontend";
        break;
        case 1;
        $categoria = "backend";
        break;
        case 2;
        $categoria = "fullstack";
        break;
    }

    $array_llenguatge = array('javascript','php','phyton','java','c++');
    $llenguatge = null;
        foreach ($array_llenguatge as $lleng ) {
            if(rand(0,1) === 0){
                $llenguatge[] = $lleng;
        }
    }
        if(!isset($llenguatge)){
            $llenguatge[] = $array_llenguatge[rand(0,4)];
        }
    switch (rand(0,2)){
            case 0;
            $nivel = "bajo";
            break;
            case 1;
            $nivel = "medio";
            break;
            case 2;
            $nivel = "alto";
            break;
        }

        $precio = rand(200,2000);

        $start = rand(strtotime(date('Y-m-d', strtotime(' 6 months'))),strtotime(date('Y-m-d', strtotime(' 3 years'))));
        $end = rand($start,strtotime(date('Y-m-d', strtotime(' 4 years'))));
        $buydate = rand(strtotime(date('Y-m-d', strtotime(' -1 years'))),strtotime(date('Y-m-d', strtotime(' -2 months'))));
        $start = date("d/m/Y",$start);
        $end = date("d/m/Y",$end);
        $buydate = date("d/m/Y",$buydate);
        return['nombre'=> $nombre, 'descripcion'=>$descripcion,'llenguatge'=>$llenguatge,'categoria'=>$categoria,'nivel' => $nivel,'precio'=>$precio,'start'=>$start,'end' => $end,'buydate'=>$buydate  ];

}



?>