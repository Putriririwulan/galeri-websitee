<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Sekolah - Galaxy Theme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap');

        body {
            background: #0f172a;
            font-family: 'Inter', sans-serif;
            margin: 0;
            color: #e2e8f0;
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }
        
        html {
            scroll-behavior: smooth;
        }

        /* ==================== NAVBAR ==================== */
        .galaxy-navbar {
            background: rgba(30, 58, 138, 0.95);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            color: #f1f5f9 !important;
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-left: 0;
            padding-left: 0;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Playfair Display', serif;
        }

        .navbar-brand:hover {
            color: #3b82f6 !important;
            transform: translateY(-1px);
        }

        .school-logo {
            width: 55px;
            height: 55px;
            transition: all 0.3s ease;
            object-fit: contain;
        }

        .navbar-brand:hover .school-logo {
            transform: scale(1.05);
        }

        .navbar .container {
            padding-left: 1.25rem !important;
            padding-right: 1.25rem !important;
        }

        .navbar-nav .nav-link {
            color: #cbd5e1 !important;
            font-size: 0.875rem;
            font-weight: 500;
            margin-right: 0.85rem;
            transition: all 0.3s;
            padding: 0.35rem 0.25rem;
            border-radius: 0;
            border-bottom: 2px solid transparent;
            position: relative;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #ffffff !important;
            background: transparent;
            border-bottom: 2px solid #ffffff;
        }

        .navbar-nav .nav-link i {
            font-size: 0.8rem;
            margin-right: 0.25rem;
        }

        /* Search Container */
        .search-container {
            min-width: 180px;
        }

        .search-input {
            border-radius: 8px 0 0 8px;
            border: 1px solid #334155;
            background: #0f172a;
            color: #e2e8f0;
            font-size: 0.8rem;
            padding: 0.4rem 0.75rem;
            transition: all 0.3s;
            height: 34px;
        }

        .search-input:focus {
            outline: none;
            border-color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            color: #e2e8f0;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        .search-input::placeholder {
            color: #64748b;
        }

        .search-btn {
            border-radius: 0 8px 8px 0;
            border: 1px solid #334155;
            border-left: none;
            background: #ffffff;
            color: #1e3a8a;
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            transition: all 0.3s;
            height: 34px;
        }

        .search-btn:hover {
            background: #f1f5f9;
            border-color: #334155;
            color: #1e3a8a;
            transform: translateX(2px);
        }

        /* Login Button */
        .btn-login {
            background: #ffffff;
            color: #1e3a8a;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 0.4rem 1rem;
            font-size: 0.8rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            height: 34px;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-login:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
            color: #1e3a8a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Mobile Toggle */
        .navbar-toggler {
            border: 1px solid #334155;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
            border-color: #ffffff;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(203, 213, 225, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 20px;
            height: 20px;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 80px);
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .navbar-nav .nav-link {
                margin-right: 0;
                margin-bottom: 0.5rem;
                font-size: 1rem;
                padding: 0.75rem 1rem;
                border-bottom: none;
                border-left: 3px solid transparent;
            }

            .navbar-nav .nav-link.active,
            .navbar-nav .nav-link:hover {
                border-bottom: none;
                border-left: 3px solid #3b82f6;
                background: rgba(59, 130, 246, 0.1);
            }

            .search-container {
                min-width: 100%;
                margin-top: 1rem;
                margin-bottom: 1rem;
            }

            .btn-login {
                width: 100%;
                margin-top: 0.5rem;
                justify-content: center;
            }

            .navbar-nav {
                margin-top: 1rem;
            }

            .navbar .container {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }

        @media (max-width: 600px) {
            .navbar-brand {
                font-size: 0.95rem;
            }

            .school-logo {
                width: 38px;
                height: 38px;
            }

            .btn-login {
                padding: 0.4rem 0.9rem;
                font-size: 0.75rem;
            }

            .navbar .container {
                padding-left: 0.85rem !important;
                padding-right: 0.85rem !important;
            }

            .galaxy-navbar {
                padding-top: 0.45rem;
                padding-bottom: 0.45rem;
            }

            .navbar-nav .nav-link {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg galaxy-navbar">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                <img src="{{ asset('images/download-removebg-preview.png') }}" alt="Logo Shrewsbury" class="school-logo" style="width: 55px; height: 55px; object-fit: contain;">
                <span>Galeri Sekolah</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.dashboard') && !request()->has('section') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->get('section') == 'berita' ? 'active' : '' }}" href="{{ route('user.dashboard', ['section' => 'berita']) }}#berita" data-section="berita">Berita Terkini</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->get('section') == 'galeri' ? 'active' : '' }}" href="{{ route('user.dashboard', ['section' => 'galeri']) }}#galeri" data-section="galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.agendas.*') ? 'active' : '' }}" href="{{ route('user.agendas.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i> Agenda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.contact') ? 'active' : '' }}" href="{{ route('user.contact') }}">
                            <i class="fas fa-envelope me-1"></i> Hubungi Kami
                        </a>
                    </li>
                </ul>

                <!-- Search Section -->
                <div class="search-container me-3">
                    <form class="d-flex" id="searchForm">
                        <input class="form-control search-input" type="search" placeholder="Search..." aria-label="Search" id="searchInput">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Login Button -->
                <div>
                    <a class="btn btn-login" href="{{ route('admin.login') }}">
                         Login Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navigasi fokus section - Beranda tampilkan semua, menu lain hanya section-nya
        document.addEventListener('DOMContentLoaded', function() {
            const sections = ['home', 'berita', 'galeri', 'tentang'];
            const navLinks = document.querySelectorAll('.nav-link[data-section]');
            const currentPath = window.location.pathname;
            const isContactPage = currentPath.includes('/contact');
            
            // Search functionality
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('searchInput');
            
            // Mapping keyword search ke section/halaman
            const searchMapping = {
                'beranda': { type: 'page', target: '{{ route("user.dashboard") }}' },
                'home': { type: 'page', target: '{{ route("user.dashboard") }}' },
                'berita': { type: 'page', target: '{{ route("user.dashboard", ["section" => "berita"]) }}' },
                'berita terkini': { type: 'page', target: '{{ route("user.dashboard", ["section" => "berita"]) }}' },
                'news': { type: 'page', target: '{{ route("user.dashboard", ["section" => "berita"]) }}' },
                'galeri': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri"]) }}' },
                'gallery': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri"]) }}' },
                'foto': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri"]) }}' },
                'hubungi': { type: 'page', target: '{{ route("user.contact") }}' },
                'hubungi kami': { type: 'page', target: '{{ route("user.contact") }}' },
                'kontak': { type: 'page', target: '{{ route("user.contact") }}' },
                'contact': { type: 'page', target: '{{ route("user.contact") }}' },
                'agenda': { type: 'page', target: '{{ route("user.agendas.index") }}' },
                'agenda kegiatan': { type: 'page', target: '{{ route("user.agendas.index") }}' },
                'kegiatan': { type: 'page', target: '{{ route("user.agendas.index") }}' },
                // Kategori Galeri - dengan filter kategori (sesuai nama di database)
                'fasilitas': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Fasilitas"]) }}' },
                'ekstrakurikuler': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Ekstrakulikuler"]) }}' },
                'ekstrakulikuler': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Ekstrakulikuler"]) }}' },
                'ekskul': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Ekstrakulikuler"]) }}' },
                'lab pplg': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Lab PPLG"]) }}' },
                'laboratorium pplg': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Lab PPLG"]) }}' },
                'pplg': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Lab PPLG"]) }}' },
                'lab tjkt': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Lab TJKT"]) }}' },
                'laboratorium tjkt': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Lab TJKT"]) }}' },
                'tjkt': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Lab TJKT"]) }}' },
                'bengkel tkro': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Bengkel TKRO"]) }}' },
                'tkro': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Bengkel TKRO"]) }}' },
                'bengkel tpfl': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Bengkel TPFL"]) }}' },
                'tpfl': { type: 'page', target: '{{ route("user.dashboard", ["section" => "galeri", "category" => "Bengkel TPFL"]) }}' }
            };
            
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const query = searchInput.value.trim().toLowerCase();
                    
                    if (!query) {
                        return;
                    }
                    
                    // Cari keyword yang cocok
                    let found = false;
                    for (const [keyword, destination] of Object.entries(searchMapping)) {
                        if (query.includes(keyword) || keyword.includes(query)) {
                            found = true;
                            // Debug: tampilkan URL yang akan dituju
                            console.log('Redirecting to:', destination.target);
                            // Redirect ke halaman
                            window.location.href = destination.target;
                            // Clear search input
                            searchInput.value = '';
                            break;
                        }
                    }
                    
                    if (!found) {
                        alert('Halaman tidak ditemukan. Coba kata kunci: beranda, berita, galeri, hubungi kami, atau kategori galeri (fasilitas, ekstrakurikuler, lab pplg, lab tjkt, bengkel tkro, bengkel tpfl)');
                    }
                });
            }
            
            // Handle URL parameter untuk fokus section saat load
            const urlParams = new URLSearchParams(window.location.search);
            const sectionParam = urlParams.get('section');
            
            if (sectionParam && sections.includes(sectionParam)) {
                // Sembunyikan semua section kecuali yang diminta
                sections.forEach(sectionId => {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        if (sectionId === sectionParam) {
                            section.style.display = 'block';
                        } else {
                            section.style.display = 'none';
                        }
                    }
                });
                
                // Update active nav
                navLinks.forEach(link => {
                    if (link.getAttribute('data-section') === sectionParam) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
                
                // Scroll ke atas
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                // Jika tidak ada parameter atau refresh, tampilkan semua (Beranda)
                sections.forEach(sectionId => {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.style.display = '';
                    }
                });
                
                // Set Beranda sebagai active
                navLinks.forEach(link => {
                    if (link.getAttribute('data-section') === 'home') {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>
</html>