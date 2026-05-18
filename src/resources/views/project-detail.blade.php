<x-layout>
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Tombol Back -->
            <div class="mb-6">
                <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 text-sm font-medium text-white/60 hover:text-white transition-colors duration-200 group">
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Projects</span>
                </a>
            </div>

            <!-- Kartu Detail Proyek -->
            <div class="glass-card rounded-2xl overflow-hidden">
                <!-- Thumbnail -->
                @if ($project->thumbnail)
                    <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" 
                        class="w-full h-80 md:h-96 object-cover">
                @else
                    <div class="w-full h-80 md:h-96 bg-black/40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif

                <!-- Konten -->
                <div class="p-6 md:p-8">
                    <!-- Header: Judul + Badges -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                        <h1 class="text-2xl md:text-3xl font-bold gradient-text">{{ $project->title }}</h1>
                        <div class="flex flex-wrap gap-2">
                            @if ($project->progress_status)
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-[#f53003]/20 text-[#f53003] border border-[#f53003]/30">
                                    {{ $project->progress_status }}
                                </span>
                            @endif
                            @if ($project->is_final_project)
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                    Final Project
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Deskripsi Singkat (justify) -->
                    <div class="prose prose-invert max-w-none text-white/70 leading-relaxed mb-8 whitespace-pre-line text-justify">
                        {{ $project->short_description }}
                    </div>

                    <!-- Problem Analysis -->
                    @if ($project->problem_analysis)
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-white mb-3 flex items-center gap-2">
                                <span class="text-[#f53003]">▹</span> Problem Analysis
                            </h2>
                            <div class="text-white/70 leading-relaxed whitespace-pre-line text-justify">
                                {{ $project->problem_analysis }}
                            </div>
                        </div>
                    @endif

                    <!-- System Requirements -->
                    @if ($project->system_requirements)
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-white mb-3 flex items-center gap-2">
                                <span class="text-[#f53003]">▹</span> System Requirements & Features
                            </h2>
                            <div class="text-white/70 leading-relaxed whitespace-pre-line text-justify">
                                {{ $project->system_requirements }}
                            </div>
                        </div>
                    @endif

                    <!-- Tech Stack -->
                    @if ($project->tech_stack)
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-white mb-3 flex items-center gap-2">
                                <span class="text-[#f53003]">▹</span> Tech Stack
                            </h2>
                            <div class="text-white/70 leading-relaxed whitespace-pre-line text-justify">
                                {{ $project->tech_stack }}
                            </div>
                        </div>
                    @endif

                    <!-- Diagrams Section - Satu kolom vertikal -->
                    @if ($project->diagram_usecase || $project->diagram_flowchart || $project->diagram_erd)
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                                <span class="text-[#f53003]">▹</span> Diagrams
                            </h2>
                            <div class="space-y-6">
                                @if ($project->diagram_usecase)
                                    @php
                                        $useCaseUrl = asset('storage/' . $project->diagram_usecase);
                                    @endphp
                                    <div class="glass-card rounded-xl p-4">
                                        <h3 class="text-sm font-medium text-white/60 mb-2">Use Case Diagram</h3>
                                        <img src="{{ $useCaseUrl }}" alt="Use Case Diagram" class="w-full rounded-lg border border-white/10" onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'text-white/40 text-sm p-4 text-center\'>Diagram not found</div>'">
                                    </div>
                                @endif
                                @if ($project->diagram_flowchart)
                                    @php
                                        $flowchartUrl = asset('storage/' . $project->diagram_flowchart);
                                    @endphp
                                    <div class="glass-card rounded-xl p-4">
                                        <h3 class="text-sm font-medium text-white/60 mb-2">Flowchart Diagram</h3>
                                        <img src="{{ $flowchartUrl }}" alt="Flowchart Diagram" class="w-full rounded-lg border border-white/10" onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'text-white/40 text-sm p-4 text-center\'>Diagram not found</div>'">
                                    </div>
                                @endif
                                @if ($project->diagram_erd)
                                    @php
                                        $erdUrl = asset('storage/' . $project->diagram_erd);
                                    @endphp
                                    <div class="glass-card rounded-xl p-4">
                                        <h3 class="text-sm font-medium text-white/60 mb-2">ERD Diagram</h3>
                                        <img src="{{ $erdUrl }}" alt="ERD Diagram" class="w-full rounded-lg border border-white/10" onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'text-white/40 text-sm p-4 text-center\'>Diagram not found</div>'">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Tombol GitHub dan Docs -->
                    <div class="border-t border-white/10 pt-6">
                        <div class="flex flex-wrap gap-3">
                            @if ($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-all duration-200 group">
                                    <svg class="w-5 h-5 text-white/80 group-hover:text-white transition" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm font-medium text-white/80 group-hover:text-white transition">GitHub</span>
                                </a>
                            @endif

                            <!-- Tombol Docs: menggunakan docs_url jika ada, atau hardcode untuk proyek tertentu -->
                            @if ($project->docs_url)
                                <a href="{{ $project->docs_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-all duration-200 group">
                                    <svg class="w-5 h-5 text-white/80 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-medium text-white/80 group-hover:text-white transition">Docs</span>
                                </a>
                            @elseif ($project->slug == 'Website-Genesys-Meta')
                                <!-- Contoh hardcode untuk proyek tertentu -->
                                <a href="https://docs.google.com/document/d/1J3qh1XXbQbqjC-6ukkXAFRqElxGFqWiE3qy0KsVUW4I/edit?pli=1&tab=t.0" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-all duration-200 group">
                                    <svg class="w-5 h-5 text-white/80 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-medium text-white/80 group-hover:text-white transition">Docs</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .glass-card {
            background: rgba(18, 18, 18, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .gradient-text {
            background: linear-gradient(135deg, #E0E0E0 0%, #FFFFFF 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .text-justify {
            text-align: justify;
        }
    </style>
</x-layout>