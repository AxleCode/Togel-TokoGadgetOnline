<?php 
  session_start();
  include'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="loginuser.php"</script>';
  }

      $logo = mysqli_query($koneksi, "SELECT * FROM `content` WHERE id = 2;");
      $lg = mysqli_fetch_object($logo);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <title>Togel | Online Store Website</title>
      <link rel="stylesheet" href="css/style-hubungikami.css" >
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- menggunakan font awesome v6 -->
      <script src="https://kit.fontawesome.com/d07b1ba8d8.js" crossorigin="anonymous"></script>

    </head>
<body> 
   <!-- Bagian Header -->
   <div class="header">

   <div class="container">
     <div class="navbar">
        <div class="logo">
         
            <img src="konten/<?php echo $lg->logo ?>" width="380px">
        </div>
        <nav class="nav">
          <ul>
               <li><a href="indexuser.php">Home</a></li>
              <li><a href="allproductsuser.php">Produk</a></li>
              <li><a href="hubungikamiuser.php">Hubungi Kami</a></li>
              <li><a href="akun.php">Akun</a></li>
              <li><a href="logoutuser.php">Logout</a></li>
              <li><a href="keranjang.php" class="cart"><i class="fa-solid fa-cart-shopping" ></i></a></li>
          </ul>
        </nav>
    </div>
   
   </div>
  </div>

  <div class="containerp">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Jl. Ketintang No.156, Ketintang, Kec. Gayungan</div>
          <div class="text-two">Kota SBY, Jawa Timur 60231</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+0098 9893 5647</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">togelku@gmail.com</div>
          <div class="text-two">info.togelku@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>Pesan, kritik atau saran anda sangat berharga bagi kami Toko Gadget Online. Kami senang mendengar suara kepuasan para pelanggan kami </p>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-box">
          <input type="text" name="nama" value="<?php echo $_SESSION['para_user']->nama ?>">
        </div>
        <div class="input-box">
          <input type="text" name="email" value="<?php echo $_SESSION['para_user']->email ?> / <?php echo $_SESSION['para_user']->hp ?>">
        </div>
        <div class="input-box message-box">
          <textarea name="pesan" placeholder="Pesan anda"></textarea>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Kirim Pesan" >
        </div>
      </form>
      <?php 
          if (isset($_POST['submit'])){
            $nama = ucwords($_POST['nama']);
            $email = ucwords($_POST['email']);
            $pesan = ucwords($_POST['pesan']);
            
            $insert = mysqli_query($koneksi, "INSERT INTO pesan VALUES ( null,
                        '".$nama."',
                        '".$email."',
                        '".$pesan."'
                    )");

            if ($insert) {
              echo '<script>alert("Pesan Berhasil Terkirim! Terimakasih atas masukkan anda :)")"</script>';
            }else{
              echo 'gagal'.mysql_error($koneksi);
            }
          }
        
         ?>
    </div>
    </div>
  </div>


  <!-- Bagian Footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Kunjungi Alamat Toko Kami</h3>
          <p><?php echo $lg->alamat ?></p>
          <h4><?php echo $lg->haribuka ?></h4>
          <h4><?php echo $lg->jambuka ?> </h4>
        </div>
        <div class="footer-col-2">
          <img src="konten/<?php echo $lg->logo ?>">
          <p>Online Store Paling Terpercaya!</p>
        </div>

          <div class="footer-col-3">
          <h3>Social Media</h3>
          <ul>
            <li><a href="<?php echo $lg->facebook ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a><a  href="<?php echo $lg->instagram ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><a  href="<?php echo $lg->youtube ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <p class="copyright">Copyright 2022 - Softech Inc.</p>
    </div>
  </div>


</body>
</html>
