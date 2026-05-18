<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- Fonts (Inter untuk tampilan modern) -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom styles untuk dark mode modern */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000;
            background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Glassmorphism navigation */
        .glass-nav {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Animated gradient orb background */
        .gradient-orb {
            position: fixed;
            top: -20%;
            right: -10%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245, 48, 3, 0.3) 0%, rgba(245, 48, 3, 0) 70%);
            filter: blur(80px);
            z-index: -1;
            animation: float 10s infinite alternate;
        }

        .gradient-orb-2 {
            bottom: -20%;
            left: -10%;
            top: auto;
            right: auto;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.25) 0%, rgba(59, 130, 246, 0) 70%);
            animation: float 12s infinite alternate-reverse;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(40px, 40px) scale(1.1);
            }
        }

        /* Active link style */
        .nav-link-active {
            @apply text-white relative;
        }

        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #f53003, #ff7a45);
            border-radius: 2px;
        }
    </style>
</head>

<body class="text-white antialiased min-h-screen flex flex-col">

    <!-- Background orbs -->
    <div class="gradient-orb"></div>
    <div class="gradient-orb gradient-orb-2"></div>

    <!-- Navigation (Glassmorphism + Sticky) -->
    <nav class="glass-nav sticky top-0 z-50 w-full transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight bg-gradient-to-r from-white to-white/70 bg-clip-text text-transparent">
                        ✦ Numerounious Portofolio
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium transition-all duration-200 {{ request()->routeIs('home') ? 'text-white nav-link-active' : 'text-white/60 hover:text-white hover:border-b hover:border-white/20' }}">
                        Home
                    </a>
                    <a href="{{ route('projects') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium transition-all duration-200 {{ request()->routeIs('projects') ? 'text-white nav-link-active' : 'text-white/60 hover:text-white hover:border-b hover:border-white/20' }}">
                        Projects
                    </a>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium transition-all duration-200 {{ request()->routeIs('contact') ? 'text-white nav-link-active' : 'text-white/60 hover:text-white hover:border-b hover:border-white/20' }}">
                        Contact
                    </a>
                </div>

                <!-- Optional: Mobile menu button (bisa ditambahkan jika perlu) -->
                <div class="sm:hidden">
                    <button type="button" class="text-white/70 hover:text-white focus:outline-none" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu (hidden by default, bisa diaktifkan dengan JS sederhana) -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}"
                    class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('home') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">Home</a>
                <a href="{{ route('projects') }}"
                    class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('projects') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">Projects</a>
                <a href="{{ route('contact') }}"
                    class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('contact') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer (Glassmorphism) -->
    <footer class="mt-auto border-t border-white/5 bg-black/30 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-white/40">
                &copy; {{ date('Y') }} Built with <span class="text-red-400">♥</span> & Laravel
            </p>
        </div>
    </footer>
</body>

</html>