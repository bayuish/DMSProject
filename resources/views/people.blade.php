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
            width: 100px; /* Tambahkan lebar dan tinggi agar inisial tetap di tengah */
            height: 100px;
            border-radius: 50%;
            display: flex; /* Gunakan flexbox untuk memusatkan inisial */
            align-items: center;
            justify-content: center;
            background-color: #4285f4; /* Warna latar belakang default untuk inisial */
            color: #fff; /* Warna teks untuk inisial */
            font-size: 3rem; /* Ukuran font untuk inisial */
            font-weight: 600;
            border: 3px solid #f0f2f5;
            overflow: hidden; /* Pastikan gambar tidak meluap */
        }
        .user-card .user-avatar-lg {
            width: 100%; /* Gambar mengisi wrapper */
            height: 100%; /* Gambar mengisi wrapper */
            border-radius: 50%;
            object-fit: cover;
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
        /* .user-card .progress-wrapper {
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
        } */
        .user-card .user-position {
            font-size: 0.8rem;
            color: #999;
            text-transform: uppercase;
            font-weight: 500;
        }
        .user-card .user-division { /* New style for division */
            font-size: 0.8rem;
            color: #999;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 5px; /* Add some spacing */
        }

        /* Custom Modal Styles */
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            border: none;
        }
        .modal-header {
            background-color: #4285f4; /* Warna biru Google */
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 20px;
            border-bottom: none;
        }
        .modal-header .modal-title {
            font-weight: 600;
        }
        .modal-header .btn-close {
            filter: invert(1); /* Membuat ikon close putih */
            opacity: 0.8;
        }
        .modal-header .btn-close:hover {
            opacity: 1;
        }
        .modal-body {
            padding: 30px;
        }
        .modal-footer {
            border-top: none;
            padding: 20px 30px;
            background-color: #f8f9fa; /* Latar belakang footer abu-abu muda */
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .modal-footer .btn-primary {
            background-color: #4285f4;
            border-color: #4285f4;
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 8px;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .modal-footer .btn-primary:hover {
            background-color: #3367d6;
            border-color: #3367d6;
        }
        .modal-footer .btn-secondary {
            background-color: #e9ecef;
            border-color: #e9ecef;
            color: #555;
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 8px;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .modal-footer .btn-secondary:hover {
            background-color: #dee2e6;
            border-color: #dee2e6;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4285f4;
            box-shadow: 0 0 0 0.25rem rgba(66, 133, 244, 0.25);
        }

        /* Custom Alert Styles for Success/Error */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            border-radius: 8px;
            padding: 15px 20px;
            font-weight: 500;
            animation: fadeInOut 5s forwards; /* Animasi fade out */
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            border-radius: 8px;
            padding: 15px 20px;
            font-weight: 500;
        }

        /* Keyframe for fade out animation */
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('components.navbar')

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
                    {{-- Tombol Add User --}}
                    <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-lg me-1"></i> Add User
                    </button>
                    {{-- Tombol Edit Profile dihapus dari sini --}}
                    <i class="bi bi-grid-fill"></i>
                    <i class="bi bi-list-ul"></i>
                </div>
            </div>

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please fix the following errors:
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- People Filters and Search -->
            <div class="people-filters">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        {{-- Data attribute for filter type --}}
                        <button class="nav-link {{ $currentType == 'all' ? 'active' : '' }}" id="pills-all-tab" data-filter-type="all" type="button" role="tab" aria-controls="pills-all" aria-selected="{{ $currentType == 'all' ? 'true' : 'false' }}">All</button>
                    </li>
                    {{-- Bagian Organization dihapus --}}
                </ul>

                {{-- Division Filter (Staff Specific) --}}
                <div class="filter-dropdown dropdown" id="staffDivisionFilterDropdown" style="display: none;">
                    <button class="btn dropdown-toggle" type="button" id="staffDivisionFilterButton" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                        Division Filter (Staff) <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu" id="staffDivisionFilterMenu">
                        <li><a class="dropdown-item" href="#" data-filter-name="division" data-filter-value="">All Divisions</a></li>
                        <li><a class="dropdown-item {{ $currentDivision == 'Human Resource' ? 'active' : '' }}" href="#" data-filter-name="division" data-filter-value="Human Resource">Human Resource</a></li>
                        <li><a class="dropdown-item {{ $currentDivision == 'Legal' ? 'active' : '' }}" href="#" data-filter-name="division" data-filter-value="Legal">Legal</a></li>
                        <li><a class="dropdown-item {{ $currentDivision == 'Technical' ? 'active' : '' }}" href="#" data-filter-name="division" data-filter-value="Technical">Technical</a></li>
                        <li><a class="dropdown-item {{ $currentDivision == 'Finance' ? 'active' : '' }}" href="#" data-filter-name="division" data-filter-value="Finance">Finance</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Position <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu" id="positionFilterDropdown">
                        <li><a class="dropdown-item" href="#" data-filter-name="position" data-filter-value="">All Positions</a></li>
                        <li><a class="dropdown-item {{ $currentPosition == 'Staff' ? 'active' : '' }}" href="#" data-filter-name="position" data-filter-value="Staff">Staff</a></li>
                        <li><a class="dropdown-item {{ $currentPosition == 'Manager HR' ? 'active' : '' }}" href="#" data-filter-name="position" data-filter-value="Manager HR">Manager HR</a></li>
                        <li><a class="dropdown-item {{ $currentPosition == 'Manager Finance' ? 'active' : '' }}" href="#" data-filter-name="position" data-filter-value="Manager Finance">Manager Finance</a></li>
                        <li><a class="dropdown-item {{ $currentPosition == 'Manager Technical' ? 'active' : '' }}" href="#" data-filter-name="position" data-filter-value="Technical">Technical</a></li>
                        <li><a class="dropdown-item {{ $currentPosition == 'Manager Legal' ? 'active' : '' }}" href="#" data-filter-name="position" data-filter-value="Manager Legal">Manager Legal</a></li>
                    </ul>
                </div>

                {{-- Bagian More dihapus --}}

                <div class="search-people-bar position-relative ms-auto">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" id="searchPeopleInput" placeholder="Search by name" value="{{ $currentSearch }}">
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
                                @if(isset($person['avatar_url']) && $person['avatar_url'])
                                    <img src="{{ $person['avatar_url'] }}" alt="{{ $person['name'] }}" class="user-avatar-lg">
                                @else
                                    {{ strtoupper(substr($person['name'], 0, 1)) }}
                                @endif
                                @if(isset($person['online']) && $person['online'])
                                    <span class="online-indicator"></span>
                                @else
                                    <span class="offline-indicator"></span>
                                @endif
                            </div>
                            <div class="user-name">{{ $person['name'] }}</div>
                            <div class="user-email">{{ $person['email'] }}</div>
                            {{-- Menggunakan $person->role karena disimpan ke kolom 'role' --}}
                            <div class="user-position">{{ $person->role ?? 'N/A' }}</div>
                            <div class="user-division">{{ $person->division ?? 'N/A' }}</div> {{-- Menampilkan divisi --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('people.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" required>
                                <option value="" disabled {{ old('position') ? '' : 'selected' }}>Select a position</option>
                                <option value="Staff" {{ old('position') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                <option value="Manager HR" {{ old('position') == 'Manager HR' ? 'selected' : '' }}>Manager HR</option>
                                <option value="Manager Finance" {{ old('position') == 'Manager Finance' ? 'selected' : '' }}>Manager Finance</option>
                                <option value="Manager Technical" {{ old('position') == 'Manager Technical' ? 'selected' : '' }}>Manager Technical</option>
                                <option value="Manager Legal" {{ old('position') == 'Manager Legal' ? 'selected' : '' }}>Manager Legal</option>
                            </select>
                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="division" class="form-label">Division</label>
                            <select class="form-select @error('division') is-invalid @enderror" id="division" name="division">
                                <option value="" disabled {{ old('division') ? '' : 'selected' }}>Select a division</option>
                                <option value="Human Resource" {{ old('division') == 'Human Resource' ? 'selected' : '' }}>Human Resource</option>
                                <option value="Legal" {{ old('division') == 'Legal' ? 'selected' : '' }}>Legal</option>
                                <option value="Technical" {{ old('division') == 'Technical' ? 'selected' : '' }}>Technical</option>
                                <option value="Finance" {{ old('division') == 'Finance' ? 'selected' : '' }}>Finance</option>
                            </select>
                            @error('division')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function applyFilters() {
            const url = new URL(window.location.href);
            const params = url.searchParams;

            // Get values from filter elements
            const activeTypePill = document.querySelector('.nav-pills .nav-link.active');
            const type = activeTypePill ? activeTypePill.dataset.filterType : 'all';

            // Get selected position from the main position dropdown
            const selectedPosition = document.getElementById('positionFilterDropdown').querySelector('.dropdown-item.active')?.dataset.filterValue || '';

            // The general division filter ('More') has been removed, so we only consider the staff-specific one.
            const staffDivision = document.getElementById('staffDivisionFilterMenu').querySelector('.dropdown-item.active')?.dataset.filterValue || '';

            const search = document.getElementById('searchPeopleInput')?.value;

            // Set parameters
            params.set('type', type);

            // Handle position filter
            if (selectedPosition) {
                params.set('position', selectedPosition);
            } else {
                params.delete('position');
            }

            // Handle division filter: only apply if position is Staff and a staff-specific division is selected
            if (selectedPosition === 'Staff' && staffDivision) {
                params.set('division', staffDivision);
            } else {
                params.delete('division'); // Ensure division is cleared if not Staff or no staff-division selected
            }

            if (search) {
                params.set('search', search);
            } else {
                params.delete('search');
            }

            // Redirect to the new URL with filters
            url.search = params.toString();
            window.location.href = url.toString();
        }

        function toggleStaffDivisionFilter() {
            const positionDropdown = document.getElementById('positionFilterDropdown');
            const staffDivisionFilterDropdown = document.getElementById('staffDivisionFilterDropdown');
            const staffDivisionFilterButton = document.getElementById('staffDivisionFilterButton');
            const staffDivisionFilterMenu = document.getElementById('staffDivisionFilterMenu');

            // Find the currently active position from the dropdown items
            const selectedPositionElement = positionDropdown.querySelector('.dropdown-item.active');
            const selectedPosition = selectedPositionElement ? selectedPositionElement.dataset.filterValue : '';

            if (selectedPosition === 'Staff') {
                staffDivisionFilterDropdown.style.display = 'block'; // Show the filter
                staffDivisionFilterButton.removeAttribute('disabled'); // Enable the button
                staffDivisionFilterButton.setAttribute('data-bs-toggle', 'dropdown'); // Ensure dropdown functionality
            } else {
                staffDivisionFilterDropdown.style.display = 'none'; // Hide the filter
                staffDivisionFilterButton.setAttribute('disabled', 'true'); // Disable the button
                staffDivisionFilterButton.removeAttribute('data-bs-toggle'); // Remove dropdown functionality
                staffDivisionFilterButton.removeAttribute('aria-expanded'); // Remove expanded state

                // If the staff-specific division filter was active and position is no longer Staff, clear the division filter
                const url = new URL(window.location.href);
                const params = url.searchParams;
                if (params.has('division')) {
                    // This check is now simpler, as 'division' parameter should only be set if 'Staff' is selected
                    // If position is not 'Staff', then any existing 'division' parameter should be cleared.
                    if (selectedPosition !== 'Staff') {
                         params.delete('division');
                         url.search = params.toString();
                         window.location.href = url.toString();
                    }
                }
            }
        }


        document.addEventListener('DOMContentLoaded', function () {
            // JavaScript untuk menampilkan modal jika ada error validasi
            @if ($errors->any())
                var addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));
                addUserModal.show();
            @endif

            // Initial call to set the state of the staff-specific division filter
            toggleStaffDivisionFilter();

            // Event listeners for pills (All/Organization)
            document.querySelectorAll('.nav-pills .nav-link').forEach(pill => {
                pill.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Update the active state visually (Bootstrap handles this for pills with data-bs-toggle="pill")
                    // We just need to ensure applyFilters reads the *correct* active pill after Bootstrap updates it.
                    setTimeout(applyFilters, 50);
                });
            });

            // Event listeners for dropdown items (Position, Division)
            document.querySelectorAll('.filter-dropdown .dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const filterName = this.dataset.filterName;
                    const filterValue = this.dataset.filterValue;

                    const url = new URL(window.location.href);
                    const params = url.searchParams;

                    // Remove active class from all siblings
                    this.closest('ul').querySelectorAll('.dropdown-item').forEach(sibling => {
                        sibling.classList.remove('active');
                    });
                    // Add active class to the clicked item
                    this.classList.add('active');

                    if (filterValue) {
                        params.set(filterName, filterValue);
                    } else {
                        params.delete(filterName); // Remove parameter if 'All' is selected
                    }

                    // Special handling for position dropdown to trigger staff division filter toggle
                    if (filterName === 'position') {
                        // Update the URL first, then let the DOMContentLoaded or next applyFilters handle the state
                        url.search = params.toString();
                        window.location.href = url.toString();
                        return; // Exit to prevent double redirection
                    }

                    // For other filters, apply immediately
                    applyFilters();
                });
            });

            // Event listener for search input (on Enter key)
            document.getElementById('searchPeopleInput')?.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    applyFilters();
                }
            });

            // Event listener for position dropdown changes to toggle staff division filter
            // This is handled by the click listener on dropdown items, which reloads the page.
            // The toggleStaffDivisionFilter() is called on DOMContentLoaded to set initial state.
            // No separate 'change' listener needed on the select itself as it's a dropdown menu.
        });
    </script>
</body>
</html>
