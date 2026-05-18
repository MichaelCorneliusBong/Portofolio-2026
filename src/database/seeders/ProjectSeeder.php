<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Website Genesys Meta',
            'slug' => 'Website-Genesys-Meta',
            'short_description' => 'Website Guide dan Tier List untuk Yugioh Genesys Format Dengan Laravel, PHP, dan lainnya.',
            'problem_analysis' => 'Perkembangan teknologi web mendorong munculnya berbagai platform informasi berbasis komunitas, termasuk pada bidang permainan kartu digital dan trading card game. Salah satu permainan kartu yang memiliki komunitas aktif adalah Yu-Gi-Oh!, khususnya pada format permainan alternatif bernama Genesys Format. Namun, informasi mengenai meta deck, tier list, dan panduan permainan masih tersebar di berbagai platform sehingga menyulitkan pemain dalam memperoleh informasi.',
            'system_requirements' => 'Fitur utama website meliputi sistem autentikasi pengguna, deck tier list, analisis meta, pencarian deck, deck guide, dan panel admin. Metode pengembangan sistem yang digunakan adalah Agile Development sehingga pengembangan dapat dilakukan secara bertahap dan fleksibel.',
            'tech_stack' => 'Docker, Laravel Framework, MariaDB, Nginx, Blade, Livewire, Filament, dan PHP.',
            'diagram_usecase' => 'diagrams/usecase.png',
            'diagram_flowchart' => 'diagrams/flowchart.png',
            'diagram_erd' => 'diagrams/erd.png',
            'thumbnail' => 'projects/genesysmeta.png',
            'github_url' => 'https://github.com/MichaelCorneliusBong/Genesys-2026',
            'is_final_project' => false,
            'is_published' => false,
            'progress_status' => 'In Progress',
        ]);
        
        Project::create([
            'title' => 'Website Pembelian Rumah',
            'slug' => 'Website-Pembelian-Rumah',
            'short_description' => 'Website proses pembelian perumahaan Canary yang dibangun menggunakan bahasa HTML dan Java.',
            'thumbnail' => 'projects/housemanagement.png',
            'github_url' => 'https://github.com/MichaelCorneliusBong/SistemManajemenPembelianRumah',
            'is_final_project' => true,
            'is_published' => true,
            'progress_status' => 'Completed',
            
        ]);

        Project::create([
            'title' => 'Program Pencatatan Shopping',
            'slug' => 'Program-Pencatatan-Shopping',
            'short_description' => 'Program untuk mencatat Shopping List yang diinginkan. Program dibuat dengan bahasa Java.',
            'thumbnail' => 'projects/shoppinglist.png',
            'github_url' => 'https://github.com/MichaelCorneliusBong/UAS-PBO',
            'is_final_project' => true,
            'is_published' => true,
            'progress_status' => 'Completed',
        ]);

    }
}
