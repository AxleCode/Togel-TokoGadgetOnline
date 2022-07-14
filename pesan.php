<?php 
//agar jika admin langsung membuka web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	include 'koneksi.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

 ?>
 <!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard | Toko Gadget Online</title>
    <link rel="stylesheet" href="css/style-pesan.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
       <img src="images/logo_long.png" width="230px" >
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="pesanan.php" >
            <i class='bx bx-task' ></i>
            <span class="links_name">Pesanan</span>
          </a>
        </li>
        <li>
          <a href="kategori.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Kategori</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="content.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Content</span>
          </a>
        </li>
        <li>
          <a href="brand.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Brand</span>
          </a>
        </li>
        <li>
          <a href="pesan.php" class="active">
            <i class='bx bx-message-square-detail'></i>
            <span class="links_name">Message </span>
          </a>
        </li>
        <li>
          <a href="setting.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['para_admin']->username ?> (Admin)</span>
      </div>
    </nav>

    <div class="home-content">
       <div class="sales-boxes">
      <div class="recent-sales box">
        <h3>Pesan</h3 >
        
        <table border="0" cellspacing="0" class="tabelkategori">
          <thead>
            <tr>
              <th width="50px">ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Pesan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
              $kategori = mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id DESC");
                if(mysqli_num_rows($kategori) > 0){
                while($row = mysqli_fetch_array($kategori)){
             ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['nama'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['pesan'] ?></td>
            </tr>
            <?php }} else{ ?>
            <tr>
              <td colspan="4">Tidak Ada Data</td>
            </tr>
            <?php } 
            ?>
          
          </tbody>
        </table>
      </div>
     </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

