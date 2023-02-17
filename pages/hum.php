<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value1) as cel, AVG(value2) as hum FROM sensordata ");
  $temp = mysqli_fetch_object($sensor);

  $hum1 = [

      'hum2' => number_format("$temp->hum",2)." %"
  ];
  
  echo json_encode($hum1);

 ?>