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
      $data['content'] .= "<tr><th>ID</th><th>DOB</th><th>FirstName</th><th>Surname</th><th>House</th><th>Town</th><th>County</th><th>Country</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid] </td><td> $row[dob] </td><td> $row[firstname] </td><td> $row[lastname] </td><td> $row[house] </td><td> $row[town] </td><td> $row[county] </td><td> $row[country] </td></tr>";
      }
      $data['content'] .= "</table>";


      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>

<script type="text/javascript" src="js/jquery-1.6.2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#checkBoxAll').click(function() {
			if ($(this).is(":checked"))
				$('.chkCheckBoxId').prop('checked', true);
			else
				$('.chkCheckBoxId').prop('checked', false);
		});
	});
</script>
<?php

if(isset($_POST['buttonDelete'])) {
	if(isset($_POST['studentid'])) {
		foreach ($_POST['studentid'] as $sudentid) {
			$stmt = $conn->prepare('delete from student where studentid = :studentid');
			$stmt->bindValue('studentid', $studentid);
			$stmt->execute();
		}
	}
}
$stmt = $conn->prepare('select * from student');
$stmt->execute();
?>
<form method="post" action="index.php">
	<input type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')" />
	<table cellpadding="2" cellspacing="2" border="1">
		<tr>
			<th><input type="checkbox" id="checkBoxAll" /></th>
			<th>ID</th>
			<th>DOB</th>
			<th>FirstName</th>
      <th>Surname</th>
      <th>House</th>
      <th>Town</th>
      <th>County</th>
      <th>Country</th>
		</tr>
		<?php while($studentid = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
		<tr>
			<td><input type="checkbox" class="chkCheckBoxId"
				value="<?php echo $studentid->studentid; ?>" name="studentid[]" /></td>
			<td><?php echo $studentid->dob; ?></td>
			<td><?php echo $studentid->firstname; ?></td>
			<td><?php echo $studentid->lastname; ?></td>
      <td><?php echo $studentid->house; ?></td>
      <td><?php echo $studentid->town; ?></td>
      <td><?php echo $studentid->county; ?></td>
      <td><?php echo $studentid->country; ?></td>
		</tr>
		<?php } ?>
	</table>
</form>
