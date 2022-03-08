<?php
  $tietokantayhteys = mysqli_connect("", "kurssi", "kood10tus", "php2022");

  if (mysqli_connect_errno()) {
    echo "Yhteysvirhe tietokantaan: " . mysqli_connect_error();
  }

  mysqli_set_charset($tietokantayhteys,"utf8-fi");

  $sql = "SELECT * FROM roope_mietelauseet ORDER BY RAND()";
  $result = mysqli_query($tietokantayhteys, $sql);

  mysqli_query($tietokantayhteys, $sql)
    or die("Virhe: " . mysqli_error($tietokantayhteys));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MySQL-mietelause</title>
  <style>
    body{
      background-color:
      <?php
        while($row = mysqli_fetch_array($result) < 1){
          if ($row[1] == "Idän filosofit") {
            echo "green";
          } else {
            echo "blue";
          }
        }
      ?>;
    }
  </style>
</head>
<body>
  <h1>Mietelause</h1>
  <p>
    <?php
      print_r($row);
      while($row = mysqli_fetch_array($result)){
        echo "$row[mietelause]";
      }
    ?>
  </p>
  <h2>
    <?php
      while($row = mysqli_fetch_array($result)){
        echo "$row[kuka]";
      }
    ?>  
  </h2>
</body>
</html>