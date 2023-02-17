<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value1) as temp FROM sensordata where s_id=3");
  $tempbe = mysqli_fetch_object($sensor);
  $tempbe1 = [

      'tempbe2' => number_format("$tempbe->temp",2)." °C"
  ];
  
  echo json_encode($tempbe1);

 ?>