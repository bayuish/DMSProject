<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMSProject - Edit Profile</title>
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

        /* Profile Edit Specific Styles */
        .profile-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: 0 auto;
        }
        .profile-avatar-upload {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-avatar-upload img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f0f2f5;
            margin-bottom: 15px;
        }
        .profile-avatar-upload label {
            display: block;
            cursor: pointer;
            color: #4285f4;
            font-weight: 500;
            transition: color 0.2s;
        }
        .profile-avatar-upload label:hover {
            color: #3367d6;
        }
        .profile-avatar-upload input[type="file"] {
            display: none;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
        .profile-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        .profile-actions .btn-primary {
            background-color: #4285f4;
            border-color: #4285f4;
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 8px;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .profile-actions .btn-primary:hover {
            background-color: #3367d6;
            border-color: #3367d6;
        }
        .profile-actions .btn-secondary {
            background-color: #e9ecef;
            border-color: #e9ecef;
            color: #555;
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 8px;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .profile-actions .btn-secondary:hover {
            background-color: #dee2e6;
            border-color: #dee2e6;
        }
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
            <div class="content-header d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <h2>Edit Profile</h2>
                    <i class="bi bi-person-circle ms-2" style="font-size: 1.8rem;"></i>
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

            <div class="profile-card">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Gunakan method PUT untuk update --}}

                    <div class="profile-avatar-upload">
                        <img src="{{ Auth::user()->avatar_url ?? 'https://placehold.co/120x120/4285f4/FFFFFF?text=' . strtoupper(substr(Auth::user()->name, 0, 1)) }}" alt="Profile Photo" id="profilePhotoPreview">
                        <label for="profile_photo">Upload Photo</label>
                        <input type="file" id="profile_photo" name="profile_photo" accept="image/png, image/jpeg, image/jpg">
                        <small class="form-text text-muted">At least 256x256px PNG or JPG file.</small>
                        @error('profile_photo')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}">
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="position_display">Position</label>
                        <input type="text" class="form-control" id="position_display" value="{{ Auth::user()->role ?? 'N/A' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="division_display">Division</label>
                        <input type="text" class="form-control" id="division_display" value="{{ Auth::user()->division ?? 'N/A' }}" readonly>
                    </div>

                    <div class="profile-actions">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Preview gambar profil saat diunggah
            const profilePhotoInput = document.getElementById('profile_photo');
            const profilePhotoPreview = document.getElementById('profilePhotoPreview');

            if (profilePhotoInput && profilePhotoPreview) {
                profilePhotoInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            profilePhotoPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Menghilangkan flash message setelah beberapa detik
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    new bootstrap.Alert(alert).close();
                }, 5000); // Tutup setelah 5 detik
            });

            // --- DIAGNOSIS: Log the image source on page load ---
            console.log("Current profile photo src:", profilePhotoPreview.src);
            // --- END DIAGNOSIS ---
        });
    </script>
</body>
</html>
