@extends('layouts.app')

@section('content')
    <div class="mb-10 text-center">
        <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-5xl bg-gradient-to-b from-white to-slate-300 bg-clip-text">
            Clean Your Email List
        </h1>
        <p class="mt-4 text-base text-slate-400 max-w-md mx-auto leading-relaxed">
            Instantly remove all duplicate entries, invalid formatting patterns, and messy spacing completely for free.
        </p>
    </div>

    <!-- Isolated Clean Data Submission Form Block -->
    <form action="/clean-list" method="POST" class="space-y-6 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-6 sm:p-8 backdrop-blur-sm shadow-xl">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-slate-300 mb-3 tracking-wide">
                Paste your raw email list address text block (One email per line):
            </label>
            <textarea 
                name="email_list" 
                required 
                rows="10" 
                placeholder="user@example.com&#10;USER@EXAMPLE.COM&#10;invalid-email...&#10;user@example.com" 
                class="block w-full rounded-xl bg-slate-950/80 border border-slate-800/80 px-4 py-3.5 text-slate-200 font-mono text-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all placeholder:text-slate-700"
            ></textarea>
        </div>

        <button type="submit" class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-4 text-sm font-bold text-white hover:bg-indigo-500 hover:scale-[1.01] active:scale-[0.99] transition-all shadow-lg shadow-indigo-600/20 cursor-pointer">
            ⚡ Process and Clean List Instantly
        </button>
    </form>
@endsection
