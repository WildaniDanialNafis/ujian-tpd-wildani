<nav class="sidebar">
    <div class="px-4 mb-4">
        <h3 class="h6 fw-bold text-uppercase text-muted mb-4 d-flex align-items-center gap-2">
            <i class="fas fa-bars"></i> Menu
        </h3>
        <ul class="nav flex-column">
            <li>
                <a class="nav-link d-flex align-items-center gap-3 {{ request()->is('/arsip') ? 'active' : '' }}" href="{{ url('/arsip') }}">
                    <i class="fas fa-inbox"></i> Arsip
                </a>
            </li>
            <li>
                <a class="nav-link d-flex align-items-center gap-3 {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ url('/kategori') }}">
                    <i class="fas fa-tags"></i> Kategori Surat
                </a>
            </li>
            <li>
                <a class="nav-link d-flex align-items-center gap-3 {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">
                    <i class="fas fa-info-circle"></i> About
                </a>
            </li>
        </ul>
    </div>
    <div class="px-4 mt-auto pt-4 border-top" style="border-color: var(--border-color);">
        <p class="text-muted small mb-0">&copy; 2025 Arsip Surat</p>
    </div>
</nav>