<?php 
  include 'db.php';

  header('Content-Type: application/json');



  // $jml_lok = mysqli_query($conn, "SELECT *,COUNT(tp.location) lok  FROM sensordata tp ");
  // $l = mysqli_fetch_object($jml_lok);

  $sensor = mysqli_query($conn, "SELECT AVG(value2) as hum FROM sensordata where s_id=3");
  $humbe = mysqli_fetch_object($sensor);

  $humbe1 = [

      'humbe2' => number_format("$humbe->hum",2)." %"
  ];
  
  echo json_encode($humbe1);

 ?>