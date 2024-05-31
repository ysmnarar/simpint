<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Likes Page</title>
     <link rel="stylesheet" href="styles.css">
</head>
<style>
     body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
     }

     header {
          background-color: #fff;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          padding: 10px 20px;
          position: sticky;
          top: 0;
          z-index: 1000;
          width: 97%;
     }

     .header-container {
          display: flex;
          align-items: center;
          justify-content: space-between;
     }

     .logo {
          font-size: 24px;
          font-weight: bold;
     }

     .search-bar input {
          width: 400px;
          /* Lebarkan search bar */
          padding: 8px;
          border-radius: 5px;
          border: 1px solid #ccc;
     }

     .nav-icons a {
          margin-left: 15px;
     }

     .nav-icons img {
          width: 24px;
          height: 24px;
     }

     .container {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
     }

     .card {
          display: flex;
          background-color: #fff;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          padding: 20px;
          margin: 10px;
     }

     .card-img {
          width: 80px;
          /* Ubah sesuai dengan kebutuhanmu */
          height: auto;
          margin-right: 20px;
          /* Untuk memberi jarak antara gambar dan konten */
     }

     .card-content {
          flex: 1;
          /* Agar konten kartu mengisi sisa ruang */
     }

     .card h3 {
          margin-top: 0;
     }

     .card p {
          margin-bottom: 0;
     }
</style>

<body>
     <header>
          <div class="header-container">
               <div class="logo">Simpint</div>
               <div class="search-bar">
                    <input type="text" placeholder="Search...">
               </div>
               <div class="nav-icons">
                    <a href="{{ route('index.home')}}"><img
                              src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.6.0/png/iconmonstr-dashboard-lined.png&r=0&g=0&b=0"
                              alt="Dashboard"></a>
                    <a href="#"><img
                              src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.7.0/png/iconmonstr-heart-lined.png&r=0&g=0&b=0"
                              alt="Like"></a>
                    <a href="#" class="nav-icons" id="sidebarBtn"><img
                              src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.3.0/png/iconmonstr-menu-lined.png&r=0&g=0&b=0"
                              alt="Dropdown"></a>

               </div>
          </div>
     </header>

     <div class="container">
          <div class="card">
               <img src="gambar1.jpg" alt="Gambar 1" class="card-img">
               <div class="card-content">
                    <h3>Kartu 1</h3>
                    <p>Isi Kartu 1</p>
               </div>
          </div>
     </div>
</body>

</html>