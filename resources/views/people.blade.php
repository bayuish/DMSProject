<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMSProject - People</title>
    <!-- Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS -->
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

        /* Main Layout */
        .main-wrapper {
            display: flex;
            flex: 1;
            padding-top: 20px; /* Padding dari header */
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            min-width: 250px;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-left: 20px;
            margin-right: 20px;
            position: sticky;
            top: 90px; /* Jarak dari header */
            align-self: flex-start; /* Agar tidak memanjang penuh */
            height: calc(100vh - 110px); /* Sesuaikan tinggi agar sticky */
            overflow-y: auto; /* Scroll jika konten sidebar terlalu panjang */
        }
        .sidebar .btn-upload {
            background-color: #e0f2f7; /* Warna biru muda */
            color: #1d9dcc; /* Warna teks biru */
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .sidebar .btn-upload:hover {
            background-color: #ccecf7;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }
        .sidebar .btn-upload i {
            margin-right: 10px;
        }
        .sidebar .nav-links {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        .sidebar .nav-links li {
            margin-bottom: 5px;
        }
        .sidebar .nav-links a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: #555;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.2s, color 0.2s;
        }
        .sidebar .nav-links a i {
            margin-right: 15px;
            font-size: 1.1rem;
            color: #888;
        }
        .sidebar .nav-links a:hover {
            background-color: #f0f2f5;
            color: #333;
        }
        .sidebar .nav-links a.active {
            background-color: #e0f2f7; /* Warna latar belakang aktif */
            color: #1d9dcc; /* Warna teks aktif */
            font-weight: 600;
        }
        .sidebar .nav-links a.active i {
            color: #1d9dcc; /* Warna ikon aktif */
        }
        .sidebar .storage-details {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .sidebar .storage-details h6 {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        .sidebar .storage-details .progress {
            height: 8px;
            border-radius: 5px;
            background-color: #e9ecef;
        }
        .sidebar .storage-details .progress-bar {
            background-color: #4285f4;
        }
        .sidebar .storage-details .usage-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: #777;
            margin-top: 10px;
        }
        .sidebar .storage-details .usage-item {
            display: flex;
            align-items: center;
            margin-top: 8px;
        }
        .sidebar .storage-details .usage-item i {
            margin-right: 8px;
            font-size: 0.9rem;
            color: #888;
        }
        .sidebar .storage-details .upgrade-link {
            display: block;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #4285f4;
            text-decoration: none;
            font-weight: 500;
        }
        .sidebar .storage-details .upgrade-link:hover {
            text-decoration: underline;
        }

        /* Content Area */
        .content-area {
            flex: 1;
            padding: 0 20px 20px 20px;
            background-color: #f0f2f5;
        }
        .content-area .content-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .content-area .content-header h2 {
            font-weight: 600;
            color: #333;
            margin-right: 15px;
        }
        .content-area .content-header i {
            font-size: 1.5rem;
            color: #555;
        }
        .content-area .action-icons i {
            font-size: 1.3rem;
            margin-left: 15px;
            color: #555;
            cursor: pointer;
            transition: color 0.2s;
        }
        .content-area .action-icons i:hover {
            color: #000;
        }

        /* People Page Specific Styles */
        .people-filters {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 15px;
        }
        .people-filters .nav-pills .nav-link {
            color: #555;
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 15px;
        }
        .people-filters .nav-pills .nav-link.active {
            background-color: #e0f2f7;
            color: #1d9dcc;
        }
        .people-filters .filter-dropdown .btn {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 8px;
            color: #555;
            font-weight: 500;
            padding: 8px 15px;
        }
        .people-filters .filter-dropdown .btn:hover {
            background-color: #eee;
        }
        .people-filters .filter-dropdown .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .people-filters .search-people-bar .form-control {
            border-radius: 8px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding-left: 40px;
        }
        .people-filters .search-people-bar .input-group-text {
            background-color: transparent;
            border: none;
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            color: #888;
        }
        .people-filters .sort-by-dropdown .btn {
            background-color: transparent;
            border: none;
            color: #555;
            font-weight: 500;
        }
        .people-filters .sort-by-dropdown .btn i {
            margin-left: 5px;
        }
        .people-filters .view-toggle .btn {
            background-color: #fff;
            border: 1px solid #ddd;
            color: #555;
            padding: 8px 12px;
            border-radius: 8px;
        }
        .people-filters .view-toggle .btn.active {
            background-color: #e0f2f7;
            color: #1d9dcc;
            border-color: #1d9dcc;
        }

        .user-card {
            background-color: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.2s ease;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
        .user-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .user-card .card-options {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #888;
            cursor: pointer;
        }
        .user-card .avatar-wrapper {
            position: relative;
            margin-bottom: 15px;
        }
        .user-card .user-avatar-lg {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f0f2f5;
        }
        .user-card .online-indicator {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background-color: #28a745; /* Green for online */
            border-radius: 50%;
            border: 3px solid #fff;
        }
        .user-card .offline-indicator {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background-color: #6c757d; /* Gray for offline */
            border-radius: 50%;
            border: 3px solid #fff;
        }
        .user-card .user-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 5px;
        }
        .user-card .user-email {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 15px;
        }
        .user-card .progress-wrapper {
            width: 80%;
            margin-bottom: 15px;
        }
        .user-card .progress {
            height: 6px;
            border-radius: 3px;
            background-color: #e9ecef;
        }
        .user-card .progress-bar {
            background-color: #1d9dcc;
        }
        .user-card .user-position {
            font-size: 0.8rem;
            color: #999;
            text-transform: uppercase;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                min-width: unset;
                margin: 0 0 20px 0;
                border-radius: 0;
                box-shadow: none;
                position: static; /* Nonaktifkan sticky */
                height: auto; /* Nonaktifkan tinggi tetap */
                overflow-y: visible;
                padding: 15px;
            }
            .main-wrapper {
                flex-direction: column;
                padding-top: 0;
            }
            .header .search-bar {
                margin: 0 10px;
            }
            .header .user-profile .icon-group {
                display: none; /* Sembunyikan ikon di header pada mobile */
            }
            .content-area {
                padding: 0 15px 15px 15px;
            }
            .people-filters {
                flex-direction: column;
                align-items: stretch;
            }
            .people-filters .nav-pills,
            .people-filters .filter-dropdown,
            .people-filters .search-people-bar,
            .people-filters .sort-by-dropdown,
            .people-filters .view-toggle {
                width: 100%;
            }
            .people-filters .search-people-bar .form-control {
                width: 100%;
            }
        }
        @media (max-width: 768px) {
            .header {
                flex-wrap: wrap;
                justify-content: center;
            }
            .header .search-bar {
                order: 3; /* Pindahkan search bar ke bawah */
                width: 100%;
                margin-top: 15px;
            }
            .header .logo, .header .user-profile {
                margin-bottom: 10px;
            }
            .header .user-profile .user-avatar {
                margin-left: 10px;
            }
        }
        @media (max-width: 576px) {
            .sidebar .btn-upload {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
            .sidebar .nav-links a {
                padding: 8px 10px;
                font-size: 0.9rem;
            }
            .user-card {
                padding: 20px;
            }
            .user-card .user-avatar-lg {
                width: 80px;
                height: 80px;
            }
            .user-card .user-name {
                font-size: 1.1rem;
            }
            .user-card .user-email {
                font-size: 0.8rem;
            }
            .user-card .user-position {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <i class="bi bi-google"></i> DMSProject
        </div>
        <div class="search-bar position-relative">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" placeholder="Search in Drive">
        </div>
        <div class="user-profile">
            <div class="icon-group">
                <i class="bi bi-bell"></i>
                <i class="bi bi-gear"></i>
                <i class="bi bi-question-circle"></i>
            </div>
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content -->
        <main class="content-area">
            <div class="content-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h2>People</h2>
                    <i class="bi bi-person-fill ms-2" style="font-size: 1.8rem;"></i>
                </div>
                <div class="action-icons">
                    {{-- Anda bisa menambahkan ikon aksi spesifik untuk halaman People di sini --}}
                    <i class="bi bi-grid-fill"></i>
                    <i class="bi bi-list-ul"></i>
                </div>
            </div>

            <!-- People Filters and Search -->
            <div class="people-filters">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-organization-tab" data-bs-toggle="pill" data-bs-target="#pills-organization" type="button" role="tab" aria-controls="pills-organization" aria-selected="false">Organization</button>
                    </li>
                </ul>

                <div class="filter-dropdown dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Design Team <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Marketing</a></li>
                        <li><a class="dropdown-item" href="#">Development</a></li>
                        <li><a class="dropdown-item" href="#">HR</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Position <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Manager</a></li>
                        <li><a class="dropdown-item" href="#">Staff</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More <i class="bi bi-funnel"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                    </ul>
                </div>

                <div class="search-people-bar position-relative ms-auto">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search by name">
                </div>

                <div class="sort-by-dropdown dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by: All <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Name (A-Z)</a></li>
                        <li><a class="dropdown-item" href="#">Name (Z-A)</a></li>
                        <li><a class="dropdown-item" href="#">Recent Activity</a></li>
                    </ul>
                </div>

                <div class="view-toggle btn-group" role="group" aria-label="View toggle">
                    <button type="button" class="btn active"><i class="bi bi-grid-3x3-gap-fill"></i></button>
                    <button type="button" class="btn"><i class="bi bi-list"></i></button>
                </div>
            </div>

            <!-- People Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($people as $person)
                    <div class="col">
                        <div class="user-card">
                            <div class="card-options">
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            <div class="avatar-wrapper">
                                <img src="{{ $person['avatar_url'] }}" alt="{{ $person['name'] }}" class="user-avatar-lg">
                                @if($person['online'])
                                    <span class="online-indicator"></span>
                                @else
                                    <span class="offline-indicator"></span>
                                @endif
                            </div>
                            <div class="user-name">{{ $person['name'] }}</div>
                            <div class="user-email">{{ $person['email'] }}</div>
                            <div class="progress-wrapper">
                                <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="{{ $person['progress'] }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: {{ $person['progress'] }}%"></div>
                                </div>
                                <small class="text-muted">{{ $person['progress'] }}%</small>
                            </div>
                            <div class="user-position">{{ $person['position'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
