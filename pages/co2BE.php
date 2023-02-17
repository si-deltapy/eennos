<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value3) as carbon FROM sensordata where value3!='null' AND s_id=3");
  $co2 = mysqli_fetch_object($sensor);

  $carbe = [

      'carbe1' => number_format("$co2->carbon",2)." ppm"
  ];
  
  echo json_encode($carbe);

 ?>