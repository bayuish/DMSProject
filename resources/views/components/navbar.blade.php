{{-- resources/views/components/navbar.blade.php --}}
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
        {{-- Avatar dengan Dropdown --}}
        <div class="user-avatar dropdown" role="button" id="userProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::user()->avatar_url)
                <img src="{{ Auth::user()->avatar_url }}" alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
            @else
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            @endif
        </div>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userProfileDropdown">
            <li><h6 class="dropdown-header">{{ Auth::user()->name }}</h6></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                <i class="bi bi-pencil-square me-2"></i> Edit Profile
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                {{-- Tombol Logout akan memicu fungsi JavaScript yang sekarang ada di app.blade.php --}}
                <button type="button" class="dropdown-item" id="logout-button">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </li>
        </ul>
    </div>
</header>
{{-- Script Logout telah dipindahkan ke app.blade.php --}}
