<?php

session_start();
if(!isset($_SESSION['cid'])){
  echo '<script>
  alert("You must log in first");
  window.location.href="login.php";
  </script>';
  exit();
}
$cid=$_SESSION['cid'];

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


    <link rel="stylesheet" href="22.css">
  </head>
  <body>
    <div class="grid-container">
      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">shopping_cart</span> STORE
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#" target="_self">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_self">
              <span class="material-icons-outlined">inventory_2</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_self">
              <span class="material-icons-outlined">category</span> Categories
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_self">
              <span class="material-icons-outlined">groups</span> Customers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="Home.php" target="_self">
              <span class="material-icons-outlined">groups</span> Log Out
            </a>
          </li>
          
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title ms-3 ps-5">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards ali d-flex justify-content-around ">
 
          <button class="btn btn-outline-light"><a href="#" style="text-decoration:none;color:white;">
          <div class="card bg-warning p-5 m-2" style="width: 22rem;">
            <div class="card-inner">
              <h3>NEW ORDER</h3>
              <span class="material-icons-outlined">category</span>
            </div>
          </div></a></button>
           
          <button class="btn btn-outline-light"><a href="order status.php" style="text-decoration:none;color:white;">
          <div class="card bg-success p-5 m-2 pb-5" style="width: 22rem;">
            <div class="card-inner">
              <h3>ORDER STATUS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
          </div></a></button>
          
          <button class="btn btn-outline-light"><a href="#" style="text-decoration:none;color:white;">
          <div class="card bg-danger p-5 m-3" style="width: 22rem;">
            <div class="card-inner">
              <h3>ORDER HISTORY</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
          </div></a></button>

        </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    
  </body>
</html>