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
         <header id="header" class="header d-flex align-items-center fixed-top">
                <?php
                    include("view/inc/header.php");
                ?>
            

            <!-- <div id="menu"> -->
                <?php
                    include("view/inc/menu.php");
                ?>
        </header>
            <!-- </div> -->

            <div id="page">
                <div class="hero">
                <?php
                    include("view/inc/pages.php");
                ?>
                <br>
            </div>
            </div>
        </div>
    <?php
        include("view/inc/bottom_page.php");
    ?>
    </body>
</html>
