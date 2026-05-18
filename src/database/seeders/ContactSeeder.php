<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Andrew Novan Then',
            'email' => 'andrewnthen@gmail.com',
            'subject' => 'Pembahasan Project',
            'message' => 'Halo, saya ingin membahas suatu Project dengan anda.',
            'is_read' => true,
        ]);
    }
}
