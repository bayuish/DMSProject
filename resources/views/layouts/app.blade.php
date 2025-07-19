<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts Vite (jika Anda menggunakannya) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS (gunakan kembali gaya dari people.blade.php) -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: #fff;
            padding: 15px 20px;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header .logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: #333;
            display: flex;
            align-items: center;
        }
        .header .logo i {
            color: #4285f4; /* Warna biru Google */
            margin-right: 10px;
            font-size: 1.8rem;
        }
        .header .search-bar {
            flex-grow: 1;
            margin: 0 30px;
            max-width: 600px;
        }
        .header .search-bar .form-control {
            border-radius: 25px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding-left: 40px;
        }
        .header .search-bar .input-group-text {
            background-color: transparent;
            border: none;
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            color: #888;
        }
        .header .user-profile {
            display: flex;
            align-items: center;
        }
        .header .user-profile .icon-group i {
            font-size: 1.3rem;
            margin-left: 20px;
            color: #555;
            cursor: pointer;
            transition: color 0.2s;
        }
        .header .user-profile .icon-group i:hover {
            color: #000;
        }
        .header .user-profile .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #4285f4;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-left: 20px;
            cursor: pointer;
        }
        /* New styles for dropdown menu under user avatar */
        .header .user-profile .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 10px;
        }
        .header .user-profile .dropdown-item {
            padding: 10px 15px;
            color: #333;
            font-weight: 500;
        }
        .header .user-profile .dropdown-item:hover {
            background-color: #f0f2f5;
            color: #1d9dcc;
        }
    </style>
</head>
<body>
    <div id="app">
        {{-- Mengganti navbar bawaan dengan komponen navbar kustom --}}
        @include('components.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script Logout dipindahkan ke sini untuk memastikan DOM sepenuhnya dimuat --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutButton = document.getElementById('logout-button');
            if (logoutButton) {
                logoutButton.addEventListener('click', async function(event) {
                    event.preventDefault(); // Mencegah perilaku default tombol

                    console.log('Logout button clicked. Sending fetch request...');

                    // Dapatkan CSRF token dari meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    if (!csrfToken) {
                        console.error('CSRF token not found. Please ensure <meta name="csrf-token" content="{{ csrf_token() }}"> is in your <head> section.');
                        alert('Error: CSRF token not found. Cannot logout.');
                        return;
                    }

                    try {
                        const response = await fetch('{{ route('logout') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken // Sertakan CSRF token
                            },
                            body: JSON.stringify({}) // Body kosong karena logout tidak memerlukan data
                        });

                        console.log('Fetch response status:', response.status);
                        console.log('Fetch response URL:', response.url);

                        if (response.ok || response.status === 302) { // 302 untuk redirect
                            // Logout berhasil, arahkan ke halaman login
                            window.location.href = '{{ route('login') }}';
                        } else {
                            const errorData = await response.text(); // Ambil respons sebagai teks
                            console.error('Logout failed:', response.status, errorData);
                            alert('Logout failed. Please try again. Check console for details.');
                        }
                    } catch (error) {
                        console.error('Network or other error during logout:', error);
                        alert('An error occurred during logout. Please check console.');
                    }
                });
            }
        });
    </script>
</body>
</html>
