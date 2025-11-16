<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'type' => 'sejarah',
            'title' => 'Sejarah Sekolah',
            'content' => 'SMK Negeri 4 Bogor didirikan pada tahun 1985 dengan visi menjadi sekolah kejuruan terdepan di Indonesia. Berawal dari sebuah gedung sederhana dengan 3 jurusan, kini telah berkembang menjadi institusi pendidikan yang memiliki berbagai program keahlian modern dan fasilitas lengkap.',
        ]);

        About::create([
            'type' => 'visi_misi',
            'title' => 'Visi & Misi',
            'content' => "VISI:\nMenjadi sekolah unggul yang menghasilkan lulusan berkarakter, berilmu, dan berdaya saing global.\n\nMISI:\n1. Meningkatkan kualitas pembelajaran berbasis teknologi\n2. Mengembangkan kreativitas dan inovasi siswa\n3. Menanamkan nilai religius, disiplin, dan kepedulian sosial\n4. Membangun kemitraan dengan industri dan dunia usaha",
        ]);
    }
}
