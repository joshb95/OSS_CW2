<?php include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc"); ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<form action="addstudent.php" method="post">
  Add Student Details
<br><br>
Student ID:<input type ="text" name="ID">
<br><br>
Date Of Birth:<input type ="text" name="DOB">
<br><br>
First Name:<input type ="text" name="FirstName">
<br><br>
Surname:<input type ="text" name="Surname">
<br><br>
House:<input type ="text" name="House">
<br><br>
Town:<input type ="text" name="Town">
<br><br>
County:<input type ="text" name="County">
<br><br>
Country:<input type ="text" name="Country">
<br><br>
Postcode:<input type ="text" name="Postcode">
<br><br>
<input type ="submit" value="Insert">
</form>
</body>
</html>
