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
<html lang="fi">
<head>
  <title>MySQL-mietelause</title>
  <style>
    body{
      background-color:
      <?php
        while($row = mysqli_fetch_array($result) and $counter < 1){
          $alkuperä[] = $row["alkuperä"];
          $counter=0; 
        
          if ($alkuperä[1] == "Antiikin Kreikka") {
            echo "green";
            $counter++;
          } else {
            echo "blue";
            $counter++;
          }
        }
      ?>
      ;
    }
  </style>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="content">
    <h1>Mietelause</h1>
    <p>
      <span class="quote">"</span>
        <?php
        while($row = mysqli_fetch_array($result)){
          $kuka[] = $row["kuka"];
          $mietelause[] = $row["mietelause"];
        }
          echo $mietelause[1];
        ?>
      <span class="quote">"</span>
    </p>
    <h2>
      <?php
        echo $kuka[1];
      ?>  
    </h2>
  </div>
</body>
</html>