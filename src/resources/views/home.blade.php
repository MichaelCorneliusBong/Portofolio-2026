<x-layout>
    <div class="min-h-screen">
        <!-- Profile Section (Glassmorphism) - Ukuran menyesuaikan konten -->
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="glass-card rounded-2xl p-6 md:p-8 mb-12 w-auto max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-8 transition-all duration-300 hover:-translate-y-1 hover:border-white/20">
                @if ($profile && $profile->avatar)
                    <div class="flex-shrink-0 group">
                        <img src="{{ Storage::url($profile->avatar) }}" alt="{{ $profile->name }}"
                            class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-[#f53003]/30 object-cover shadow-xl transition-all duration-300 group-hover:scale-105 group-hover:border-[#f53003]/60">
                    </div>
                @endif
                <div class="text-center md:text-left">
                    <h1 class="text-3xl md:text-5xl font-bold tracking-tight mb-2 text-justify">
                        <span class="gradient-text">{{ $profile->name ?? "Hello, I'm a Developer" }}</span>
                    </h1>
                    @if ($profile && $profile->title)
                        <h2 class="text-xl text-[#f53003] font-semibold mb-4 text-justify">{{ $profile->title }}</h2>
                    @endif
                    <p class="text-lg text-white/70 leading-relaxed max-w-2xl text-justify mb-5">
                        {{ $profile->biography ?? "Welcome to my portfolio! I specialize in building robust web applications using Laravel, Tailwind CSS, and various modern technologies. This space highlights my journey, skills, and the projects I've built along the way." }}
                    </p>

                    <!-- Social Links: GitHub & Email - CENTERED -->
                    @if (($profile && $profile->github) || ($profile && $profile->email))
                        <div class="flex flex-wrap left gap-3">
                            @if ($profile && $profile->github)
                                <a href="{{ $profile->github }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white/5 hover:bg-[#f53003]/20 border border-white/10 hover:border-[#f53003]/50 transition-all duration-200 group">
                                    <svg class="w-5 h-5 text-white/80 group-hover:text-[#f53003] transition" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-white/80 group-hover:text-[#f53003] transition">GitHub</span>
                                </a>
                            @endif
                            @if ($profile && $profile->email)
                                <a href="mailto:{{ $profile->email }}" 
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white/5 hover:bg-[#f53003]/20 border border-white/10 hover:border-[#f53003]/50 transition-all duration-200 group">
                                    <svg class="w-5 h-5 text-white/80 group-hover:text-[#f53003] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm text-white/80 group-hover:text-[#f53003] transition">Email</span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <!-- Skills Section -->
            <div class="mt-16">
                <div class="flex items-center gap-3 mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-white">My Stacks</h2>
                    <div class="h-px flex-1 bg-gradient-to-r from-white/20 to-transparent"></div>
                </div>

                @if ($skills->isEmpty())
                    <p class="text-white/50 text-center py-12 glass-card rounded-xl">No skills added yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($skills->groupBy('category') as $category => $categorySkills)
                            <div class="glass-card rounded-xl p-6 transition-all duration-300 hover:-translate-y-1 hover:border-white/20 group">
                                <h3 class="text-xl font-semibold border-b border-white/10 pb-3 mb-4 text-white flex items-center gap-2">
                                    <span class="text-[#f53003]">▹</span> {{ $category ?: 'Other Skills' }}
                                </h3>
                                <ul class="space-y-3">
                                    @foreach ($categorySkills as $skill)
                                        <li class="flex items-center gap-3 text-white/80 group-hover:text-white/90 transition">
                                            @if ($skill->icon)
                                                <img src="{{ Storage::url($skill->icon) }}" alt="{{ $skill->name }} logo"
                                                    class="w-6 h-6 object-contain opacity-80 group-hover:opacity-100 transition">
                                            @else
                                                <span class="w-2 h-2 bg-[#f53003] rounded-full inline-block"></span>
                                            @endif
                                            <span class="text-sm md:text-base">{{ $skill->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif
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