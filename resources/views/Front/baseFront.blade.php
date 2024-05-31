<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>HomePage Simpint</title>
     <link rel="stylesheet" href="styles.css">
     <style>
          body {
               font-family: Arial, sans-serif;
               background-color: #f0f0f0;
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
               flex-wrap: wrap;
               justify-content: center;
               padding: 20px;
          }

          .card {
               width: 300px;
               border: 1px solid #ccc;
               border-radius: 5px;
               margin: 10px;
               overflow: hidden;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
               background-color: #fff;
               text-decoration: none;
               color: inherit;
               transition: transform 0.2s;
          }

          .card:hover {
               transform: scale(1.05);
          }

          .card img {
               width: 100%;
               height: auto;
          }

          .card-body {
               padding: 15px;
          }

          .card-title {
               font-size: 23px;
               margin-bottom: 10px;
          }

          .card-text {
               font-size: 18px;
               color: #666;
               margin-bottom: 10px;
          }

          .sidebar {
               width: 250px;
               height: 100%;
               background-color: #fff;
               position: fixed;
               top: 0;
               right: -250px;
               transition: right 0.3s ease;
               z-index: 999;
               padding-top: 60px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
               /* Efek bayangan */
          }

          .sidebar.show {
               right: 0;
          }

          .sidebar .close-btn {
               position: absolute;
               top: 20px;
               right: 20px;
               color: #333;
               cursor: pointer;
               font-size: 24px;
               background: none;
               border: none;
               font-weight: bold;
          }

          .overlay {
               position: fixed;
               width: 100%;
               height: 100%;
               background: rgba(0, 0, 0, 0.7);
               top: 0;
               left: 0;
               z-index: 998;
               display: none;
          }

          .overlay.active {
               display: block;
          }
     </style>
</head>

<body>
     <header>
          <div class="header-container">
               <div class="logo">Simpint</div>
               <div class="search-bar">
                    <input type="text" placeholder="Search...">
               </div>
               <div class="nav-icons">
                    <a href="{{ route('index.home')}}"><img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.6.0/png/iconmonstr-dashboard-lined.png&r=0&g=0&b=0" alt="Dashboard"></a>
                    <a href="#"><img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.7.0/png/iconmonstr-heart-lined.png&r=0&g=0&b=0" alt="Like"></a>
                    <a href="#" class="nav-icons" id="sidebarBtn"><img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.3.0/png/iconmonstr-menu-lined.png&r=0&g=0&b=0" alt="Dropdown"></a>

               </div>
          </div>
     </header>

     <div class="sidebar" id="sidebar">
        <!-- Tombol close untuk menutup sidebar -->
        <button class="close-btn" id="closeBtn">&times;</button>
        <!-- Isi sidebar di sini -->
        <ul>
            <li>
                <!-- Tambahkan tombol untuk membuka sidebar -->
                <button id="Menu">Menu</button>
            </li>
            <li><a href="#">Menu 2</a></li>
            <li><a href="#">Menu 3</a></li>
        </ul>
    </div>

    <!-- Overlay untuk efek latar belakang -->
    <div class="overlay" id="overlay"></div>

    <div class="container">
        @foreach ($products as $row)
            <a href="{{ route('admin.index.detail', $row->id)}}" class="card">
                <img src="{{asset('storage/' . $row->img)}}" alt="{{ $row->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $row->name }}</h3>
                    <p class="card-text">{{ $row->desc }}</p>
                </div>
            </a>
        @endforeach
    </div>

    <script>
        // Ambil elemen-elemen yang diperlukan
        const sidebarBtn = document.getElementById('sidebarBtn');
        const sidebar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('closeBtn');
        const overlay = document.getElementById('overlay');

        // Tambahkan event listener pada tombol sidebarBtn untuk membuka/menutup sidebar
        sidebarBtn.addEventListener('click', function () {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('active');
        });

        // Tambahkan event listener pada tombol close untuk menutup sidebar
        closeBtn.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });

        // Tambahkan event listener pada overlay untuk menutup sidebar ketika diklik di luar sidebar
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });
    </script>
</body>

</html>