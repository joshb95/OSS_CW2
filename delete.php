<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   if (isset ($_POST ['delete'])) {
   $chkarr = $_POST ['checkbox'];
   foreach ($chkarr as $studentid) {
     mysqli_query ($conn, "Delete From student Where studentid = $studentid");
   }
   header ("Location:students.php");
   }
   ?>
