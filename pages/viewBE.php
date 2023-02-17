<?php 
  include 'db.php';

  header('Content-Type: application/json');


  $jml_data1 = mysqli_query($conn, "SELECT COUNT(tp.id) pes1  FROM sensordata tp where s_id=3");
  $d= mysqli_fetch_object($jml_data1);

  $dataBE = [

      'pesbe' => $d->pes1
  ];

  echo json_encode($dataBE);
  // echo json_encode($hum1);
  // echo json_encode($data);

 ?>