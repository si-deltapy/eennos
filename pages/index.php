<?php 
  include'db.php';
  session_start();
  // if($_SESSION['status-login'] != true){
  //           echo '<script>window.location="exit.php"</script>';
  //       }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicono.png">
  <title>
    Eennos Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://eennos.online/eennos/pages/ ">
        <img src="../assets/img/favicono.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">EENNOS Dashboard</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="../pages/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/tables.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/billing.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/virtual-reality.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/rtl.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/exit.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <!-- <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div> -->
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Environmental Monitoring System Lab Sistem informasi Lingkungan</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">
            <!-- <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li> -->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <!-- <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li> -->
            <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <script>
        function liveUpdateJumlah (){
          const textViewCount = document.getElementById('pes');

          setInterval(function () {
            fetch('view.php').then(function (response) {
              return response.json();

            }).then(function (data) {
              textViewCount.textContent = data.pes;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }
        
        function liveUpdateHum (){
          const textViewHum = document.getElementById('hum2');

          setInterval(function () {
            fetch('hum.php').then(function (response) {
              return response.json();

            }).then(function (hum1) {
              textViewHum.textContent = hum1.hum2;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateNh4 (){
          const textViewNH4 = document.getElementById('amon1');

          setInterval(function () {
            fetch('nh4.php').then(function (response) {
              return response.json();

            }).then(function (amon) {
              textViewNH4.textContent = amon.amon1;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateSuhu (){
          const textViewSuhu = document.getElementById('temp1');

          setInterval(function () {
            fetch('suhu.php').then(function (response) {
              return response.json();

            }).then(function (suhu1) {
              textViewSuhu.textContent = suhu1.temp1;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateCO2 (){
          const textViewCO2 = document.getElementById('car1');

          setInterval(function () {
            fetch('c02.php').then(function (response) {
              return response.json();

            }).then(function (car) {
              textViewCO2.textContent = car.car1;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }



        document.addEventListener('DOMContentLoaded', function(){

          liveUpdateJumlah();
          liveUpdateSuhu();
          liveUpdateHum();
          liveUpdateCO2();
          liveUpdateNh4();

        });
      </script>

      <?php 
        $data_THI = mysqli_query($conn, "SELECT AVG(value1) as temp,AVG(value2) as hum FROM sensordata where (t_time BETWEEN '15 Feb 2023 / 00:00:00' AND '15 Feb 2023 / 23:59:00')");
        //THI = 0.8 x T + ((RH x T)/500)

        $d = mysqli_fetch_object($data_THI);
        $THI = 0.8 * $d->temp + (($d->hum * $d->temp)/500);

       ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <!-- <i class="material-icons opacity-10">person</i> -->
                <img src="../assets/img/thermometer.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii suhu-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">THI</p>
                <h4 class="mb-0" ><?php echo number_format($THI) ?> °C</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-down text-danger" aria-hidden="true"></i></span><strong> 5%</strong> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <!-- <i class="material-icons opacity-10">person</i> -->
                <img src="../assets/img/thermometer.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii suhu-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Temperature</p>
                <h4 class="mb-0" id="temp1">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-down text-danger" aria-hidden="true"></i></span><strong> 5%</strong> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/cloudy.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii Kelembaban-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Humidity</p>
                <h4 class="mb-0"id="hum2">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/95950.png" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii Kelembaban-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Carbon Dioxide</p>
                <h4 class="mb-0"id="car1">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
        </div>
       <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/Artboard.png" style="margin-top:10px; margin-left:1px" class="navbar-brand-img h-75">
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Amonium</p>
                <h4 class="mb-0"id="amon1">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
        </div> -->
      </div>

      <br>
      <h6>Zona Lalu lintas</h6>
      <br>
      <script>

         function liveUpdateSuhuZL (){
          const textViewZL = document.getElementById('tempzl2');

          setInterval(function () {
            fetch('suhuZL.php').then(function (response) {
              return response.json();

            }).then(function (tempzl1) {
              textViewZL.textContent = tempzl1.tempzl2;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateHumZL (){
          const textViewHumZL = document.getElementById('humzl2');

          setInterval(function () {
            fetch('humZL.php').then(function (response) {
              return response.json();

            }).then(function (humzl1) {
              textViewHumZL.textContent = humzl1.humzl2;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateco2ZL (){
          const textViewCarZL = document.getElementById('carzl1');

          setInterval(function () {
            fetch('co2ZL.php').then(function (response) {
              return response.json();

            }).then(function (carzl) {
              textViewCarZL.textContent = carzl.carzl1;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateSuhuBE (){
          const textViewSuhuBE = document.getElementById('tempbe2');

          setInterval(function () {
            fetch('suhuBE.php').then(function (response) {
              return response.json();

            }).then(function (tempbe1) {
              textViewSuhuBE.textContent = tempbe1.tempbe2;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }
        function liveUpdateHumBE (){
          const textViewHumBE = document.getElementById('humbe2');

          setInterval(function () {
            fetch('humBE.php').then(function (response) {
              return response.json();

            }).then(function (humbe1) {
              textViewHumBE.textContent = humbe1.humbe2;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateco2BE (){
          const textViewCo2BE = document.getElementById('carbe1');

          setInterval(function () {
            fetch('co2BE.php').then(function (response) {
              return response.json();

            }).then(function (carbe) {
              textViewCo2BE.textContent = carbe.carbe1;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }

        function liveUpdateDataBE (){
          const textViewBE = document.getElementById('pesbe');

          setInterval(function () {
            fetch('viewBE.php').then(function (response) {
              return response.json();

            }).then(function (dataBE) {
              textViewBE.textContent = dataBE.pesbe;
            }).catch(function (error) {
              console.log(error);
            });

          }, 2000)
        }



        document.addEventListener('DOMContentLoaded', function(){

          liveUpdateSuhuZL();
          liveUpdateHumZL();
          liveUpdateco2ZL();
          liveUpdateDataBE();
          liveUpdateSuhuBE();
          liveUpdateHumBE();
          liveUpdateco2BE();


        });
      </script>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <!-- <i class="material-icons opacity-10">weekend</i> -->
                <img src="../assets/img/bar.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii data-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Amount of Data</p>
                <h4 class="mb-0" id="pes">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><i class="fa fa-clock me-1"></i> Last minutes ago</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <!-- <i class="material-icons opacity-10">person</i> -->
                <img src="../assets/img/thermometer.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii suhu-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Temperature</p>
                <h4 class="mb-0" id="tempzl2">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-down text-danger" aria-hidden="true"></i></span><strong> 5%</strong> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/cloudy.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii Kelembaban-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Humidity</p>
                <h4 class="mb-0"id="humzl2">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
       </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/95950.png" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii Kelembaban-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Carbon Dioxide</p>
                <h4 class="mb-0"id="carzl1">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
        </div>
      </div>

      <br>
      <h6>Zona Bebas Emisi</h6>
      <br>

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <!-- <i class="material-icons opacity-10">weekend</i> -->
                <img src="../assets/img/bar.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii data-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Amount of Data</p>
                <h4 class="mb-0" id="pesbe">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><i class="fa fa-clock me-1"></i> Last minutes ago</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <!-- <i class="material-icons opacity-10">person</i> -->
                <img src="../assets/img/thermometer.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii suhu-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Temeperature</p>
                <h4 class="mb-0" id="tempbe2">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-down text-danger" aria-hidden="true"></i></span><strong> 5%</strong> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/cloudy.svg" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii Kelembaban-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Humidity</p>
                <h4 class="mb-0"id="humbe2">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                 <img src="../assets/img/95950.png" style="margin-top: 8px; filter: invert(100%);" class="navbar-brand-img h-75"> <!--gantii Kelembaban-->
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Carbon Dioxide</p>
                <h4 class="mb-0"id="carbe1">-</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></span><strong> 2%</strong> than last month</p>
            </div>
          </div>
        </div>
      </div>
      <!-- end -->
    </div>
      
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Temperature <span>&#8451;</span> </h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 10 min ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Humidity %</h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+2%</span>) increase in last month. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated last month ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-warning shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Carbon Dioxide</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">updated last month ago</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-lg-11 col-md-10 mb-md-0 mb-4 ms-md-5">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Data Records</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">Live time</span> monitoring system
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="print.php" target="_blank">Print Data</a></li>
                      <!-- <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li> -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sensor ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Suhu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelembaban</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CO2</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                     $list_data = mysqli_query($conn, "SELECT *,tm.nm_lokasi as location FROM sensordata sd JOIN tb_nm_lokasi tm on tm.s_id=sd.s_id ORDER BY id DESC LIMIT 10");
                        while($row = mysqli_fetch_array($list_data)){
                     ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row['location'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"><?php echo $row['s_id'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold"><?php echo $row['value1'] ?> <span>&#8451;</span></span>
                          <div>
                            <div class="progress">
                               <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="<?php echo $row['value1'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $row['value1'] ?>" style="width: <?php echo $row['value1'] ?>%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold"><?php echo $row['value2'] ?> %</span>
                          <div>
                            <div class="progress">
                               <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="<?php echo $row['value2'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $row['value2'] ?>" style="width: <?php echo $row['value2'] ?>%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold"><?php echo $row['value3'] ?> ppm</span>
                          <div>
                            <div class="progress">
                               <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="<?php echo $row['value3'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $row['value3'] ?>" style="width: <?php echo $row['value3'] ?>%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                       <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"><?php echo $row['t_time'] ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">notifications</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">code</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">shopping_cart</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">credit_card</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">key</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                  </div>
                </div>
                <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">payments</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Eennos Tim</a>
                for a future monitoring system.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" >Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" >About Us</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" >Blog</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link pe-0 text-muted" >License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!-- <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div> -->
        <!-- End Toggle Button -->
      <!-- </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0"> -->
        <!-- Sidebar Backgrounds -->
       <!--  <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a> -->
        <!-- Sidenav Type -->
        <!-- <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p> -->
        <!-- Navbar Fixed -->
        <!-- <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>  -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>

    <?php 
      $jml_data1 = mysqli_query($conn, "SELECT value1 as due FROM sensordata tp ORDER by id desc limit 1 ");
      $d= mysqli_fetch_object($jml_data1);
      $suhu_coba=$d->due;

     ?>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    var chart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [0],
        datasets: [{
          label: "Temperature",
          tension: 0.6,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [0],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    window.setInterval(mycallback,30000);

    function mycallback() {
      var now = new Date();
      now = now.getHours() + ":" + now.getMinutes();
      var value = Math.floor(Math.random() * 1000);
      if (chart.data.labels.length >=7){
        chart.data.labels.shift();
        chart.data.datasets[0].data.shift();
      }
      chart.data.datasets[0].data.push(<?php echo $suhu_coba ?>);
      chart.data.labels.push(now);
      chart.update();
    }

    </script>
    <script>
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var chart2 = new Chart(ctx2, {
      type: "line",
      data: {
        labels: [0],
        datasets: [{
          label: "Humadity",
          tension: 0.6,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [0],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    window.setInterval(mycallback2,30000);

    <?php 

    $jml_data2 = mysqli_query($conn, "SELECT value2 as due1 FROM sensordata tp order by id DESC LIMIT 1");
      $d2= mysqli_fetch_object($jml_data2);
      $hum_coba=$d2->due1;

     ?>

    function mycallback2() {
      var now = new Date();
      now = now.getHours() + ":" + now.getMinutes();
      if (chart2.data.labels.length >=7){
        chart2.data.labels.shift();
        chart2.data.datasets[0].data.shift();
      }
      chart2.data.datasets[0].data.push(<?php echo $hum_coba ?>);
      chart2.data.labels.push(now);
      chart2.update();
    }

    </script>
    <script>

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    var chart3 = new Chart(ctx3, {
      type: "line",
      data: {
        labels: [0],
        datasets: [{
          label: "Carbon",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [0],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    window.setInterval(mycallback3,30000);

        <?php 

    $jml_data3 = mysqli_query($conn, "SELECT value3 as due3 FROM sensordata tp order by id DESC LIMIT 1");
      $d3= mysqli_fetch_object($jml_data3);
      $co2_coba=$d3->due3;

     ?>

    function mycallback3() {
      var now = new Date();
      now = now.getHours() + ":" + now.getMinutes();
      var value = Math.floor(Math.random() * 1000);
      if (chart3.data.labels.length >=7){
        chart3.data.labels.shift();
        chart3.data.datasets[0].data.shift();
      }
      chart3.data.datasets[0].data.push(<?php echo $co2_coba ?>);
      chart3.data.labels.push(now);
      chart3.update();
    }

  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>