<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RenderWonders</title>
    <!-- Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (opsional, untuk font yang lebih modern) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS Anda -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang umum */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            display: flex;
            width: 90%; /* Sesuaikan lebar sesuai kebutuhan */
            max-width: 1200px; /* Batasi lebar maksimum */
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Penting untuk radius border */
        }
        .login-form-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-illustration-section {
            flex: 1;
            background: linear-gradient(135deg, #a8dadc, #457b9d); /* Gradien warna biru */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .login-illustration-section .abstract-shape {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }
        .login-illustration-section .abstract-shape img {
            max-width: 80%;
            height: auto;
            opacity: 0.7; /* Sedikit transparan */
        }
        .login-illustration-section .content {
            position: relative;
            z-index: 2;
        }
        .login-form-section .logo {
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
        }
        .login-form-section h2 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }
        .login-form-section p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(69, 123, 157, 0.25);
            border-color: #457b9d;
        }
        .btn-primary {
            background-color: #1d9dcc; /* Warna tombol biru */
            border-color: #1d9dcc;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #147da0;
            border-color: #147da0;
        }
        .btn-google {
            background-color: #fff;
            color: #555;
            border: 1px solid #ddd;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-google:hover {
            background-color: #f0f0f0;
        }
        .btn-google img {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }
        .or-divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #aaa;
        }
        .or-divider::before,
        .or-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background-color: #eee;
        }
        .or-divider::before {
            left: 0;
        }
        .or-divider::after {
            right: 0;
        }
        .already-have-account {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }
        .already-have-account a {
            color: #457b9d;
            font-weight: 600;
            text-decoration: none;
        }
        .already-have-account a:hover {
            text-decoration: underline;
        }
        .illustration-text-main {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .illustration-text-bottom {
            font-size: 0.9rem;
            line-height: 1.5;
            opacity: 0.9;
        }
        .illustration-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .illustration-buttons .btn {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .illustration-buttons .btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.6);
        }
        .join-users-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #666;
        }
        .join-users-section .avatars img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-right: -10px;
            object-fit: cover;
        }
        .join-users-section .avatars img:first-child {
            margin-left: 0;
        }
        .join-users-section .btn {
            background-color: #f0f0f0;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: #777;
            transition: background-color 0.3s ease;
        }
        .join-users-section .btn:hover {
            background-color: #e0e0e0;
        }
        /* Error message styling */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }


        /* Responsive adjustments */
        @media (max-width: 992px) {
            .login-illustration-section {
                display: none; /* Sembunyikan ilustrasi di layar kecil */
            }
            .login-container {
                width: 95%;
                max-width: 500px; /* Batasi lebar container saat ilustrasi hilang */
                flex-direction: column;
            }
            .login-form-section {
                padding: 30px;
            }
        }
        @media (max-width: 576px) {
            .login-form-section {
                padding: 20px;
            }
            .login-form-section h2 {
                font-size: 1.8rem;
            }
            .login-form-section .logo {
                font-size: 1.5rem;
            }
            .or-divider {
                margin: 20px 0;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form-section">
            <div class="logo">RenderWonders</div>
            <h2 class="mb-2">Welcome to</h2>
            <h2 class="mb-3">RenderWonders</h2>
            <p>Gaze and attention modeling powered by AI is optimizing virtual reality experiences</p>

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf {{-- CSRF token for security --}}

                <div class="mb-3 position-relative">
                    <label for="email" class="form-label visually-hidden">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="hello@hatype.studio" style="border-radius: 0 10px 10px 0;">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 position-relative">
                    <label for="password" class="form-label visually-hidden">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Password" style="border-radius: 0 10px 10px 0;">
                        <span class="input-group-text bg-white border-start-0" style="border-radius: 0 10px 10px 0;"><i class="bi bi-eye"></i></span>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="or-divider">or</div>

            <div class="d-grid">
                {{-- Placeholder for Google Login --}}
                <button class="btn btn-google">
                    <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google icon">
                    Login with Google
                </button>
            </div>

            <div class="already-have-account">
                {{-- Don't have an account? <a href="{{ route('register') }}">Sign up</a> --}}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="mt-2 d-inline-block">Forgot your password?</a>
                @endif
            </div>

            <div class="join-users-section">
                <div>
                    Join with 20k+ Users!
                    <br>Let's see our happy customer
                </div>
                <div class="d-flex align-items-center">
                    <div class="avatars">
                        <img src="https://via.placeholder.com/40" alt="User 1">
                        <img src="https://via.placeholder.com/40" alt="User 2" style="margin-left: -15px;">
                        <img src="https://via.placeholder.com/40" alt="User 3" style="margin-left: -15px;">
                        <img src="https://via.placeholder.com/40" alt="User 4" style="margin-left: -15px;">
                    </div>
                    <button class="btn ms-3"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="login-illustration-section">
            <div class="abstract-shape">
                <img src="https://i.ibb.co/L5QzXkM/abstract-3d-shape.png" alt="Abstract 3D Shape">
            </div>
            <div class="content">
                <h3 class="illustration-text-main">AI Revolutionizing the way we create, render, and experience content.</h3>
                <div class="illustration-buttons">
                    <button class="btn"><i class="bi bi-play-fill"></i></button>
                    <button class="btn">Creating</button>
                    <button class="btn"><i class="bi bi-chevron-left"></i></button>
                    <button class="btn"><i class="bi bi-chevron-right"></i></button>
                </div>
                <p class="illustration-text-bottom mt-4">
                    Create design brief with AI voice command to make awesome 3d images that suits your needs.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
