<?php
  include "login.php";
  $vypisovat = false;
  function debug($hlaska){
    global $vypisovat;

    if($vypisovat){
      echo "<div style='background-color: black; color: white;'>$hlaska</div>";
    }
  }

  function connect(){
    global $db_address, $db_username, $db, $db_password;

    $link=mysqli_connect($db_address,$db_username,$db_password,$db);
    if(!$link){
      debug("ERROR - Připojení k databázi se nepodařilo...");
    }
    else{
      debug("OK - připojeno");
    }
    return $link;
    }

  function findNearest($latlonUzivatele,$pocet=2){
    global $db_table;

    $link=connect();
    $dotaz="SELECT * FROM $db_table";
    $vysledek=mysqli_query($link,$dotaz);
    if(!$vysledek){debug("při vyhledávání wifin nastal problém");return [];}
    $radku=mysqli_num_rows($vysledek);
    $sloupcu=mysqli_num_fields($vysledek);
    if($radku==0){debug("nenalezeny žádné wifiny");return [];}
    for($i=0; $i<$radku; $i++){
      $radek=mysqli_fetch_array($vysledek);
      for($j=0; $j<$sloupcu; $j++){
        $latlon[$i][$j]=$radek[$j];
      }
    }

    $bubla=true;
    while($bubla){
      $bubla=false;
      for ($i=1; $i<$radku; $i++){
        $vzdalenost1=distance($latlonUzivatele,$latlon[$i-1][4]);
        $vzdalenost2=distance($latlonUzivatele,$latlon[$i][4]);
        if($vzdalenost2<$vzdalenost1){
          $bubla=true;
          $promenna=$latlon[$i-1];
          $latlon[$i-1]=$latlon[$i];
          $latlon[$i]=$promenna;
        }
      }
    }
    return $latlon;
  }

  function distance($latlon1, $latlon2){
    $lat1=explode(",",$latlon1)[0];
    $lon1=explode(",",$latlon1)[1];
    $lat2=explode(",",$latlon2)[0];
    $lon2=explode(",",$latlon2)[1];
    return sqrt(abs($lat1-$lat2)*abs($lat1-$lat2)+abs($lon1-$lon2)*abs($lon1-$lon2));
  }

  function addSpot($name, $latlon, $maZasuvku, $maWifi, $obrazek){
    global $db_table;
    $link=connect();
    $dotaz="SELECT Id From $db_table ORDER BY Id DESC";
    $vysledek=mysqli_query($link,$dotaz);
    if(mysqli_num_rows($vysledek)!=0){
      $id=mysqli_fetch_array($vysledek)[0]+1;
    }
    else{
      $id=0;
    }

    if($maZasuvku){$zasuvka=1;}else{$zasuvka=0;}
    if($maWifi){$wifina=1;}else {$wifina=0;}

    $dotaz="INSERT INTO $db_table VALUES ($id,'$name',$zasuvka,$wifina,'$latlon',0,0,'$obrazek')";
    $ok=mysqli_query($link,$dotaz);
    if($ok){
      debug("OK - Přidáno");
    }
    else {
      debug("ERROR - Přidání se nezdařilo");
      debug($dotaz);
    }
  }

  function latLonZvlast($latLon){ //vrací pole o dvou polích, jedno je lat, druhé je, překvapivě, lon
    return explode(",",$latLon);
  }

  function latLonSpojit($lat,$lon){
    return $lat+","+$lon;
  }

?>
