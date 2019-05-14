<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * from student";

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th colspan='8' align='center'>Students</th></tr>";
      $data['content'] .= "<tr><th></th><th>ID</th><th>DOB</th><th>FirstName</th><th>Surname</th><th>House</th><th>Town</th><th>County</th><th>Country</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td><input type='checkbox' name='checkbox[]' value='".$row['studentid']."'> </td> <td> $row[studentid] </td><td> $row[dob] </td><td> $row[firstname] </td><td> $row[lastname] </td><td> $row[house] </td><td> $row[town] </td><td> $row[county] </td><td> $row[country] </td></tr>";
      }
      $data['content'] .= "</table>";


      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
<input type="submit" name="delete" id="delete" value="Delete Records">
