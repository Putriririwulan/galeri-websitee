<!DOCTYPE html>
<html>
<head>
    <title>Galeri Sekolah</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #e5e7eb;
            color: #1f2937;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* ==================== NAVBAR ==================== */
        nav {
            background: #ffffff;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            height: 70px;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid #e2e8f0;
        }

        /* Hamburger Menu Button */
        .menu-toggle {
            display: flex;
            flex-direction: column;
            gap: 5px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 1001;
            transition: all 0.3s ease;
        }
        
        .menu-toggle:hover {
            background: #f1f5f9;
            border-radius: 8px;
        }

        .menu-toggle span {
            width: 25px;
            height: 3px;
            background: #1e3a8a;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        nav > div:first-child {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        nav a {
            color: #1e293b;
            text-decoration: none;
            margin-right: 0;
            font-weight: 600;
            transition: color 0.2s;
            font-size: 0.95rem;
        }

        nav a:hover {
            color: #2563eb;
        }

        nav a strong {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2563eb;
            letter-spacing: -0.5px;
        }

        /* Logo Icon Style */
        .logo-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: transparent;
            border-radius: 8px;
            overflow: hidden;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* User Profile Section */
        nav > div:last-child {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-left: auto;
        }

        nav form {
            display: inline;
        }

        nav button {
            background: #ef4444;
            color: white;
            border: 1px solid #dc2626;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
        }

        nav button:hover {
            background: #dc2626;
            border-color: #b91c1c;
            transform: translateY(-1px);
        }

        /* ==================== LAYOUT ==================== */
        .layout {
            display: flex;
            flex: 1;
            position: relative;
        }

        /* ==================== SIDEBAR ==================== */
        .sidebar {
            width: 280px;
            background: #ffffff;
            padding: 1.5rem 0;
            position: fixed;
            left: 0;
            top: 70px;
            height: calc(100vh - 70px);
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 900;
        }
        
        /* Sidebar glow effect */
        .sidebar::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg, 
                transparent 0%, 
                rgba(59, 130, 246, 0.3) 50%, 
                transparent 100%);
            animation: sidebarGlow 3s ease-in-out infinite;
        }
        
        @keyframes sidebarGlow {
            0%, 100% {
                opacity: 0.5;
            }
            50% {
                opacity: 1;
            }
        }
        
        /* Sidebar collapsed state */
        .sidebar.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        /* Logo in Sidebar */
        .sidebar::before {
            content: 'Shrewsbury International School';
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            margin-bottom: 2rem;
            font-size: 1.2rem;
            font-weight: 700;
            color: #2563eb;
        }

        .sidebar h2 {
            font-size: 0.7rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            margin-top: 1.5rem;
            padding: 0 1rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .sidebar h2:first-of-type {
            margin-top: 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 0.85rem 1.25rem;
            border-radius: 10px;
            transition: all 0.2s;
            background: transparent;
            font-weight: 500;
            margin: 0.25rem 1rem;
        }

        .sidebar a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        /* Active state - check current route */
        .sidebar a.active {
            background: #2563eb;
            color: white;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        .sidebar svg {
            width: 22px;
            height: 22px;
        }

        /* ==================== CONTENT AREA ==================== */
        .content {
            flex: 1;
            padding: 2rem;
            padding-bottom: 2rem;
            background: #e5e7eb;
            margin-left: 280px;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s ease;
        }
        
        /* Content full width when sidebar collapsed */
        body:has(.sidebar.collapsed) .content {
            margin-left: 0;
        }

        /* ==================== TABLE & FORM FIXES ==================== */
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        thead {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
        }

        thead th {
            padding: 1rem 1.25rem;
            text-align: left;
            font-weight: 600;
            color: #1e293b;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        tbody td {
            padding: 1rem 1.25rem;
            border-top: 1px solid #e2e8f0;
            color: #475569;
            font-size: 0.875rem;
        }

        tbody tr {
            transition: all 0.2s;
            background: #ffffff;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        /* Forms */
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1e293b;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* ==================== CARD STYLING ==================== */
        .card {
            background: #2563eb !important;
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3) !important;
            color: #ffffff !important;
        }

        .card-header {
            background: rgba(255, 255, 255, 0.1) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            font-weight: 600 !important;
        }

        .card-body {
            color: #ffffff !important;
        }

        .card-title {
            color: #ffffff !important;
            font-weight: 700 !important;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* ==================== TABLE STYLING ==================== */
        .table-wrapper {
            overflow-x: auto;
            background: transparent !important;
            border-radius: 16px;
            padding: 0 !important;
            box-shadow: none !important;
            border: none !important;
        }

        .table-aesthetic {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: transparent;
            margin-bottom: 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table-aesthetic th {
            background: #2563eb !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-bottom: 3px solid #1d4ed8 !important;
            border-right: 2px solid #1d4ed8 !important;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.9rem;
            padding: 1.2rem 1.5rem !important;
        }

        .table-aesthetic th:last-child {
            border-right: none !important;
        }

        .table-aesthetic th:first-child {
            border-top-left-radius: 10px;
        }

        .table-aesthetic th:last-child {
            border-top-right-radius: 10px;
        }

        .table-aesthetic tbody tr {
            background: #ffffff !important;
            border-bottom: 2px solid #d1d5db !important;
            transition: all 0.3s;
        }

        .table-aesthetic tbody tr:hover {
            background: #f3f4f6 !important;
            transform: translateX(5px);
        }

        .table-aesthetic tbody tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        .table-aesthetic tbody tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        .table-aesthetic td {
            color: #1f2937 !important;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 1.2rem 1.5rem !important;
            vertical-align: middle;
            text-align: center;
            border-right: 2px solid #e5e7eb !important;
        }

        .table-aesthetic td:last-child {
            border-right: none !important;
        }

        .table-aesthetic td img {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: 2px solid #d1d5db;
            background: #ffffff;
            max-width: 100px;
            height: 100px;
            object-fit: cover;
            transition: all 0.3s;
        }

        .table-aesthetic td img:hover {
            transform: scale(1.15) rotate(-2deg);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.4);
            border-color: #2563eb;
        }

        /* Button Styling */
        .btn-aesthetic {
            background: #2563eb !important;
            color: #fff !important;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-aesthetic:hover {
            background: #1d4ed8 !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.5);
            color: #fff !important;
        }

        .btn-warning {
            background: #60a5fa !important;
            color: #fff !important;
            box-shadow: 0 2px 8px rgba(96, 165, 250, 0.3);
        }

        .btn-warning:hover {
            background: #3b82f6 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.5);
            color: #fff !important;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="file"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3b82f6;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2),
                        0 4px 20px rgba(59, 130, 246, 0.3);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Buttons */
        button,
        .btn,
        a.btn {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            background: linear-gradient(135deg, 
                rgba(59, 130, 246, 0.8) 0%, 
                rgba(139, 92, 246, 0.8) 100%);
            backdrop-filter: blur(10px);
            color: white;
            border: 1px solid rgba(59, 130, 246, 0.5);
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.4),
                        inset 0 1px 0 rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        button::before,
        .btn::before,
        a.btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.3), 
                transparent);
            transition: left 0.5s;
        }
        
        button:hover::before,
        .btn:hover::before,
        a.btn:hover::before {
            left: 100%;
        }

        button:hover,
        .btn:hover,
        a.btn:hover {
            background: linear-gradient(135deg, 
                rgba(59, 130, 246, 1) 0%, 
                rgba(139, 92, 246, 1) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(59, 130, 246, 0.6);
        }

        button.btn-danger,
        .btn-danger {
            background: linear-gradient(135deg, 
                rgba(239, 68, 68, 0.8) 0%, 
                rgba(220, 38, 38, 0.8) 100%);
            border-color: rgba(239, 68, 68, 0.5);
        }

        button.btn-danger:hover,
        .btn-danger:hover {
            background: linear-gradient(135deg, 
                rgba(239, 68, 68, 1) 0%, 
                rgba(220, 38, 38, 1) 100%);
            box-shadow: 0 6px 30px rgba(239, 68, 68, 0.6);
        }

        button.btn-success,
        .btn-success {
            background: linear-gradient(135deg, 
                rgba(16, 185, 129, 0.8) 0%, 
                rgba(5, 150, 105, 0.8) 100%);
            border-color: rgba(16, 185, 129, 0.5);
        }

        button.btn-success:hover,
        .btn-success:hover {
            background: linear-gradient(135deg, 
                rgba(16, 185, 129, 1) 0%, 
                rgba(5, 150, 105, 1) 100%);
            box-shadow: 0 6px 30px rgba(16, 185, 129, 0.6);
        }

        /* Headings in content */
        .content h1,
        .content h2,
        .content h3,
        .content h4 {
            color: #f1f5f9;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .content h1::after,
        .content h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #06b6d4 0%, transparent 100%);
        }

        .content h1 {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .content h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .content p {
            color: #e2e8f0;
            line-height: 1.6;
        }

        /* Alert messages */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .alert::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: currentColor;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.5);
            color: #22c55e;
        }

        .alert-error,
        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #ef4444;
        }

        /* Card containers */
        .card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-top: 3px solid rgba(59, 130, 246, 0.6);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3),
                        inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(59, 130, 246, 0.5) 50%, 
                transparent 100%);
        }

        .card-header {
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid rgba(6, 182, 212, 0.3);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #06b6d4;
        }

        /* Image previews */
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 1024px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 70px;
                bottom: 0;
                width: 280px;
                background: rgba(15, 23, 42, 0.95);
                backdrop-filter: blur(30px) saturate(180%);
                transform: translateX(-100%);
                z-index: 999;
                padding: 1.5rem 0;
                overflow-y: auto;
                box-shadow: 4px 0 30px rgba(0, 0, 0, 0.5),
                            inset -1px 0 0 rgba(59, 130, 246, 0.3);
            }

            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar.collapsed {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar::before {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }

            .content {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 1rem;
                height: auto;
                min-height: 60px;
            }

            nav > div:first-child {
                gap: 1rem;
            }

            nav a strong {
                font-size: 1.1rem;
            }

            nav a strong::before {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            nav button {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .sidebar {
                width: 280px;
            }

            table {
                font-size: 0.8rem;
            }

            thead th,
            tbody td {
                padding: 0.75rem 0.5rem;
            }
        }


        @media (max-width: 480px) {
            .content {
                padding: 1rem;
            }

            nav {
                padding: 0.75rem 1rem;
            }

            .sidebar {
                width: 100%;
            }

            .profile-button span {
                display: none;
            }

            .profile-avatar {
                width: 32px;
                height: 32px;
            }
        }

        /* Overlay untuk mobile menu */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* ==================== PROFILE DROPDOWN ==================== */
        .profile-dropdown {
            position: relative;
        }

        .profile-button {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px) saturate(180%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .profile-button:hover {
            background: rgba(30, 41, 59, 0.8);
            border-color: #3b82f6;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
            transform: translateY(-1px);
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #3b82f6;
        }

        .profile-dropdown-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 16px;
            min-width: 220px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5),
                        inset 0 1px 0 rgba(255, 255, 255, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            z-index: 1000;
            overflow: hidden;
        }

        .profile-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1.25rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
        }

        .dropdown-item svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .dropdown-item:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .dropdown-item.logout-item:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .dropdown-divider {
            height: 1px;
            background: #334155;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div>
            <!-- Hamburger Menu Button -->
            <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 0.75rem;">
                <div class="logo-icon">
                    <img src="{{ asset('images/download (1).png') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <strong>Galeri Sekolah</strong>
            </a>
        </div>
        <div>
            @auth('admin')
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <!-- Profile Dropdown -->
                    <div class="profile-dropdown">
                        <button class="profile-button" onclick="toggleProfileDropdown()">
                            <img src="{{ auth('admin')->user()->profile_photo ? asset('storage/' . auth('admin')->user()->profile_photo) : asset('images/default-avatar.svg') }}" 
                                 alt="Profile" 
                                 class="profile-avatar">
                            <span>{{ auth('admin')->user()->username }}</span>
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="profile-dropdown-menu" id="profileDropdown">
                            <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profil Saya
                            </a>
                            <a href="{{ route('admin.profile.change-password') }}" class="dropdown-item">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Ganti Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item logout-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Overlay untuk mobile menu -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Layout utama -->
    <div class="layout">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <h2>Menu Utama</h2>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') || request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('galleries.index') }}" class="{{ request()->is('admin/galleries*') && !request()->is('admin/dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="5" width="18" height="14" rx="3"/>
                    <circle cx="8.5" cy="12.5" r="1.5"/>
                    <path d="M21 19l-5.5-5.5a2 2 0 0 0-2.8 0L3 19"/>
                </svg>
                Galeri
            </a>
            <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="2"/>
                    <rect x="14" y="3" width="7" height="7" rx="2"/>
                    <rect x="14" y="14" width="7" height="7" rx="2"/>
                    <rect x="3" y="14" width="7" height="7" rx="2"/>
                </svg>
                Kategori
            </a>
            <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                Berita Terkini
            </a>
            <a href="{{route('about.index') }}" class="{{ request()->routeIs('about.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Tentang Kami
            </a>
            <a href="{{ route('contacts.index') }}" class="{{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Kontak
            </a>
            <a href="{{ route('agendas.index') }}" class="{{ request()->routeIs('agendas.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                Agenda Kegiatan
            </a>
        </div>

        <!-- Konten -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    <script>
        // Toggle Sidebar Menu
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuToggle = document.querySelector('.menu-toggle');
            
            // Check if mobile or desktop
            if (window.innerWidth <= 1024) {
                // Mobile behavior
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
                menuToggle.classList.toggle('active');
                
                // Prevent body scroll when sidebar is open
                if (sidebar.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            } else {
                // Desktop behavior - collapse/expand
                sidebar.classList.toggle('collapsed');
                menuToggle.classList.toggle('active');
            }
        }

        // Toggle Profile Dropdown
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.matches('.profile-button') && !e.target.closest('.profile-button')) {
                const dropdown = document.getElementById('profileDropdown');
                if (dropdown && dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        });

        // Close sidebar when clicking on a link (mobile)
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 1024) {
                        toggleSidebar();
                    }
                });
            });
        });

        // Close sidebar on window resize if it's open
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                const menuToggle = document.querySelector('.menu-toggle');
                
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                menuToggle.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>