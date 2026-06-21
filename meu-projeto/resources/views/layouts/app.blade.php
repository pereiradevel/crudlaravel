<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-950 text-slate-100">
        <div class="relative min-h-screen overflow-hidden">
            <!-- Gradient Backgrounds -->
            <div class="pointer-events-none absolute inset-x-0 top-0 h-64 bg-[radial-gradient(circle_at_top,_rgba(168,85,247,0.25),_transparent_40%)]"></div>
            <div class="pointer-events-none absolute right-0 top-24 h-80 w-80 rounded-full bg-cyan-500/20 blur-3xl"></div>
            <div class="pointer-events-none absolute left-0 top-40 h-72 w-72 rounded-full bg-fuchsia-500/15 blur-3xl"></div>

            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Main Content -->
            <main class="ms-64 lg:ms-64 transition-all duration-300 ease-in-out py-10">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <script>
            // Sidebar state management
            document.addEventListener('DOMContentLoaded', () => {
                const sidebarContainer = document.querySelector('[x-data*="sidebarOpen"]');
                
                if (sidebarContainer && sidebarContainer.__x) {
                    const state = sidebarContainer.__x.$data;
                    
                    // Collapse sidebar on mobile by default
                    const isMobile = () => window.innerWidth < 768;
                    if (isMobile()) {
                        state.sidebarOpen = false;
                    }

                    // Handle resize
                    window.addEventListener('resize', () => {
                        if (!isMobile() && !state.sidebarOpen) {
                            state.sidebarOpen = true;
                        }
                    });
                }

                // Counter animations
                const counters = document.querySelectorAll('[data-counter-target]');
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-counter-target');
                    let current = 0;
                    const increment = Math.max(1, Math.floor(target / 60));

                    const update = () => {
                        current += increment;
                        if (current < target) {
                            counter.textContent = current.toLocaleString();
                            window.requestAnimationFrame(update);
                        } else {
                            counter.textContent = target.toLocaleString();
                        }
                    };

                    update();
                });

                // Card animations
                const animateCards = document.querySelectorAll('.animate-card');
                animateCards.forEach((card, index) => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(22px)';
                    setTimeout(() => {
                        card.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 120 * index);
                });
            });
        </script>
    </body>
</html>
