<?php
  $tietokantayhteys = mysqli_connect("", "kurssi", "kood10tus", "php2022");

  if (mysqli_connect_errno()) {
    echo "Yhteysvirhe tietokantaan: " . mysqli_connect_error();
  }

  mysqli_set_charset($tietokantayhteys,"utf8-fi");

  $sql = "SELECT * OR BY RAND() FROM roope_mietelauseet";
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
        while($row = mysqli_fetch_array($result)){
          if ($row[4] == "Idän filosofit") {
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
      while($row = mysqli_fetch_array($result)){
        echo "$row[3]";
      }
    ?>
  </p>
  <h2>
    <?php
      while($row = mysqli_fetch_array($result)){
        echo "$row[1]";
      }
    ?>  
  </h2>
</body>
</html>