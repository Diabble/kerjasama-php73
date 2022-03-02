<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use App\Models\ModelBeranda;

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

use App\Models\ModelLayananOnline;

use App\Models\ModelLayananKepuasan;

use App\Models\ModelLayananKami;

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
        // User::create([
        //     'name' => "DevAdmin",
        //     'level' => "Admin",
        //     'email' => "devadmin@gmail.com",
        //     'password' => bcrypt('devadminsih'),
        // ]);

        // ModelBeranda::create([
        //     'poto' => "",
        //     'judulcarousel' => "Kerjasama dan Pengembangan Lembaga",
        //     'deskripsicarousel' => "UIN Sunan Gunung Djati Bandung",
        //     'tombolcarousel' => "Ajukan Kerjasama",
        // ]);

        // ModelWakilRektor::create([
        //     'poto' => "",
        //     'nama' => "Prof. Dr. Hj. Ulfiah, M.Si",
        //     'jabatan' => "Wakil Rektor IV Bagian kerjasama dan Pengembangan Lembaga",
        //     'nip' => "1234567890",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        ModelVisi::create([
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        ]);

        ModelMisi::create([
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        ]);

        ModelTugasPokokFungsi::create([
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        ]);

        ModelKebijakanProgram::create([
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        ]);

        // ModelStruktur::create([
        //     'poto' => "",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        // ModelAlurKerjasama::create([
        //     'poto' => "",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        // ]);

        ModelPengajuanKerjasama::create([
            'instansi' => "Institut Agama Islam Muhammadiyah Sinjay",
            'progres' => "Selesai",
        ]);

        ModelFAQ::create([
            'pertanyaan' => "Bagaimana menginisiasi kerjasama bagi instansi eksternal?",
            'jawaban' => "Konten sedang disiapkan.",
        ]);
        ModelFAQ::create([
            'pertanyaan' => "Bagaiamana menginisiasi kerjasama bagi unit kerja (internal)?",
            'jawaban' => "Konten sedang disiapkan.",
        ]);
        ModelFAQ::create([
            'pertanyaan' => "Apa saja tahapan dan dokumen yang diperlukan untuk kerjasama?",
            'jawaban' => "Konten sedang disiapkan.",
        ]);

        // ModelBerita::create([
        //     'poto' => "",
        //     'judul' => "Judul Ke Satu",
        //     'slug' => "judul-ke-satu",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'views' => 0
        // ]);
        // ModelBerita::create([
        //     'poto' => "",
        //     'judul' => "Judul Ke Dua",
        //     'slug' => "judul-ke-dua",
        //     'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        //     'kategori_id' => 2,
        //     'user_id' => 1,
        //     'views' => 0
        // ]);

        ModelKategoriBerita::create([
            'nama_kategori' => "Kategori Berita 1",
            'slug' => "kategori-berita-1",
        ]);
        ModelKategoriBerita::create([
            'nama_kategori' => "Kategori Berita 2",
            'slug' => "kategori-berita-2",
        ]);

        ModelPengumuman::create([
            'judul' => "Pengumuman 1",
            'slug' => "pengumuman-1",
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
            'user_id' => 1,
        ]);

        // ModelGaleri::create([
        //     'poto' => "",
        //     'caption' => "Lorem ipsum dolor sit amet.",
        // ]);

        ModelIO::create([
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi mollitia, incidunt exercitationem quam accusantium quaerat nemo harum asperiores ipsum, nesciunt at nihil soluta officiis.",
        ]);

        // ModelMitra::create([
        //     'kodeinstansi' => 1,
        //     'ketinstansi' => 1,
        //     'instansi' => "Institut Agama Islam Muhammadiyah Sinjay",
        //     'bidkerjasama' => "Kerjasama dalam Bidang Pendidikan, Penelitian dan Pengabdian kepada Masyarakat",
        //     'jenisnaskah' => 1,
        //     'mulai' => 1,
        //     'selesai' => 1,
        // ]);
        // ModelMitra::create([
        //     'kodeinstansi' => 2,
        //     'ketinstansi' => 2,
        //     'instansi' => "Fakultas Keguruan dan Ilmu Pendidikan Universitas Tadulako Palu",
        //     'bidkerjasama' => "Implementasi Kerjasama Program Pertukaran Pelajar Merdeka Belajar-Kampus Merdeka",
        //     'jenisnaskah' => 2,
        //     'mulai' => 2,
        //     'selesai' => 2,
        // ]);

        ModelKategoriKodeInstansi::create([
            'nama_kategori' => "P1",
            'slug' => "p1",
        ]);
        ModelKategoriKodeInstansi::create([
            'nama_kategori' => "P2",
            'slug' => "p2",
        ]);

        ModelKategoriKetInstansi::create([
            'nama_kategori' => "Dalam Negeri",
            'slug' => "dalam-negeri",
        ]);
        ModelKategoriKetInstansi::create([
            'nama_kategori' => "Luar Negeri",
            'slug' => "luar-negeri",
        ]);

        ModelKategoriJenisNaskah::create([
            'nama_kategori' => "MoU",
            'slug' => "mou",
        ]);
        ModelKategoriJenisNaskah::create([
            'nama_kategori' => "MoA",
            'slug' => "moa",
        ]);
    }
}
