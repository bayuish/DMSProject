<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMSProject - My Drive</title>
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

        /* Quick Access Cards */
        .quick-access-section h4 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .quick-access-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: all 0.2s ease;
            cursor: pointer;
            height: 100%; /* Penting untuk tinggi yang sama */
        }
        .quick-access-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .quick-access-card .card-header-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .quick-access-card .shared-avatars img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-left: -8px;
            object-fit: cover;
        }
        .quick-access-card .shared-avatars img:first-child {
            margin-left: 0;
        }
        .quick-access-card .folder-icon {
            font-size: 2rem;
            color: #fbc02d; /* Warna kuning folder */
            margin-right: 10px;
        }
        .quick-access-card .folder-name {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
        }
        .quick-access-card .last-modified {
            font-size: 0.8rem;
            color: #777;
            margin-top: 5px;
        }

        /* All Files Table */
        .all-files-section {
            margin-top: 40px;
        }
        .all-files-section h4 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .all-files-table {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden; /* Untuk rounded corners */
        }
        .all-files-table .table {
            margin-bottom: 0;
        }
        .all-files-table .table thead th {
            border-bottom: 1px solid #e0e0e0;
            font-weight: 600;
            color: #555;
            padding: 15px 20px;
            background-color: #f9f9f9;
        }
        .all-files-table .table tbody td {
            padding: 15px 20px;
            vertical-align: middle;
            border-top: 1px solid #eee;
        }
        .all-files-table .table tbody tr:hover {
            background-color: #f5f5f5;
        }
        .file-name-col {
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        .file-name-col i {
            margin-right: 10px;
            font-size: 1.1rem;
            color: #777;
        }
        .file-owner-avatars img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-left: -8px;
            object-fit: cover;
        }
        .file-owner-avatars img:first-child {
            margin-left: 0;
        }
        .file-actions i {
            font-size: 1.1rem;
            color: #777;
            cursor: pointer;
            margin-left: 10px;
        }
        .file-actions i:hover {
            color: #333;
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
            .all-files-table {
                overflow-x: auto; /* Aktifkan scroll horizontal untuk tabel */
            }
            .all-files-table table {
                min-width: 700px; /* Pastikan tabel tidak terlalu sempit */
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
            .quick-access-card {
                padding: 15px;
            }
            .quick-access-card .folder-name {
                font-size: 1rem;
            }
            .all-files-table .table thead th,
            .all-files-table .table tbody td {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
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
                    <h2>My Drive</h2>
                    <i class="bi bi-folder-fill"></i>
                </div>
                <div class="action-icons">
                    <i class="bi bi-grid-fill"></i>
                    <i class="bi bi-list-ul"></i>
                    <i class="bi bi-info-circle-fill"></i>
                </div>
            </div>

            <!-- Quick Access Section -->
            <section class="quick-access-section mb-5">
                <h4>QUICK ACCESS</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="quick-access-card">
                            <div class="card-header-meta">
                                <span class="text-muted">SHARED WITH</span>
                                <div class="shared-avatars d-flex">
                                    <img src="https://placehold.co/30x30/FF6347/FFFFFF?text=A" alt="Avatar 1">
                                    <img src="https://placehold.co/30x30/4682B4/FFFFFF?text=B" alt="Avatar 2">
                                    <img src="https://placehold.co/30x30/32CD32/FFFFFF?text=C" alt="Avatar 3">
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder-fill folder-icon"></i>
                                <span class="folder-name">Folder Design Files</span>
                            </div>
                            <div class="last-modified">Last Modified: Sep 9, 2019 - 4:30 AM</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quick-access-card">
                            <div class="card-header-meta">
                                <span class="text-muted">SHARED WITH</span>
                                <div class="shared-avatars d-flex">
                                    <img src="https://placehold.co/30x30/FFD700/000000?text=D" alt="Avatar 4">
                                    <img src="https://placehold.co/30x30/DA70D6/FFFFFF?text=E" alt="Avatar 5">
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder-fill folder-icon"></i>
                                <span class="folder-name">Folder Design Photos</span>
                            </div>
                            <div class="last-modified">Last Modified: Sep 9, 2019 - 4:30 AM</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quick-access-card">
                            <div class="card-header-meta">
                                <span class="text-muted">SHARED WITH</span>
                                <div class="shared-avatars d-flex">
                                    <img src="https://placehold.co/30x30/8A2BE2/FFFFFF?text=F" alt="Avatar 6">
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder-fill folder-icon"></i>
                                <span class="folder-name">Folder Training Materials</span>
                            </div>
                            <div class="last-modified">Last Modified: Sep 9, 2019 - 4:30 AM</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- All Files Section -->
            <section class="all-files-section">
                <h4>ALL FILES</h4>
                <div class="all-files-table">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">OWNERS</th>
                                <th scope="col">LAST MODIFIED</th>
                                <th scope="col">FILE SIZE</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="file-name-col"><i class="bi bi-file-earmark-text-fill"></i> Weekly Report Docs</td>
                                <td>
                                    <div class="file-owner-avatars d-flex">
                                        <img src="https://placehold.co/30x30/FF6347/FFFFFF?text=A" alt="Owner 1">
                                    </div>
                                </td>
                                <td>Sep 9, 2019 - 4:30 AM</td>
                                <td>20 MB</td>
                                <td class="text-end file-actions"><i class="bi bi-three-dots"></i></td>
                            </tr>
                            <tr>
                                <td class="file-name-col"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Design Checklist.xlsx</td>
                                <td>
                                    <div class="file-owner-avatars d-flex">
                                        <img src="https://placehold.co/30x30/4682B4/FFFFFF?text=B" alt="Owner 2">
                                    </div>
                                </td>
                                <td>Sep 9, 2019 - 4:30 AM</td>
                                <td>20 MB</td>
                                <td class="text-end file-actions"><i class="bi bi-three-dots"></i></td>
                            </tr>
                            <tr>
                                <td class="file-name-col"><i class="bi bi-file-earmark-bar-graph-fill"></i> Weekly reports.pdf</td>
                                <td>
                                    <div class="file-owner-avatars d-flex">
                                        <img src="https://placehold.co/30x30/32CD32/FFFFFF?text=C" alt="Owner 3">
                                    </div>
                                </td>
                                <td>Sep 9, 2019 - 4:30 AM</td>
                                <td>20 MB</td>
                                <td class="text-end file-actions"><i class="bi bi-three-dots"></i></td>
                            </tr>
                            <tr>
                                <td class="file-name-col"><i class="bi bi-file-earmark-text-fill"></i> Wedding Planner List.doc</td>
                                <td>
                                    <div class="file-owner-avatars d-flex">
                                        <img src="https://placehold.co/30x30/FFD700/000000?text=D" alt="Owner 4">
                                    </div>
                                </td>
                                <td>Sep 9, 2019 - 4:30 AM</td>
                                <td>20 MB</td>
                                <td class="text-end file-actions"><i class="bi bi-three-dots"></i></td>
                            </tr>
                            <tr>
                                <td class="file-name-col"><i class="bi bi-image-fill"></i> Team JB Picture.jpg</td>
                                <td>
                                    <div class="file-owner-avatars d-flex">
                                        <img src="https://placehold.co/30x30/DA70D6/FFFFFF?text=E" alt="Owner 5">
                                    </div>
                                </td>
                                <td>Sep 9, 2019 - 4:30 AM</td>
                                <td>20 MB</td>
                                <td class="text-end file-actions"><i class="bi bi-three-dots"></i></td>
                            </tr>
                            <tr>
                                <td class="file-name-col"><i class="bi bi-image-fill"></i> Team Bert Picture.jpg</td>
                                <td>
                                    <div class="file-owner-avatars d-flex">
                                        <img src="https://placehold.co/30x30/8A2BE2/FFFFFF?text=F" alt="Owner 6">
                                    </div>
                                </td>
                                <td>Sep 9, 2019 - 4:30 AM</td>
                                <td>20 MB</td>
                                <td class="text-end file-actions"><i class="bi bi-three-dots"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
