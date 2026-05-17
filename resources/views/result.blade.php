@extends('layouts.app')

@section('content')
    <div class="mb-10 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold mb-4 animate-pulse">
            <span>✨</span> Processing Pipeline Executed Successfully!
        </div>
        <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl bg-gradient-to-b from-white to-slate-200 bg-clip-text">
            Your Clean Data is Ready
        </h1>
    </div>

    <!-- Data Volume Processing Analytics Metrics Panels -->
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-slate-900/40 border border-slate-800/60 rounded-xl p-4 text-center backdrop-blur-sm">
            <span class="text-xs uppercase tracking-wider text-slate-500 font-bold">Original Data Lines</span>
            <div class="text-3xl font-extrabold text-slate-300 mt-1 font-mono">
                {{ session('original_count', 0) }}
            </div>
        </div>
        <div class="bg-slate-900/40 border border-emerald-500/20 rounded-xl p-4 text-center backdrop-blur-sm shadow-lg shadow-emerald-950/10">
            <span class="text-xs uppercase tracking-wider text-emerald-500/60 font-bold">Remaining Unique Output</span>
            <div class="text-3xl font-extrabold text-emerald-400 mt-1 font-mono">
                {{ session('cleaned_count', 0) }}
            </div>
        </div>
    </div>

    <!-- Sanitized Text Stream Output Area Wrapper -->
    <div class="space-y-4 bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 shadow-xl">
        <textarea 
            id="resultText" 
            readonly 
            rows="10" 
            class="block w-full rounded-xl bg-slate-950/90 border border-slate-800/80 px-4 py-3.5 text-emerald-400 font-mono text-sm focus:outline-none focus:border-emerald-500 transition-all resize-none"
        >{{ session('cleaned_result') }}</textarea>
        
        <!-- Frontend Clipboard Storage Action API Trigger -->
        <button onclick="copyToClipboard()" class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-4 text-sm font-bold text-white hover:bg-emerald-500 hover:scale-[1.01] active:scale-[0.99] transition-all shadow-lg shadow-emerald-600/20 cursor-pointer">
            📋 Copy Clean Data Array to Clipboard
        </button>
        
        <a href="/" class="block text-center text-sm font-medium text-slate-500 hover:text-slate-400 transition-colors underline pt-2">
            &larr; Return to Workspace Terminal
        </a>
    </div>

   <script>
    /**
     * Fallback clipboard copy method that works perfectly on both HTTP (localhost) and HTTPS.
     */
    function copyToClipboard() {
        const copyText = document.getElementById("resultText");
        
        // Step 1: Select the textarea content
        copyText.select();
        copyText.setSelectionRange(0, 99999); // Mobile optimization

        try {
            // Step 2: Use the older, stable browser copy command
            const successful = document.execCommand('copy');
            if (successful) {
                alert("Success! Sanitized dataset copied safely into your clipboard system buffer.");
            } else {
                alert("Oops, unable to copy automatically. Please copy the text manually.");
            }
        } catch (err) {
            // Alternative: If execCommand fails, we fall back to navigator clipboard
            navigator.clipboard.writeText(copyText.value).then(function() {
                alert("Success! Sanitized dataset copied safely into your clipboard system buffer.");
            }).catch(function() {
                alert("Browser blocked automatic copying. Please press Ctrl+C to copy manually.");
            });
        }
    }
</script>

@endsection
