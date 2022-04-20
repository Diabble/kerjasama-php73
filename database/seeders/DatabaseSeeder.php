<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ModelBeranda;

use App\Models\ModelProfilUINSGD;

use App\Models\ModelCapaianKinerja;

use App\Models\ModelWakilRektor;

use App\Models\ModelVisi;

use App\Models\ModelMisi;

use App\Models\ModelTugasPokokFungsi;

use App\Models\ModelKebijakanProgram;

use App\Models\ModelStruktur;

use App\Models\ModelAlurKerjasama;

use App\Models\ModelPengajuanKerjasama;

use App\Models\ModelFAQ;

use App\Models\ModelBerita;

use App\Models\ModelKategoriBerita;

use App\Models\ModelPengumuman;

use App\Models\ModelGaleri;

use App\Models\ModelBerkasKerjasama;

use App\Models\ModelAjukanKerjasama;

use App\Models\ModelAngketKepuasanLayanan;

use App\Models\ModelKontak;

use App\Models\ModelIO;

use App\Models\ModelMitra;

use App\Models\ModelKategoriKodeInstansi;

use App\Models\ModelKategoriKetInstansi;

use App\Models\ModelKategoriJenisNaskah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ModelBeranda::create([
        //     'judulcarousel' => "Kerjasama dan Pengembangan Lembaga",
        //     'deskripsicarousel' => "UIN Sunan Gunung Djati Bandung",
        //     'tombolcarousel' => "Ajukan Kerjasama",
        // ]);
        // ModelBeranda::create([
        //     'judulcarousel' => "Kerjasama dan Pengembangan Lembaga",
        //     'deskripsicarousel' => "UIN Sunan Gunung Djati Bandung",
        //     'tombolcarousel' => "Ajukan Kerjasama",
        // ]);
        // ModelBeranda::create([
        //     'judulcarousel' => "Kerjasama dan Pengembangan Lembaga",
        //     'deskripsicarousel' => "UIN Sunan Gunung Djati Bandung",
        //     'tombolcarousel' => "Ajukan Kerjasama",
        // ]);

        // ModelProfilUINSGD::create([
        //     'judul' => "Profil UIN Sunan Gunung Djati Bandung",
        //     'link' => "https://www.youtube.com/embed/yprwfSH4h9c",
        //     'deskripsi' => "Universitas Islam Negeri Sunan Gunung Djati Bandung merupakan sebuah Universitas yang banyak menjalin kerjasama dengan berbagai Lembaga, dengan di hadirkannya web ini di harapkan bisa mempermudah akses kerjasama yang akan di jalin antara Universitas Islam Negeri Sunan Gunung Djati Bandung dengan lembaga lainnya.",
        // ]);

        // ModelCapaianKinerja::create([
        //     'judul' => "Capaian Kinerja",
        //     'link' => "https://www.youtube.com/embed/Y77zRWy4czY",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelWakilRektor::create([
        //     'nama' => "Prof. Dr. Hj. Ulfiah, M.Si",
        //     'jabatan' => "Wakil Rektor IV Bagian kerjasama dan Pengembangan Lembaga",
        //     'nip' => "1234567890",
        //     'deskripsi' => "Kerjasama merupakan sebuah interaksi yang sangat penting bagi kehidupan manusia karena manusia sendiri merupakan makhluk sosial yang saling membutuhkan. Kerjasama sendiri akan dapat tercipta dengan sempurna apabila dua individu akan saling bahu-membahu untuk mencapai tujuan yang diinginkan. Begitupun dengan sebuah Lembaga yang saling bahu membahu, berkolaborasi untuk mewujudkan sebuah tujuan yang gemilang, unggul dan kompetitif. Universitas Islam Negeri Sunan Gunung Djati Bandung merupakan sebuah Universitas yang banyak menjalin kerjasama dengan berbagai Lembaga, dengan di hadirkannya web ini di harapkan bisa mempermudah akses kerjasama yang akan di jalin antara Universitas Islam Negeri Sunan Gunung Djati Bandung dengan lembaga lainnya. Berdasarkan Pasal 2 Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 14 Tahun 2014 menyatakan bahwa kerjasama perguruan tinggi bertujuan meningkatkan efektivitas, efisiensi, produktivitas, kreativitas, inovasi, mutu, dan relevansi pelaksanaan Tridharma Perguruan Tinggi untuk meningkatkan daya saing bangsa.",
        // ]);

        // ModelVisi::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelMisi::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelTugasPokokFungsi::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelKebijakanProgram::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelStruktur::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelAlurKerjasama::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        ModelPengajuanKerjasama::create([
            'instansi' => "5",
            'progres' => "Penjajakan",
        ]);
        ModelPengajuanKerjasama::create([
            'instansi' => "6",
            'progres' => "Pembahasan",
        ]);
        ModelPengajuanKerjasama::create([
            'instansi' => "7",
            'progres' => "Penandatangan",
        ]);

        // ModelFAQ::create([
        //     'pertanyaan' => "Bagaimana menginisiasi kerjasama bagi instansi eksternal?",
        //     'jawaban' => "Konten sedang disiapkan.",
        // ]);
        // ModelFAQ::create([
        //     'pertanyaan' => "Bagaiamana menginisiasi kerjasama bagi unit kerja (internal)?",
        //     'jawaban' => "Konten sedang disiapkan.",
        // ]);
        // ModelFAQ::create([
        //     'pertanyaan' => "Apa saja tahapan dan dokumen yang diperlukan untuk kerjasama?",
        //     'jawaban' => "Konten sedang disiapkan.",
        // ]);

        // ModelBerita::create([
        //     'judul' => "Bidang Kerjasama dan Pengembangan Lembaga UIN Sunan Gunung Djati Bandung Terus Tingkatkan Mutu Pendidikan Islam",
        //     'slug' => "bidang-kerjasama-dan-pengembangan-lembaga-uin-sunan-gunung-djati-bandung-terus-tingkatkan-mutu-pendidikan-islam",
        //     'deskripsi' => "Wakil Rektor IV Bidang Kerjasama dan Pengembangan Lembaga UIN Sunan Gunung Djati Bandung, Prof.Dr. Hj. Ulfiah, M.Si memimpin Rapat Evaluasi Bidang kerjasama dan International office yang dilaksanakan di Gedung O. Djauharuddin AR lt 3, Rabu (16/6/2021).",
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'views' => 0,
        //     'aktif' => 1
        // ]);
        // ModelBerita::create([
        //     'judul' => "Workshop Penyusunan Juknis Kerjasama dan Manajemen Operasional Tahun 2021 UIN Sunan Gunung Djati Bandung",
        //     'slug' => "workshop-penyusunan-juknis-kerjasama-dan-manajemen-operasional-tahun-2021-uin-sunan-gunung-djati-bandung",
        //     'deskripsi' => "Wakil Rektor I UIN Sunan Gunung Djati Bandung, Prof. Dr. H. Rosihon Anwar, M.Ag menyampaikan, UIN Bandung sedang proses rekognisi level ASEAN dengan adanya kerjasama yang dijalin antara UIN Bandung dengan berbagai Universitas dan lembaga lainnya.",
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'views' => 0,
        //     'aktif' => 1
        // ]);
        // ModelBerita::create([
        //     'judul' => "Rapat Koordinasi Evaluasi Pogram Kerjasama Tahun 2021",
        //     'slug' => "rapat-koordinasi-evaluasi-pogram-kerjasama-tahun-2021",
        //     'deskripsi' => "Bagian Kerjasama dan Kelembagaan UIN Sunan Gunung Djati Bandung menggelar Rapat Koordinasi Evaluasi Pogram Kerjasama tahun 2021 di Grand Sunshine Soreang, Senin (22/11/2021).",
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'views' => 0,
        //     'aktif' => 1
        // ]);
        // ModelBerita::create([
        //     'judul' => "Penandatanganan Kerjasama FEBI UIN Bandung dan FEBI UIN KHAS Jember",
        //     'slug' => "penandatanganan-kerjasama-febi-uin-bandung-dan-febi-uin-khas-jember",
        //     'deskripsi' => "Fakultas Ekonomi dan Bisnis Islam (FEBI) Universitas Islam Negeri (UIN) Sunan Gunung Djati Bandung menerima kunjungan dari Fakultas Ekonomi dan Bisnis Islam (FEBI) UIN Kiai Haji Achmad Siddiq Jember, Jumat (28/01/2021)",
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'views' => 0,
        //     'aktif' => 1
        // ]);

        // ModelKategoriBerita::create([
        //     'nama_kategori' => "Berita",
        //     'slug' => "berita",
        // ]);

        // ModelPengumuman::create([
        //     'judul' => "Pengumuman 1",
        //     'slug' => "pengumuman-1",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        //     'user_id' => 1,
        //     'aktif' => 1
        // ]);

        // // ModelGaleri::create([
        // //     'caption' => "Lorem ipsum dolor sit amet.",
        // // ]);

        // ModelAngketKepuasanLayanan::create([
        //     'link' => "https://docs.google.com/forms/d/e/1FAIpQLSf5yJK6j5e5vTIVTh5Fx5l8giDSWTa0rioTmBi8HcSnSsu6UQ/viewform?",
        // ]);

        // ModelIO::create([
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelMitra::create([
        //     'kodeinstansi' => 1,
        //     'ketinstansi' => 1,
        //     'instansi' => "Institut Agama Islam Muhammadiyah Sinjay",
        //     'bidkerjasama' => "Kerjasama dalam Bidang Pendidikan, Penelitian dan Pengabdian kepada Masyarakat",
        //     'jenisnaskah' => 1,
        //     'ketunit' => "Universitas",
        // ]);
        // ModelMitra::create([
        //     'kodeinstansi' => 2,
        //     'ketinstansi' => 2,
        //     'instansi' => "Fakultas Keguruan dan Ilmu Pendidikan Universitas Tadulako Palu",
        //     'bidkerjasama' => "Implementasi Kerjasama Program Pertukaran Pelajar Merdeka Belajar-Kampus Merdeka",
        //     'jenisnaskah' => 2,
        //     'ketunit' => "Fakultas Sains dan Teknologi",
        // ]);
        // ModelMitra::create([
        //     'kodeinstansi' => 3,
        //     'ketinstansi' => 1,
        //     'instansi' => "SMK Plus Alghifari Bandung",
        //     'bidkerjasama' => "Kegiatan Pengabdian Masyarakat",
        //     'jenisnaskah' => 1,
        //     'ketunit' => "Fakultas Sains dan Teknologi",
        // ]);

        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P1",
        //     'slug' => "p1",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P2",
        //     'slug' => "p2",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P3",
        //     'slug' => "p3",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P4",
        //     'slug' => "p4",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P5",
        //     'slug' => "p5",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P6",
        //     'slug' => "p6",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P7",
        //     'slug' => "p7",
        // ]);
        // ModelKategoriKodeInstansi::create([
        //     'nama_kategori' => "P8",
        //     'slug' => "p8",
        // ]);

        // ModelKategoriKetInstansi::create([
        //     'nama_kategori' => "Dalam Negeri",
        //     'slug' => "dalam-negeri",
        // ]);
        // ModelKategoriKetInstansi::create([
        //     'nama_kategori' => "Luar Negeri",
        //     'slug' => "luar-negeri",
        // ]);

        // ModelKategoriJenisNaskah::create([
        //     'nama_kategori' => "MoU",
        //     'slug' => "mou",
        // ]);
        // ModelKategoriJenisNaskah::create([
        //     'nama_kategori' => "MoA",
        //     'slug' => "moa",
        // ]);
    }
}
