<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email-Cleaner Pro - Premium Dashboard</title>
    <!-- Master local Tailwind CSS integration via Laravel Vite -->
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-between selection:bg-indigo-500 selection:text-white">

    <!-- MASTER GLOBAL HEADER -->
    <nav class="border-b border-slate-800/60 bg-slate-950/80 backdrop-blur sticky top-0 px-6 py-4 z-40">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-indigo-600/10 border border-indigo-500/30 p-2 rounded-xl text-indigo-400 font-bold">
                    📧
                </div>
                <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-indigo-400 to-violet-400 bg-clip-text text-transparent">
                    Email-Cleaner Pro
                </span>
            </div>
            <div>
                <span class="bg-indigo-500/10 text-indigo-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-indigo-500/20 shadow-inner">
                    v1.0 Advanced Layout ⚡
                </span>
            </div>
        </div>
    </nav>

    <!-- WORKSPACE INJECTION POINT -->
    {{-- The yield directive dynamically injects welcome or result code blocks here --}}

    <main class="py-16 px-4 max-w-2xl mx-auto w-full flex-grow flex flex-col justify-center">
        @yield('content')
    </main>

    <!-- MASTER GLOBAL FOOTER -->
    <footer class="border-t border-slate-900 py-6 text-center text-xs text-slate-600 tracking-wide">
        &copy; {{ date('Y') }} Email-Cleaner Pro. All rights reserved.
    </footer>

</body>
</html>
