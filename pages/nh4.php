<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value4) as am FROM sensordata");
  $sss = mysqli_fetch_object($sensor);

  $amon = [

      'amon1' => number_format("$sss->am",2)." ppm"
  ];
  
  echo json_encode($amon);

 ?>