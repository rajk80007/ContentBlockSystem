<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Page::create([
            'title' => 'Home',
        ]);

        Page::create([
            'title' => 'About Us',
        ]);

        Page::create([
            'title' => 'Contact Us',
        ]);

        Page::create([
            'title' => 'Privacy Policy',
        ]);
    }
}
