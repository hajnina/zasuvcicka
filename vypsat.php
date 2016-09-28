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
      $link=connect();
      $dotaz="SELECT * FROM $db_table";
      $vysledek=mysqli_query($link, $dotaz);
      $radku=mysqli_num_rows($vysledek);
      for($i=0;$i<$radku;$i++){
        $radek=mysqli_fetch_array();
        echo "<div style='background-color: black; color: white;'>";
        for ($j=0; $j<$radku; $j++){
          echo $radek[j]."<br />";
        }
        echo "</div>";
      }
    ?>
  </body>
</html>
