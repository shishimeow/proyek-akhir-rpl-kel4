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
            'courses_id' => 'MAN1101',
            'courses_name' => 'Manajemen',
            'faculty_id' => 2,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini memberikan pengetahuan dasar tentang manajemen dan organisasi; fungsi manajemen yang mencakup perencanaan, pengorganisasian, kepemimpinan dan pengendalian; serta perubahan lingkungan internal, eksternal, dan global yang mempengaruhi pengelolaan organisasi.',
            'rating' => 0.0,
            'slug' => 'man1101-manajemen'
        ]);

        SupportCourse::create([
            'courses_id' => 'MAN1202',
            'courses_name' => 'Etika dan Komunikasi Profesional',
            'faculty_id' => 2,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini membahas mengenai perilaku dan sikap normatif yang seharusnya dilakukan dalam berbisnis tata cara pergaulan dalam bisnis yang dijadikan sebagai nilai dan norma (Good Corporate Governance, HAKI, CSR, SDG’s, Dampak Lingkungan, Perlindungan Konsumen dan masalah Sertifikasi Halal) serta membahas mengenai konsep komunikasi dalam pergaulan dan pekerjaan/bisnis meliputi komunikasi  inter dan intra  personal, teknik presentasi, teknik pemecahan masalah, negosiasi, public relation, public speaking serta multimedia dan Teknologi Informatika (TIK) dan Komunikasi sebagai fasilitas berkomunikasi secara profesional, interaktif dan kondusif.',
            'rating' => 0.0,
            'slug' => 'man1202-etika-dan-komunikasi-profesional'
        ]);

        SupportCourse::create([
            'courses_id' => 'GFM221',
            'courses_name' => 'Klimatologi',
            'faculty_id' => 7,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Klimatologi merupakan ilmu yang mempelajari kondisi jangka panjang dari dinamika fisik atmosfer (cuaca dan iklim). Bidang ilmu ini dan terapannya sedang berkembang pesat khususnya ditingkat Internasional. Ranah dan ruang lingkup MK Klimatologi: 1. Mengkaji pemanfaatan sumberdaya dan informasi iklim untuk pembangunan yang terkait dengan pemanfaatan data dan informasi iklim. 2. Mengembangkan model-model perubahan iklim baik regional maupun global. 3. Mengkaji dinamika iklim dalam kaitanya dengan monsoon, equatorial,El-nino dan La nina, Made Julian Oscilation dan Dipole mode. 4. Mengkaji gejala iklim ekstrem yang muncul dalam kaitanya dengan anomali iklim.',
            'rating' => 0.0,
            'slug' => 'gfm221-klimatologi'
        ]);

        SupportCourse::create([
            'courses_id' => 'IKK231',
            'courses_name' => 'Perilaku Konsumen',
            'faculty_id' => 9,
            'course_credits' => '2-3',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Perilaku Konsumen mempelajari beberapa teori perilaku konsumen, yaitu: motivasi, kepribadian, konsep diri, pengolahan informasi, proses belajar dan sikap serta proses keputusan konsumen yang terdiri dari tahap pengenalan kebutuhan, pencarian informasi, evaluasi alternatif, pembelian, konsumsi, dan pasca konsumsi; serta membahas bagaimana menjadi konsumen cerdas dan bijak yang memahami hak dan kewajibannya serta bersikap kritis terhadap informasi dan tawaran berbagai barang dan jasa dari produsen.  Topik pembahasan lainnya adalah aplikasi perilaku konsumen untuk strategi pemasaran.',
            'rating' => 0.0,
            'slug' => 'ikk231-perilaku-konsumen'
        ]);

        SupportCourse::create([
            'courses_id' => 'MNH1224',
            'courses_name' => 'Kehutanan Masyarakat',
            'faculty_id' => 5,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Reforma/pembaharuan agraria di sektor kehutanan telah menjadi salah satu bagian pengarusuatamaan program oleh banyak pihak termasuk pemerintah. Banyaknya konflik tenurial antara masyarakat didalam maupun sekitar hutan dengan pemerintah membuat banyak pihak mendorong penuntasan reforma agraria secara menyeluruh di sektor kehutanan. Kehutanan masyarakat dipandang sebagai salah satu pendekatan yang dapat mentransformasi konflik tenurial menuju tata kelola pembangunan yang lebih adil terhadap masyarakat dan lingkungan. Mata kuliah ini mengambarkan berbagai konsepsi dan praktek terkait kehutanan masyarakat atau pengelolaan hutan berbasis maysrakat. Konsepsi ini dilihat dari ragam sudut pandang antara lain prinsip-prinsip utama, teori-teori tenurial, kelembagaan lokal serta perspektif sosial, politik, budaya dan ekonomi lainnya. Kehutanan masyarakat akhirnya banyak mengalami evolusi dari proyek-proyek pemerintah, kemudian menjadi metodologi pengelolaan dan akhirnya menjadi prinsip pengelolaan hutan lestari. Evolusi ini juga akhirnya kebijakan pemerintah mengalami devolusi dalam kewenangan pengelolaan dari domain pemerintah pusat ke struktur yang berada dibahwahnya yakni pemerintah daerah, pemerintah desa dan mayarakat lokal. Kebijakan skema kehutanan masyarakat yang ditawarkan pemerintah juga mengalami diskursus bagik dari segi konsep, prosedur dan prakteknya.',
            'rating' => 0.0,
            'slug' => 'mnh1224-kehutanan-masyarakat'
        ]);

        SupportCourse::create([
            'courses_id' => 'MAT1212',
            'courses_name' => 'Kalkulus III',
            'faculty_id' => 7,
            'course_credits' => '2-2',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini memberi pemahaman tentang Turunan Parsial: fungsi multi variable, limit dan kekontinuan, turunan parsial, bidang singgung dan hampiran linear, aturan rantai, turunan berarah dan vector gradien, nilai maksimum dan minimum, pengali Lagrange. Integral Lipat: integral lipat dua pada persegi panjang, integral berulang, integral lipat dua pada daerah umum, integral berulang pada koordinat polar, penerapan integral lipat dua, luas permukaan, integral lipat tiga, integral lipat tiga dalam koordinat silinder dan koordinat bola.',
            'rating' => 0.0,
            'slug' => 'mat1212-kalkulus-iii'
        ]);

        SupportCourse::create([
            'courses_id' => 'NTP1241',
            'courses_name' => 'Nutrisi Unggas Komersial Presisi',
            'faculty_id' => 4,
            'course_credits' => '2-1',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini membahas aspek nutrisi yang terkait dengan produksi unggas komersial secara tepat dan terperinci. Dalam mata kuliah ini, Anda akan mempelajari konsep dasar nutrisi unggas komersial, termasuk kebutuhan nutrisi berbagai jenis unggas seperti ayam broiler dan petelur. Anda juga akan belajar tentang perancangan formula pakan yang seimbang dan sesuai dengan kebutuhan unggas, serta teknik pengukuran dan evaluasi nutrisi unggas. Selain itu, mata kuliah ini membahas faktor-faktor yang memengaruhi kebutuhan nutrisi unggas, seperti usia, jenis kelamin, tingkat produksi, lingkungan, dan kondisi kesehatan. Anda akan dipersiapkan untuk merancang diet pakan yang presisi dan efisien, serta memahami pentingnya keberlanjutan dan kesejahteraan unggas dalam industri peternakan unggas komersial. Pada akhir mata kuliah, Anda diharapkan memiliki pemahaman yang kuat tentang nutrisi unggas komersial dan kemampuan untuk merancang formula pakan yang optimal. Anda akan dilatih dalam teknik formulasi pakan, penggunaan bahan pakan alternatif, dan manajemen pakan yang efisien. Selain itu, mata kuliah ini juga akan mengajarkan tentang praktik nutrisi yang berkelanjutan dan ramah lingkungan dalam industri peternakan unggas komersial. Dengan pengetahuan ini, Anda akan mampu meningkatkan hasil produksi unggas, mengoptimalkan efisiensi produksi, dan menjaga kesehatan serta kesejahteraan unggas dalam industri peternakan yang bertanggung jawab secara nutrisi.',
            'rating' => 0.0,
            'slug' => 'ntp1241-nutrisi-unggas-komersial-presisi'
        ]);

        SupportCourse::create([
            'courses_id' => 'KOM120C',
            'courses_name' => 'Pemrograman',
            'faculty_id' => 7,
            'course_credits' => '2-1',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini bertujuan untuk memberikan pemahaman dan keterampilan praktis dalam pemrograman komputer. Dalam mata kuliah ini, Anda akan mempelajari konsep dasar pemrograman, algoritma, struktur data, serta bahasa pemrograman yang umum digunakan seperti Java dan C++. Anda akan diajarkan bagaimana mengembangkan logika pemrograman yang efektif, menerapkan algoritma, dan merancang program yang efisien dan handal. Selain itu, mata kuliah ini juga akan membahas topik-topik lanjutan dalam pemrograman, seperti pemrograman berorientasi objek.',
            'rating' => 0.0,
            'slug' => 'kom120c-pemrograman'
        ]);
        

        SupportCourse::create([
            'courses_id' => 'NTP1222',
            'courses_name' => 'Teknologi Pengolahan Pakan',
            'faculty_id' => 4,
            'course_credits' => '2-3',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Membahas tentang tujuan, fungsi dan manfaat teknologi pengolahan, sifat fisik dan sifat kimia bahan pakan, klasifikasi jenis teknologi pengolahan pakan standar mutu pakan olahan secara nasional dan internasional, kebijakan teknologi pengolahan serta pengaruhnya terhadap kualitas nutrisi, daya simpan dan tingkat penggunaannya  secara optimum untuk ternak.',
            'rating' => 0.0,
            'slug' => 'ntp1222-teknologi-pengolahan-pakan'
        ]);

        SupportCourse::create([
            'courses_id' => 'MAT1232',
            'courses_name' => 'Pemrograman Linear',
            'faculty_id' => 7,
            'course_credits' => '2-3',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Dalam kuliah ini akan dipelajari permasalahan umum Pemrograman Linear ditinjau dari aspek teoritis dan komputasi beserta aplikasi Algoritma Simpleks untuk network. Pokok Bahasan yang dipelajari meliputi : Pengantar Pemrograman Linear, Analisis Algoritma Simpleks, Kompleksitas Algoritma Simpleks, Teorema Dualitas, Eliminasi Gauss dan Matriks, Algoritma Simpleks yang Direvisi, Algoritma Simpleks untuk PL umum, Teorema Dualitas dan Ketakfisibelan pada PL umum, Analisis Sensitivitas, Metode Simplek.',
            'rating' => 0.0,
            'slug' => 'mat1232-pemrograman-linear'
        ]);

        SupportCourse::create([
            'courses_id' => 'KOM304',
            'courses_name' => 'Grafika Komputer dan Visualisasi',
            'faculty_id' => 7,
            'course_credits' => '2-3',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini membahas mengenai konsep dasar grafika komputer dan visualisasi yang meliputi sistem grafika komputer, sistem koordinat dua dimensi dalam grafika komputer, objek geometri primitif, transformasi, atribut objek geometri, dan interaksi. Peserta akan mengimplementasikan konsep grafika komputer dan visualisasi menggunakan application programming interface grafik dalam suatu pembelajaran berbasis proyek yang berhubungan dengan visualisasi data di bidang pertanian dalam bentuk aplikasi grafis yang interaktif.',
            'rating' => 0.0,
            'slug' => 'kom304-grafika-komputer-dan-visualisasi'
        ]);

        SupportCourse::create([
            'courses_id' => 'MAT1312',
            'courses_name' => 'Pengantar Teori Peluang',
            'faculty_id' => 7,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini akan membahas konsep peluang dan hukum-hukumnya,peubah acak fungsi kepekatan peluang, fungsi sebaran kumulatif. Nilai harapan matematika, nilai tengah, ragam. Fungsi pembangkit momen. Peluang bersyarat, fungsi kepekatan peluang bersyarat dan marginal, Nilai harapan bersyarat. Kejadian bebas, Teorema Bayes. Fungsi-fungsi Kepekatan peluang diskrit dan kontinu.',
            'rating' => 0.0,
            'slug' => 'mat1312-pengantar-teori-peluang'
        ]);

        SupportCourse::create([
            'courses_id' => 'TPN1201',
            'courses_name' => 'Perspektif Global Ilmu dan Teknologi Pangan',
            'faculty_id' => 6,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah Perspektif Global Ilmu dan Teknologi Pangan termasuk ke dalam rumpun mata kuliah inti program studi yang ditujukan agar mahasiswa mampu menjelaskan lingkup ilmu dan teknologi pangan dan aplikasinya di industri pangan; mampu menjelaskan karakteristik bahan pangan, tingkat keawetan bahan pangan, kerusakan pangan (kimia, fisik, mikrobiologi), faktor yang mempengaruhi kerusakan bahan pangan, dan cara pengendaliannya;  mampu menjelaskan perbedaan pengertian mutu dan keamanan pangan, faktor yang menyebabkan penurunan mutu dan keamanan pangan bahan dan produk pangan, dan peran ilmu dan teknologi dalam aspek tersebut; mampu menjelaskan prinsip proses pengawetan dan pengolahan pangan (suhu tinggi dan suhu rendah); mampu menjelaskan kaitan antara ilmu sains dasar (kimia, fisika, biologi) dengan bidang ilmu dan teknologi pangan, dan aplikasinya di industri pangan; mampu menjelaskan peran teknologi pangan dalam meningkatan rantai nilai dan nilai tambah hasil pertanian, mampu menjelaskan pentingnya etika profesi dan soft skills di bidang karir, dan dalam menghadapi revolusi industri 4.0; serta mampu menjelaskan kompetensi dan keprofesian teknologi pangan. Strategi pembelajaran menerapkan pendekatan Studentt Centered Learning (SCL) khususnya Problem-Based Learning (PBL).  Nilai Akhir mata kuliah diperoleh dari nilai Ujian Tengah Semester (UTS) 15%, Ujian Akhir Semester (UAS) 15%, Penilaian teman sejawat (20%), partisipasi dalam kelas (10%), resume hasil diskusi (15%), presentasi hasil PBL (15%), dan Tugas ringkasan dari dosen tamu (10%).',
            'rating' => 0.0,
            'slug' => 'tpn1201-perspektif-global-ilmu-dan-teknologi-pangan'
        ]);

        SupportCourse::create([
            'courses_id' => 'TPN1221',
            'courses_name' => 'Mikrobiologi Pangan',
            'faculty_id' => 6,
            'course_credits' => '2-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Ilmu Mikrobiologi Pangan merupakan ilmu dalam lingkup Ilmu dan Teknologi Pangan yang membahas mengenai pola pertumbuhan mikroba, pemanfaatan mikroba untuk menghasilkan produk yang bermanfaat, pengenalan terhadap mikroba perusak dan mikroba patogen, serta berbagai cara untuk mengendalikan mikroba tersebut dan juga menganalisis keberadaannya pada pangan.',
            'rating' => 0.0,
            'slug' => 'tpn1221-mikrobiologi-pangan'
        ]);

        SupportCourse::create([
            'courses_id' => 'AKU1711',
            'courses_name' => 'Evaluasi Produksi dan Bisnis Akuakultur',
            'faculty_id' => 3,
            'course_credits' => '2-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Dalam mata kuliah ini, Anda akan mempelajari teknik evaluasi kinerja produksi akuakultur, termasuk pengukuran parameter produksi, analisis data, dan penilaian efisiensi operasi budidaya. Selain itu, Anda juga akan belajar tentang aspek bisnis dalam industri akuakultur, seperti perencanaan bisnis, analisis pasar, manajemen keuangan, pemasaran, dan strategi penentuan harga produk akuakultur. Mata kuliah ini memberikan landasan penting bagi Anda untuk memahami evaluasi produksi akuakultur secara efektif serta pengelolaan bisnis yang sukses di industri akuakultur. Selama mata kuliah, Anda akan diperkenalkan pada alat evaluasi ekonomi yang digunakan dalam akuakultur, seperti analisis biaya dan manfaat, analisis investasi, dan perhitungan keuntungan. Anda akan belajar bagaimana menerapkan analisis ekonomi dalam pengambilan keputusan bisnis di industri akuakultur. Pengetahuan dan keterampilan yang Anda peroleh dari mata kuliah ini akan mempersiapkan Anda untuk menjadi profesional yang kompeten dalam evaluasi produksi dan pengelolaan bisnis di industri akuakultur, serta membantu Anda merencanakan dan mengoptimalkan operasi budidaya akuakultur dengan efisien dan mengambil keputusan yang tepat untuk kesuksesan bisnis akuakultur.',
            'rating' => 0.0,
            'slug' => 'aku1711-evaluas-produksi-dan-bisnis-akuakultur'
        ]);

        SupportCourse::create([
            'courses_id' => 'IPH311',
            'courses_name' => 'Ilmu Kesehatan Masyarakat',
            'faculty_id' => 2,
            'course_credits' => '1-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Membahas secara umum tentang dasar ilmu kesehatan masyarakat; hubungan dengan hidup manusia serta arti lingkungan hidup manusia; kesehatan pekerja, pencemaran; serta dampaknya terhadap kesehatan masyarakat dan cara penanggulangannya.',
            'rating' => 0.0,
            'slug' => 'iph311-ilmu-kesehatan-masyarakat'
        ]);

        SupportCourse::create([
            'courses_id' => 'IKK334',
            'courses_name' => 'Manajemen Sumber Daya Keluarga',
            'faculty_id' => 9,
            'course_credits' => '3-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Mata kuliah ini bertujuan untuk memberikan pemahaman tentang prinsip-prinsip dan teknik manajemen yang dapat diterapkan dalam konteks keluarga dan rumah tangga. Dalam mata kuliah ini, Anda akan mempelajari konsep dasar manajemen sumber daya keluarga, termasuk manajemen keuangan, manajemen waktu, manajemen energi, dan manajemen tugas rumah tangga. Anda akan diajarkan bagaimana merencanakan dan mengelola anggaran keluarga, melakukan perencanaan keuangan jangka panjang, serta memahami pentingnya pengelolaan utang dan investasi dalam konteks keluarga. Selain itu, mata kuliah ini juga akan membahas aspek penting lainnya dalam manajemen sumber daya keluarga, seperti manajemen konsumsi, manajemen kebutuhan keluarga, dan manajemen konflik. Anda akan mempelajari cara mengelola dan mengoptimalkan penggunaan sumber daya yang terbatas dalam rumah tangga, termasuk pengambilan keputusan dalam hal pembelian, pengelolaan persediaan, dan alokasi waktu yang efektif.',
            'rating' => 0.0,
            'slug' => 'ikk334-manajemen-sumber-daya-keluarga'
        ]);

        SupportCourse::create([
            'courses_id' => 'TPN1321',
            'courses_name' => 'Keamanan dan Sanitasi Pangan',
            'faculty_id' => 6,
            'course_credits' => '2-0',
            'date' => 'Selasa, 13.00 WIB',
            'desc' => 'Matakuliah ini mendiskusikan bahaya keamanan pangan dan tindakan pengendaliannya di industri pangan, terutama melalui aplikasi sanitasi dan higiene un tuk mencapai keamanan pangan.  Secara rinci bahaya biologi, kimia, fisik dan dampaknya terhadap kesehatan dan kejadian luar biasa penyakit bawaan pangan juga didiskusikan. Pembersihan, sanitasi, senyawa pembersih (cleaning agents) dan penyanitasi (sanitizers), prinsip-prinsip disain saniter (sanitary design), higiene personal, pemantauan lingkungan (environmental monitoring) dan pengendalian proses (process ncontrol) akan dipelajari secara mendalam. Sebagai tambahan, polusi air, sanitasi air serta penanganan limbah industri pangan serta pendekatan manajerial untuk membangun keamanan pangan melalui Good Manufacturing Practices (GMP), Sanitation Standard Operating Procedures (SSOP) dan Hazard Analysis Critical Control Points (HACCP) akan diperkenalkan.',
            'rating' => 0.0,
            'slug' => 'tpn1321-keamanan-dan-sanitasi-pangan'
        ]);

        // =============================================================
        
        mbkm::create([
            'mbkm_name' => 'Shopee',
            'periode_begin' => '2023-05-18 00:00:00',
            'periode_end' => '2023-10-05 00:00:00',
            'positions' => 'Software Engineer, Copywriter, Internet Marketing, HRD Manager, UX Researcher',
            'excerpt' => 'Software Engineer, Copywriter, Internet Marketing, etc',
            'benefit' => 'Program Intership bersertifikat selama 6 bulan yang setara dengan 20 sks. Memperoleh skill dunia nyata untuk mengasah potensi. Belajar langsung dari mentor yang berpengalaman',
            'requirements' => 'Mahasiswa semester 5-8 dari jurusan dan universitas manapun. Memiliki nilai minimal GPA 3,00',
            'rating' => 0.0,
            'slug' => 'shopee'
        ]);
        
        mbkm::create([
            'mbkm_name' => 'Tokopedia',
            'periode_begin' => '2023-07-15 00:00:00',
            'periode_end' => '2023-08-10 00:00:00',
            'positions' => 'Software Engineer, Copywriter, Creative Graphic Designer, E-Commerce Business Development, Internet Marketing - SEO, Social Media',
            'excerpt' => 'Software Engineer, Copywriter, Creative Graphic Designer, etc',
            'benefit' => 'Program Intership bersertifikat selama 6 bulan yang setara dengan 20 sks. Memperoleh skill dunia nyata untuk mengasah potensi. Belajar langsung dari mentor yang berpengalaman. Membangun dan memperluas koneksi. Mengeksplorasi dunia nyata teknik, biknis, dan marketing',
            'requirements' => 'Mahasiswa semester 5-8 dari jurusan dan universitas manapun. Memiliki nilai minimal GPA 3,00',
            'rating' => 0.0,
            'slug' => 'tokopedia'
        ]);
        
        mbkm::create([
            'mbkm_name' => 'Blibli',
            'periode_begin' => '2023-07-15 00:00:00',
            'periode_end' => '2023-09-23 00:00:00',
            'positions' => 'Software Engineer, Social Media, Internet Marketing, UX Researcher, Copywriter',
            'excerpt' => 'Software Engineer, Social Media, Internet Marketing, etc',
            'benefit' => 'Program Intership bersertifikat selama 6 bulan yang setara dengan 20 sks. Memperoleh skill dunia nyata untuk mengasah potensi. Belajar langsung dari mentor yang berpengalaman. Membangun dan memperluas koneksi',
            'requirements' => 'Mahasiswa semester 6-8 dari jurusan dan universitas manapun. Memiliki nilai minimal GPA 2,75',
            'rating' => 0.0,
            'slug' => 'blibli'
        ]);
        
        mbkm::create([
            'mbkm_name' => 'Bangkit Academy 2023',
            'periode_begin' => '2023-05-01 00:00:00',
            'periode_end' => '2023-06-07 00:00:00',
            'positions' => 'Machine learning, Mobile Development, Cloud Computing',
            'excerpt' => 'Machine learning, Mobile Development, Cloud Computing',
            'benefit' => 'Sertifikasi Global (Tensorflow Developer; Google Associate Android Developer; atau Google Associate Cloud Engineer), Kurikulum & Instruktur Industri (Machine Learning; Mobile Development (Android); atau Cloud Computing), Keterampilan untuk Siap Karier (Teknologi, soft skills, dan bahasa Inggris), Konversi 20 SKS (Terafiliasi dengan Kampus Merdeka - SIB), Lowongan Kerja untuk Lulusan, Dana Inkubasi untuk Bangun Startup (Dana senilai Rp 140 juta dan mentor industri untuk tim Capstone terbaik)',
            'requirements' => 'Warga Negara Indonesia (WNI), Memenuhi ketentuan umum program Studi Independen Kampus Merdeka pada saat pelaksanaan program, Mahasiswa aktif dan berasal dari jenjang: a) D4/S1 semester 6/8/10/12/14 pada saat program dilaksanakan (Februari-Juli 2023); atau b) D3 semester 3 atau keatas pada saat program dilaksanakan (Februari-Juli 2023), Tidak mengambil program Kampus Merdeka lainnya pada saat pelaksanaan program, Tidak mengambil internship/magang/pekerjaan apapun (part-time ataupun full-time) pada saat pelaksanaan program, Tidak memiliki komitmen paruh/penuh waktu terkait organisasi/volunteership/leadership/aktivitas program lainnya pada saat pelaksanaan program, Telah mendapatkan persetujuan dosen pembimbing untuk mengkonversi SKS melalui program ini, Mengambil 6 SKS atau kurang pada universitas asal (kuliah reguler) pada saat pelaksanaan program, Belum akan lulus dari universitas pada tanggal 31 Juli 2023',
            'rating' => 0.0,
            'slug' => 'bangkit-academy-2023'
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
