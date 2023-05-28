<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\SupportCourse;
use App\Models\mbkm;
use App\Models\Faculty;
use App\Models\ReviewSc;
use App\Models\ReviewMbkm;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===========================================================

        SupportCourse::create([
            'courses_id' => 'KOM120H',
            'courses_name' => 'Struktur Data',
            'faculty_id' => 1,
            'course_credits' => '2-1',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Struktur data adalah mata kuliah yang dijamin membuat kamu terheran-heran kenapa milik matkul ini. Asli, mana dosen dengan inisial A tidak ramah mental semua, tugas 10% nya juga tidak worth it',
            'rating' => 0.0,
            'slug' => 'kom120h-struktur-data'
        ]);
        
        SupportCourse::create([
            'courses_id' => 'KOM120C',
            'courses_name' => 'Pemrograman',
            'faculty_id' => 2,
            'course_credits' => '2-1',
            'date' => 'Rabu, 13.00 WIB',
            'desc' => 'Pemrograman adalah salah satu mata kuliah yang dijamin ngebuat lu merenungkan hidup, terutama selama 3 jam masa ujian praktikum. Asli, lu bakal bingung marah marah bete sendiri. Apalagi kalo lu yakin udh coba bisa tapi pas submit tetep merah. Memang rasanya ingin terjun ke jurang.',
            'rating' => 0.0,
            'slug' => 'kom120c-pemrograman'
        ]);

        SupportCourse::create([
            'courses_id' => 'KOM220C',
            'courses_name' => 'Algoritma',
            'faculty_id' => 2,
            'course_credits' => '3-1',
            'date' => 'Kamis, 09.00 WIB',
            'desc' => 'Algoritma adalah salah satu mata kuliah yang melatih kemampuan logika dan pemecahan masalah. Dalam mata kuliah ini, kamu akan belajar tentang algoritma dasar, kompleksitas, dan strategi pemrograman.',
            'rating' => 0.0,
            'slug' => 'kom220c-algoritma'
        ]);

        SupportCourse::create([
            'courses_id' => 'KOM420C',
            'courses_name' => 'Pengembangan Web',
            'faculty_id' => 2,
            'course_credits' => '3-2',
            'date' => 'Selasa, 10.00 WIB',
            'desc' => 'Pengembangan Web adalah mata kuliah yang membahas tentang pembuatan aplikasi web. Kamu akan belajar tentang HTML, CSS, JavaScript, dan framework-web populer seperti Laravel dan React.',
            'rating' => 0.0,
            'slug' => 'kom420c-pengembangan-web'
        ]);

        SupportCourse::create([
            'courses_id' => 'KOM520C',
            'courses_name' => 'Kecerdasan Buatan',
            'faculty_id' => 2,
            'course_credits' => '3-3',
            'date' => 'Rabu, 14.00 WIB',
            'desc' => 'Kecerdasan Buatan adalah mata kuliah yang membahas tentang pengembangan sistem yang dapat melakukan tugas-tugas yang membutuhkan kecerdasan manusia. Kamu akan mempelajari konsep-konsep AI seperti machine learning, neural network, dan algoritma genetika.',
            'rating' => 0.0,
            'slug' => 'kom520c-kecerdasan-buatan'
        ]);

        
        
        // =============================================================
        
        mbkm::create([
            'mbkm_name' => 'Shopee',
            'periode_begin' => '2023-05-18 08:00:00',
            'periode_end' => '2023-10-05 08:00:00',
            'positions' => 'Software Engineer, Copywriter, Internet Marketing, HRD Manager, UX Researcher',
            'excerpt' => 'Software Engineer, Copywriter, Internet Marketing, etc',
            'benefit' => 'Program Intership bersertifikat selama 6 bulan yang setara dengan 20 sks. Memperoleh skill dunia nyata untuk mengasah potensi. Belajar langsung dari mentor yang berpengalaman',
            'requirements' => 'Mahasiswa semester 5-8 dari jurusan dan universitas manapun. Memiliki nilai minimal GPA 3,00',
            'rating' => 0.0,
            'slug' => 'shopee'
        ]);
        
        mbkm::create([
            'mbkm_name' => 'Tokopedia',
            'periode_begin' => '2023-07-15 08:00:00',
            'periode_end' => '2023-08-10 08:00:00',
            'positions' => 'Software Engineer, Copywriter, Creative Graphic Designer, E-Commerce Business Development, Internet Marketing - SEO, Social Media',
            'excerpt' => 'Software Engineer, Copywriter, Creative Graphic Designer, etc',
            'benefit' => 'Program Intership bersertifikat selama 6 bulan yang setara dengan 20 sks. Memperoleh skill dunia nyata untuk mengasah potensi. Belajar langsung dari mentor yang berpengalaman. Membangun dan memperluas koneksi. Mengeksplorasi dunia nyata teknik, biknis, dan marketing',
            'requirements' => 'Mahasiswa semester 5-8 dari jurusan dan universitas manapun. Memiliki nilai minimal GPA 3,00',
            'rating' => 0.0,
            'slug' => 'tokopedia'
        ]);
        
        mbkm::create([
            'mbkm_name' => 'Blibli',
            'periode_begin' => '2023-07-15 08:00:00',
            'periode_end' => '2023-09-23 08:00:00',
            'positions' => 'Software Engineer, Social Media, Internet Marketing, UX Researcher, Copywriter',
            'excerpt' => 'Software Engineer, Social Media, Internet Marketing, etc',
            'benefit' => 'Program Intership bersertifikat selama 6 bulan yang setara dengan 20 sks. Memperoleh skill dunia nyata untuk mengasah potensi. Belajar langsung dari mentor yang berpengalaman. Membangun dan memperluas koneksi',
            'requirements' => 'Mahasiswa semester 6-8 dari jurusan dan universitas manapun. Memiliki nilai minimal GPA 2,75',
            'rating' => 0.0,
            'slug' => 'blibli'
        ]);
        
        // ====================================================

        Faculty::create([
            'faculty_name' => 'FAPERTA',
            'slug' => 'faperta'
        ]);
        
        Faculty::create([
            'faculty_name' => 'FKH',
            'slug' => 'fkh'
        ]);
        
        Faculty::create([
            'faculty_name' => 'FPIK',
            'slug' => 'fpik'
        ]);
        
        Faculty::create([
            'faculty_name' => 'FAPET',
            'slug' => 'fapet'
        ]);
        
        Faculty::create([
        'faculty_name' => 'FAHUTAN',
        'slug' => 'fahutan'
        ]);
        
        Faculty::create([
        'faculty_name' => 'FATETA',
        'slug' => 'fateta'
        ]);
        
        Faculty::create([
            'faculty_name' => 'FMIPA',
            'slug' => 'fmipa'
        ]);
        
        Faculty::create([
            'faculty_name' => 'FEM',
            'slug' => 'fem'
        ]);
        
        Faculty::create([
            'faculty_name' => 'FEMA',
            'slug' => 'fema'
        ]);
        
        // ===========================================================
        
        User::create([
            'username' => '4everkanabross',
            'email' => 'kanadmin@gmail.com',
            'isAdmin' => TRUE,
            'password' => bcrypt('kanA@7365')
        ]);
        
        // ===========================================================
        
        User::create([
            'name' => 'Kana Arima',
            'username' => 'kanakana',
            'email' => 'kana@gmail.com',
            'password' => bcrypt('DUMBwonton02')
        ]);

        User::create([
            'name' => 'Dilla',
            'username' => 'dilicss',
            'email' => 'dill@gmail.com',
            'password' => bcrypt('DUMBwonton02')

        ]);

        // ===========================================================

    }
}
