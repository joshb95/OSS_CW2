<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   function show_confirm22()
       {
       var c=confirm("The entry will be parmanently deleted!");
       if (c==true)
       {return true;
       }
       else
       {
       return false;
       }
       }

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
      $data['content'] .= "<tr><th>ID</th><th>DOB</th><th>FirstName</th><th>Surname</th><th>House</th><th>Town</th><th>County</th><th>Country</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid] </td><td> $row[dob] </td><td> $row[firstname] </td><td> $row[lastname] </td><td> $row[house] </td><td> $row[town] </td><td> $row[county] </td><td> $row[country] </td></tr>";
      }
      $data['content'] .= "</table>";

      <div style="margin-top:20px;">
              <div style=" float:left;">
                <input name="delete" type="submit" id="delete" value="Delete" onClick="return show_confirm22();" style="background:#F52126; color:#fff; border:none; font-size:12px; padding:4px 8px;">
                &nbsp;<input type="checkbox" id="selectall"/> Check All
              </div>
              <div style="clear:both;"></div>
         </div>

         
      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
