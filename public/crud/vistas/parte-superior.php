<!DOCTYPE html>
<html lang="en">
<head>
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxs-coffee-bean"></i>
      <div class="logo_name">Herse</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class="bx bx-search"></i>
        <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="admin.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Inicio</span>
        </a>
        <span class="tooltip">Inicio</span>
      </li>
      <li>
        <a href="usuarios.php">
          <i class="bx bx-user"></i>
          <span class="link_name" >Usuarios</span>
        </a>
        <span class="tooltip">Usuarios</span>
      </li>
      
      <li>
        <a href="administradores.php">
          <i class="bx bx-pie-chart-alt-2"></i>
          
          <span class="link_name">Administradores</span>
        </a>
        <span class="tooltip">Administradores</span>
      </li>

      <li>
        <a href="productos.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Productos</span>
        </a>
        <span class="tooltip">Productos</span>
      </li>
      
      <li>
        <a href="pedidos.php">
          <i class="bx bx-cart-alt"></i>
          <span class="link_name">Pedidos</span>
        </a>
        <span class="tooltip">Pedidos</span>
      </li>

      <li>
        <a href="#">
          <i class="bx bx-cog"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
        <div class="profile_details">
          <!--Datos del administrador-->
          <img src="profile.jpeg" alt="profile image">
          <div class="profile_content">
            <div class="name">Anna Jhon</div>
            <div class="designation">Admin</div>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out"></i>
      </li>
    </ul>
  </div>