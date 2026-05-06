<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_categories')->insert(
            [
                'name' => 'Article',
                'slug' => 'article',
            ],
            [
                'name' => 'Beasiswa',
                'slug' => 'beasiswa',
            ],
            [
                'name' => 'Lomba',
                'slug' => 'lomba',
            ],
            [
                'name' => 'Magang',
                'slug' => 'magang',
            ],
            [
                'name' => 'Lowongan Kerja',
                'slug' => 'lowongan-kerja',
            ],
            [
                'name' => 'Kajian Isu',
                'slug' => 'kajian-isu',
            ],
            [
                'name' => 'Surat Keputusan',
                'slug' => 'surat-keputusan',
            ],
        );
    }
}
