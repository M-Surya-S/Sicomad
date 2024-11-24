<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sicomad</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/Logo-Only.png') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}" type="text/css">

    <!-- Custom File Input -->
    <style>
        .custom-file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .custom-file-upload label {
            display: block;
            background-color: #f3f3f3;
            color: #555;
            padding: 10px 15px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            width: 100%;
        }

        .custom-file-upload label:hover {
            background-color: #ddd;
            border-color: #bbb;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('home.layouts.partial.navbar')

    @yield('content')

    @include('home.layouts.partial.footer')

    <!-- Js Plugins -->
    <script src="{{ asset('assets/home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/home/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>

    <!-- Notifikasi Upload File Bukti Pembayaran -->
    <script>
        document.getElementById('bukti').addEventListener('change', function() {
            const notification = document.getElementById('upload-notification');
            if (this.files && this.files.length > 0) {
                notification.style.display = 'block'; // Tampilkan pesan
                notification.textContent =
                    `${this.files.length} File${this.files.length > 1 ? 's' : ''} Has Been Successfully Uploaded`;
            } else {
                notification.style.display = 'none'; // Sembunyikan jika tidak ada file
            }
        });
    </script>
</body>

</html>
