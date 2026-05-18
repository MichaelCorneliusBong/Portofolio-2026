<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header dengan jarak bawah lebih besar -->
            <div class="text-center mb-12 pt-8 md:pt-12">
                <h1 class="text-3xl md:text-4xl font-bold gradient-text mb-3">Contact Me</h1>
                <p class="text-white/50 text-sm max-w-md mx-auto">
                    Punya pertanyaan seputar Project saya? Bisa hubungi saya disini
                </p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-8 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Card -->
            <div class="glass-card rounded-2xl p-6 md:p-8">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-white/70 mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/30 focus:outline-none focus:border-[#f53003]/50 focus:ring-1 focus:ring-[#f53003]/50 transition">
                        @error('name')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-white/70 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/30 focus:outline-none focus:border-[#f53003]/50 focus:ring-1 focus:ring-[#f53003]/50 transition">
                        @error('email')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-white/70 mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/30 focus:outline-none focus:border-[#f53003]/50 focus:ring-1 focus:ring-[#f53003]/50 transition">
                        @error('subject')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-white/70 mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" required
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/30 focus:outline-none focus:border-[#f53003]/50 focus:ring-1 focus:ring-[#f53003]/50 transition resize-none">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full py-3.5 rounded-xl bg-[#f53003] hover:bg-[#c42802] text-white font-semibold shadow-lg transition-all duration-300 hover:scale-[1.02] hover:shadow-[#f53003]/30 active:scale-98">
                            Send Message
                        </button>
                    </div>
                </form>
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
    </style>
</x-layout>