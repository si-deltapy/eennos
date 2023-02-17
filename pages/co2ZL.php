<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value3) as carbon FROM sensordata where value3!='null' AND s_id=4");
  $co21 = mysqli_fetch_object($sensor);
  $sensor = mysqli_query($conn, "SELECT AVG(value3) as carbon2 FROM sensordata where value3!='null' AND s_id=2");
  $co22 = mysqli_fetch_object($sensor);
  $co2gab = ($co21->carbon + $co22->carbon2)/2;
  $carzl = [

      'carzl1' => number_format("$co2gab",2)." ppm"
  ];
  
  echo json_encode($carzl);

 ?>