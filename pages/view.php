<?php 
  include 'db.php';

  header('Content-Type: application/json');


  $jml_data1 = mysqli_query($conn, "SELECT COUNT(tp.id) pes1  FROM sensordata tp where s_id=2");
  $d1= mysqli_fetch_object($jml_data1);
  $jml_data2 = mysqli_query($conn, "SELECT COUNT(tp.id) pes2  FROM sensordata tp where s_id=4");
  $d2= mysqli_fetch_object($jml_data2);
  $d= $d1->pes1 + $d2->pes2 ;

  $data = [

      'pes' => $d
  ];

  echo json_encode($data);
  // echo json_encode($hum1);
  // echo json_encode($data);

 ?>