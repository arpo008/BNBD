<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

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
            <a href="#" target="_blank">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">inventory_2</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">category</span> Categories
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">groups</span> Customers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="Home.php" target="_blank">
              <span class="material-icons-outlined">groups</span> Log Out
            </a>
          </li>
          
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>PRODUCTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1>150</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>NEW ORDER</h3>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1>150</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>CUSTOMERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>150</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>ORDER HISTORY</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>150</h1>
          </div>

        </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    
  </body>
</html>