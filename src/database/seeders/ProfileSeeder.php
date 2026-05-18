<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'Michael Cornelius Bong',

            'title' => 'IT Student & Laravel Developer',

            'biography' => "
                Selamat datang di Website Portofolio saya.
                Saya merupakan mahasiswa Teknologi Informasi di Universitas Esa Unggul yang sedang mempelajari pengembangan website modern menggunakan Laravel, Filament, Livewire, dan teknologi pembuatan Website lainnya. Website ini dibuat sebagai portofolio untuk menampilkan Project yang pernah dan sedang saya kerjakan selama masa perkuliahan.
            ",

            'email' => 'zeexals@student.esaunggul.ac.id',

            'github' => 'https://github.com/MichaelCorneliusBong',

            'avatar' => 'profile/profile.png',
        ]);
    }
}