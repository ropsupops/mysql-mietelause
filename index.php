<?php
  $tietokantayhteys = mysqli_connect("", "kurssi", "kood10tus", "php2022");

  if (mysqli_connect_errno()) {
    echo "Yhteysvirhe tietokantaan: " . mysqli_connect_error();
  }

  mysqli_set_charset($tietokantayhteys,"utf8");

  $sql = "SELECT * FROM roope_mietelauseet ORDER BY RAND()";
  $result = mysqli_query($tietokantayhteys, $sql);

  mysqli_query($tietokantayhteys, $sql)
    or die("Virhe: " . mysqli_error($tietokantayhteys));
?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL-mietelause</title>
  <style>
    body{
      background-color:
      <?php
        while($row = mysqli_fetch_array($result)){
          $aihe = $row["aihe"]; 
          $kuka = $row["kuka"];
          $mietelause = $row["mietelause"];
          $alkuperä = $row["alkuperä"];
        }

        if ($aihe == "Filosofia") {
          echo "lightgreen";
        } else {
          echo "lightblue";
        }
      ?>
      ;
    }
  </style>
  <link rel="stylesheet" href="/styles.css">
</head>
<body>
  <div class="content">
    <h1>Mietelause</h1>
    <p>
      <span class="quote">"</span>
        <?php
          echo $mietelause;
        ?>
      <span class="quote">"</span>
    </p>
    <h2>
      <?php
        echo $kuka . "<br>" . $alkuperä . "<br>" . $aihe;
      ?>  
    </h2>
  </div>
</body>
</html>