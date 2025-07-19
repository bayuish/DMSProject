<aside class="sidebar">
    <button class="btn btn-upload mb-4">
        <i class="bi bi-plus-lg"></i> Upload New Files
    </button>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}"><i class="bi bi-house-door-fill"></i> HOME</a></li>
        <li><a href="{{ route('people.index') }}" class="{{ Request::routeIs('people.index') ? 'active' : '' }}"><i class="bi bi-person-fill"></i> PEOPLE</a></li>
        <li><a href="#"><i class="bi bi-folder-fill"></i> My Drive</a></li>
        <li><a href="#"><i class="bi bi-pc-display"></i> Computers</a></li>
        <li><a href="#"><i class="bi bi-people-fill"></i> Shared with Me</a></li>
        <li><a href="#"><i class="bi bi-clock-history"></i> Recents</a></li>
        <li><a href="#"><i class="bi bi-star-fill"></i> Starred</a></li>
        <li><a href="#"><i class="bi bi-trash-fill"></i> Trash</a></li>
        <li><a href="#"><i class="bi bi-cloud-upload-fill"></i> Backups</a></li>
    </ul>

    <div class="storage-details">
        <h6>STORAGE DETAILS</h6>
        <div class="progress" role="progressbar" aria-label="Storage usage" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 60%"></div>
        </div>
        <div class="usage-info">
            <span>60.70 GB of 1TB used</span>
            <span>60%</span>
        </div>
        <div class="usage-item">
            <i class="bi bi-image-fill"></i> 0 GB of 1TB used
        </div>
        <div class="usage-item">
            <i class="bi bi-camera-video-fill"></i> 10.70 GB of 1TB used
        </div>
        <a href="#" class="upgrade-link">Upgrade Storage <i class="bi bi-arrow-right"></i></a>
    </div>
</aside>
