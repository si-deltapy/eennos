<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value1) as temp FROM sensordata where s_id=4");
  $tempzl = mysqli_fetch_object($sensor);
  $sensor2 = mysqli_query($conn, "SELECT AVG(value1) as temp2 FROM sensordata where s_id=2");
  $tempzl5 = mysqli_fetch_object($sensor2);

  $tempgab = ($tempzl->temp + $tempzl5->temp2)/2;

  $tempzl1 = [

      'tempzl2' => number_format("$tempgab",2)." °C"
  ];
  
  echo json_encode($tempzl1);

 ?>