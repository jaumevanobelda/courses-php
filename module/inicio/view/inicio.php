<!-- <img src="view/img/bienvenido.png"> -->
<?php
include("module/course/model/DAOCourse.php");
include("module/inicio/table_course");
$DAOCourse = new DAOCourse();   
$select = $DAOCourse->select_order("ORDER BY `price` limit 3;");
echo '<h1 style= text-align:center;> Top 3 cursos mas baratos </h1> <div id="top_courses"> ';
foreach ($select as $course) {
    echo table_course($course);
}
?>
</div>
<?php include("module\inicio/view\index.php"); ?>
