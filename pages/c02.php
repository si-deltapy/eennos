<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensora = mysqli_query($conn, "SELECT AVG(value3) as carbona FROM sensordata where value3!='null' and s_id=2 ORDER BY id DESC LIMIT 1");
  $co2a = mysqli_fetch_object($sensora);

  $sensorb = mysqli_query($conn, "SELECT AVG(value3) as carbonb FROM sensordata where value3!='null' and s_id=3 ORDER BY id DESC LIMIT 1");
  $co2b = mysqli_fetch_object($sensorb);

  $sensorc = mysqli_query($conn, "SELECT AVG(value3) as carbonc FROM sensordata where value3!='null' and s_id=4 ORDER BY id DESC LIMIT 1");
  $co2c = mysqli_fetch_object($sensorc);

  $co2ad= $co2a->carbona + $co2b->carbonb + $co2c->carbonc;
  $co2= $co2ad/3;

  $car = [

      'car1' => number_format("$co2",2)." ppm"
  ];
  
  echo json_encode($car);

 ?>