<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value1) as cel, AVG(value2) as hum FROM sensordata ");
  $temp = mysqli_fetch_object($sensor);

  $suhu1 = [

      'temp1' => number_format("$temp->cel",2)." °C"
  ];
  
  echo json_encode($suhu1);

 ?>