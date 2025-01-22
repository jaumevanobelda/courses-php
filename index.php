<!DOCTYPE html>
<html lang="es">
    <head> 
    <?php 
        if(isset($_GET['page']) && ($_GET['page'] === "controller_course")){
            include("view/inc/top_page_course.php");
        }else{
            include("view/inc/top_page.php"); 
        }
        session_start();
    ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <?php
                    include("view/inc/header.php");
                ?>
            </div>

            <div id="menu">
                <?php
                    include("view/inc/menu.php");
                ?>
            </div>

            <div id="page">
                <?php
                    include("view/inc/pages.php");
                ?>
                <br>
            </div>
        </div>
    <?php
        include("view/inc/bottom_page.php");
    ?>
    </body>
</html>
