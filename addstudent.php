<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
// check logged in
$id = mysqli_real_escape_string($conn, $_POST['ID'] );
$DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
$fn = mysqli_real_escape_string($conn, $_POST['FirstName']);
$ln = mysqli_real_escape_string($conn, $_POST['Surname']);
$house = mysqli_real_escape_string($conn, $_POST['House']);
$town = mysqli_real_escape_string($conn, $_POST['Town']);
$county = mysqli_real_escape_string($conn, $_POST['County']);
$country = mysqli_real_escape_string($conn, $_POST['Country']);
$postcode = mysqli_real_escape_string($conn, $_POST['Postcode']);


$sql = "INSERT INTO Student (studentid, dob, firstname, lastname, house, town, county, country, postcode)
VALUES ('$id', '$DOB', '$fn', '$ln', '$house', '$town', '$county', '$country', '$postcode')";
if (mysqli_query($conn, $sql)) {
      echo "Record added successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

echo template("templates/partials/footer.php");
?>
