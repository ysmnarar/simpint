<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            /* Mengatur posisi horizontal */
            align-items: center;
            /* Mengatur posisi vertikal */
            height: 100vh;
            /* Tinggi penuh viewport */
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
            max-width: 1200px;
            /* Ukuran container diperbesar */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            flex-direction: column;
            /* Mengatur arah flex menjadi kolom */
        }

        .content {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .image-container {
            flex: 1;
            text-align: center;
            margin-right: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            width: 300px;
            /* Ukuran gambar diperbesar */
            max-height: 300px;
            /* Tinggi maksimum gambar diperbesar */
            object-fit: cover;
            /* Jaga agar gambar tetap proporsional */
        }

        .details {
            flex: 2;
        }

        .title {
            font-size: 30px;
            /* Ukuran font diperbesar */
            font-weight: bold;
            margin-bottom: 10px;
        }

        .description {
            font-size: 18px;
            /* Ukuran font diperbesar */
            color: #666;
            line-height: 1.5;
        }

        .favorite-icon {
            font-size: 24px;
            color: #000;
            cursor: pointer;
            margin-top: 20px;
        }

        .favorite-icon.active {
            color: #ff0000;
            /* Ubah warna ikon ketika tombol sudah ditekan */
        }

        svg{
            width: 30px;
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

    <div class="container">
        <div class="content">
            <div class="image-container">
                <img src="{{ asset('storage/' . $products->img) }}" alt="{{ $products->name }}">
            </div>
            <div class="details">
                <h2 class="title">{{ $products->name }}</h2>
                <p class="description">{{ $products->desc }}</p>
                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m7.234 3.004c-2.652 0-5.234 1.829-5.234 5.177 0 3.725 4.345 7.727 9.303 12.54.194.189.446.283.697.283s.503-.094.697-.283c4.977-4.831 9.303-8.814 9.303-12.54 0-3.353-2.58-5.168-5.229-5.168-1.836 0-3.646.866-4.771 2.554-1.13-1.696-2.935-2.563-4.766-2.563zm0 1.5c1.99.001 3.202 1.353 4.155 2.7.14.198.368.316.611.317.243 0 .471-.117.612-.314.955-1.339 2.19-2.694 4.159-2.694 1.796 0 3.729 1.148 3.729 3.668 0 2.671-2.881 5.673-8.5 11.127-5.454-5.285-8.5-8.389-8.5-11.127 0-1.125.389-2.069 1.124-2.727.673-.604 1.625-.95 2.61-.95z"
                        fill-rule="nonzero" href="{{ route('index.likes')}}">
                </svg>
                <!-- <i class="fas fa-heart favorite-icon" onclick="addToFavorites(this, {{ $products->id }})"></i> -->
            </div>
        </div>
    </div>
    <!-- <script>
        function addToFavorites(icon, productId) {
            fetch('/likes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    icon.classList.add('active'); // Tambahkan kelas 'active' pada ikon
                    alert('Product added to favorites!');
                } else {
                    alert('Failed to add product to favorites.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } -->
    </script>
</body>

</html>