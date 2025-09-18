<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DompetPlan</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom Styles --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 280px;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            padding: 1.5rem 1rem;
            transition: all 0.3s ease-in-out;
        }
        .sidebar.collapsed {
            width: 80px;
            padding: 1.5rem 0.5rem;
        }
        .sidebar .brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: #4338ca;
            margin-bottom: 2rem;
            white-space: nowrap;
            transition: opacity 0.3s;
        }
        .sidebar.collapsed .brand {
            opacity: 0;
        }
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            font-weight: 500;
            color: #374151;
            border-radius: 0.5rem;
            transition: all .2s;
            white-space: nowrap;
        }
        .sidebar .nav-link i {
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        .sidebar .nav-link.active {
            background: #e0e7ff;
            color: #4338ca;
            font-weight: 600;
        }
        .sidebar .nav-link:hover {
            background: #f3f4f6;
            color: #4338ca;
        }
        .navbar {
            border-bottom: 1px solid #e5e7eb;
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="d-flex">
    {{-- Sidebar --}}
    <aside id="sidebar" class="sidebar d-none d-md-flex flex-column vh-100">
        <div class="brand">DompetPlan</div>
        <nav class="nav flex-column gap-1">
            <a href="{{ route('pengguna.index') }}"
               class="nav-link {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> <span>Pengguna</span>
            </a>
            <a href="{{ route('master-dompet.index') }}"
               class="nav-link {{ request()->routeIs('master-dompet.*') ? 'active' : '' }}">
                <i class="bi bi-wallet2"></i> <span>Master Dompet</span>
            </a>
            <a href="{{ route('master-tanggungan.index') }}"
               class="nav-link {{ request()->routeIs('master-tanggungan.*') ? 'active' : '' }}">
                <i class="bi bi-wallet"></i> <span>Master Tanggungan</span>
            </a>
            <a href="{{ route('master-target.index') }}"
               class="nav-link {{ request()->routeIs('master-target.*') ? 'active' : '' }}">
                <i class="bi bi-safe"></i> <span>Master Target</span>
            </a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-grow-1 d-flex flex-column">
        {{-- Navbar --}}
        <header class="navbar bg-white px-4 py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-secondary btn-sm" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="mb-0 fw-semibold">@yield('title')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted">Halo, {{ auth()->user()->nama ?? 'Guest' }}</span>
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->nama ?? 'G' }}&background=4F46E5&color=fff"
                     class="rounded-circle border shadow-sm" width="36" height="36" alt="avatar">
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-grow-1 overflow-auto p-4">
            @yield('content')
        </main>
    </div>
</div>
                

{{-- SweetAlert2 --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

{{-- Sidebar Toggle --}}
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>

{{-- Semua script dari blade lain --}}
@stack('scripts')
</body>
</html>
