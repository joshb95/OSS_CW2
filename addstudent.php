<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
// check logged in
$id = $_POST['ID'];
$DOB = $_POST['DOB'];
$fn = $_POST['FirstName'];
$ln = $_POST['Surname'];
$house = $_POST['House'];
$town = $_POST['Town'];
$county = $_POST['County'];
$country = $_POST['Country'];
$postcode = $_POST['Postcode'];

$id = $mysqli->real_escape_string($conn, $id);
$DOB = $mysqli->real_escape_string($conn, $DOB);
$fn = $mysqli->real_escape_string($conn, $fn);
$ln = $mysqli->real_escape_string($conn, $ln);
$house = $mysqli->real_escape_string($conn, $house);
$town = $mysqli->real_escape_string($conn, $town);
$county = $mysqli->real_escape_string($conn, $county);
$country = $mysqli->real_escape_string($conn, $country);
$postcode = $mysqli->real_escape_string($conn, $postcode);



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
