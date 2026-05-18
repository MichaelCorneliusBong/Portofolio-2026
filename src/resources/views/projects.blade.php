<x-layout>
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header dengan garis gradien -->
            <div class="flex items-center gap-3 mb-8">
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight gradient-text">My Projects</h1>
                <div class="h-px flex-1 bg-gradient-to-r from-white/20 to-transparent"></div>
            </div>

            @if ($projects->isEmpty())
                <div class="glass-card rounded-2xl p-12 text-center">
                    <p class="text-white/50 text-lg">No projects available yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div class="glass-card rounded-2xl overflow-hidden flex flex-col transition-all duration-300 hover:-translate-y-2 hover:border-white/20 group h-full">
                            <!-- Thumbnail (tetap) -->
                            <div class="relative h-48 overflow-hidden bg-black/40">
                                @if ($project->thumbnail)
                                    <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($project->progress_status)
                                    <div class="absolute top-3 right-3">
                                        <span class="inline-block px-2 py-1 text-[10px] font-semibold uppercase tracking-wider rounded-full bg-[#f53003]/80 text-white backdrop-blur-sm">
                                            {{ $project->progress_status }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Konten kartu dengan padding lebih besar -->
                            <div class="p-6 flex-1 flex flex-col">
                                <h2 class="text-xl font-bold text-white mb-3 line-clamp-1">{{ $project->title }}</h2>
                                <p class="text-sm text-white/60 leading-relaxed mb-5 line-clamp-2">
                                    {{ $project->short_description }}
                                </p>
                                <div class="mt-auto pt-4">
                                    <a href="{{ route('project.detail', $project->slug) }}"
                                        class="inline-flex items-center gap-1 text-sm font-medium text-[#f53003] hover:text-white transition-colors duration-200 group/link">
                                        View Detail
                                        <svg class="w-4 h-4 transition-transform duration-200 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
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
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-layout>