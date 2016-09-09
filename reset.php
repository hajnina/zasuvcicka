<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title></title>
    <meta charset='utf-8'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link href='/favicon.png' rel='shortcut icon' type='image/png'>
  </head>
  <body>
    <?php
      include "utilities.php";
      //echo $admin;
      $link=connect();
      $dotaz="DROP TABLE $db_table";
      if(mysqli_query($link, $dotaz)){debug ("OK - Tabulka $db_table byla úspěšně smazána");}
      else{
        debug("NOTICE - tabulka $db_table nebyla úspěšně smazána pravděpodobně proto, že ještě neexistuje $dotaz");
      }
      $dotaz="CREATE TABLE $db_table (
        Id INT UNIQUE PRIMARY KEY,
        Name TEXT,
        Zasuvka INT,
        Wifina INT,
        LatLon TEXT,
        Confirms INT,
        Reports INT,
        Obrazek TEXT
      );";
      if(mysqli_query($link, $dotaz)){echo "OK - Tabulka $db_table byla úspěšně vytvořena";}
      else{
        echo "ERROR - tabulka $db_table nebyla vytvořena";
      }
    ?>
  </body>
</html>
