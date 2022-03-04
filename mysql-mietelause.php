<!DOCTYPE html>
<html lang="en">
<head>
 <title>MySQL-mietelause</title>
</head>
<body>
 
 <?php
$tietokantayhteys = 
  mysqli_connect("", "kurssi", "kood10tus", "php2022");

if (mysqli_connect_errno()) {
  echo "Yhteysvirhe tietokantaan: " . mysqli_connect_error();
}

mysqli_set_charset($tietokantayhteys,"utf8-fi");

$sql = "SELECT * FROM roope_mietelauseet";
$result = mysqli_query($tietokantayhteys, $sql);

mysqli_query($tietokantayhteys, $sql)
  or die("Virhe: " . mysqli_error($tietokantayhteys));
?>
 
</body>
</html>