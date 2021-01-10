<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ action([App\Http\Controllers\StudentMongoController::class, 'index']) }}">
                    Students <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ action([App\Http\Controllers\SettingController::class, 'syncIndex']) }}">
                    Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
