<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value2) as hum FROM sensordata where s_id=4");
  $humzl = mysqli_fetch_object($sensor);
  $sensor2 = mysqli_query($conn, "SELECT AVG(value2) as hum2 FROM sensordata where s_id=2");
  $humzl5 = mysqli_fetch_object($sensor2);

  $humgab = ($humzl->hum + $humzl5->hum2)/2;

  $humzl1 = [

      'humzl2' => number_format("$humgab",2)." %"
  ];
  
  echo json_encode($humzl1);

 ?>