<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::create([
            'title' => 'Prestasi Gemilang di Kompetisi Nasional',
            'content' => 'Siswa SMKN 4 Bogor berhasil meraih juara 1 dalam kompetisi teknologi tingkat nasional. Prestasi ini merupakan hasil kerja keras dan dedikasi tinggi dari para siswa yang telah berlatih selama berbulan-bulan. Tim yang terdiri dari 5 siswa ini berhasil mengalahkan 50 tim dari berbagai sekolah di Indonesia.',
            'published_date' => Carbon::now(),
            'status' => 'published'
        ]);

        News::create([
            'title' => 'Workshop Industri 4.0',
            'content' => 'Sekolah mengadakan workshop kolaborasi dengan industri untuk meningkatkan kompetensi siswa dalam menghadapi era Industri 4.0. Workshop ini menghadirkan praktisi dari berbagai perusahaan teknologi terkemuka yang berbagi pengalaman dan pengetahuan mereka kepada siswa-siswi SMKN 4 Bogor.',
            'published_date' => Carbon::now()->subDays(2),
            'status' => 'published'
        ]);

        News::create([
            'title' => 'Kunjungan Industri ke Perusahaan Teknologi',
            'content' => 'Para siswa berkesempatan mengunjungi perusahaan teknologi terkemuka untuk belajar langsung tentang dunia kerja. Kunjungan ini memberikan wawasan berharga tentang bagaimana teori yang dipelajari di sekolah diterapkan dalam praktik industri nyata.',
            'published_date' => Carbon::now()->subDays(5),
            'status' => 'published'
        ]);
    }
}
