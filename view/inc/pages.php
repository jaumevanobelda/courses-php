<?php

    if(!isset($_GET['page'])){
        include("module/inicio/view/inicio.php");
        die();
    }
    switch($_GET['page']){
		case "homepage";
			include("module/inicio/view/inicio.php");
			break;
		case "controller_course";
			include("module/course/controller_course.php");
			break;
		case "services";
			include("module/services/services.php");
			break;
		case "aboutus";
			include("module/aboutus/aboutus.php");
			break;
		case "contactus";
			include("module/contact/contactus.php");
			break;
		case "404";
			include("view/inc/error404.php");
			break;
		case "503";
			include("view/inc/error503.php");
			break;
		default;
			include("module/inicio/view/inicio.php");
			break;        
    }
?>