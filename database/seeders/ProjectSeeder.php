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
        $projects = [
            [
                'title' => 'Portal Blitar Kota',
                'description' => 'Website resmi Pemerintah Kota Blitar yang menyediakan informasi layanan publik, berita, dan portal terintegrasi untuk masyarakat Kota Blitar.',
                'image' => null,
                'link' => 'https://www.blitarkota.go.id/',
            ],
            [
                'title' => 'Pusat Layanan Disabilitas',
                'description' => 'Platform layanan khusus untuk penyandang disabilitas yang dikembangkan oleh Dinas Pendidikan Kota Blitar untuk memberikan akses pendidikan yang inklusif.',
                'image' => null,
                'link' => 'https://pld.dispendik.blitarkota.go.id/',
            ],
            [
                'title' => 'SIRKAH',
                'description' => 'Sistem Informasi Keuangan Daerah BPKAD Kota Blitar untuk pengelolaan dan monitoring keuangan daerah secara digital dan transparan.',
                'image' => null,
                'link' => 'https://sirkah.blitarkota.go.id/',
            ],
            [
                'title' => 'PPDB Kabupaten Blitar',
                'description' => 'Portal Penerimaan Peserta Didik Baru online untuk Kabupaten Blitar yang memudahkan proses pendaftaran siswa baru secara digital.',
                'image' => null,
                'link' => 'https://ppdb.blitarkab.go.id/',
            ],
            [
                'title' => 'SILAPBAJA',
                'description' => 'Sistem Layanan Perizinan Berbasis Aplikasi Jawa yang dikembangkan untuk Diskominfotik Kota Blitar dalam rangka digitalisasi layanan perizinan.',
                'image' => null,
                'link' => 'https://silapbaja.blitarkota.go.id/',
            ],
            [
                'title' => 'E-MONEV',
                'description' => 'Sistem Monitoring dan Evaluasi elektronik untuk Badan Layanan Pengadaan Kota Blitar dalam memantau progress pengadaan barang dan jasa.',
                'image' => null,
                'link' => 'https://e-monev.blitarkota.go.id/',
            ],
            [
                'title' => 'Sistem Informasi SPBU',
                'description' => 'Sistem manajemen dan monitoring SPBU untuk Taruna Jaya Group yang mencakup inventory, penjualan, dan laporan operasional.',
                'image' => null,
                'link' => 'https://blitaris.com/spbu/',
            ],
            [
                'title' => 'Sistem Informasi Kasir',
                'description' => 'Aplikasi point of sale (POS) untuk Alfain Hijab yang mengelola transaksi penjualan, inventory, dan laporan keuangan.',
                'image' => null,
                'link' => 'https://alfain.blitaris.com/',
            ],
            [
                'title' => 'Absenku Dispendik',
                'description' => 'Sistem absensi digital untuk tenaga pendidik Kabupaten Blitar yang memudahkan monitoring kehadiran guru dan staff pendidikan.',
                'image' => null,
                'link' => 'https://absenku.blitarkab.go.id/',
            ],
            [
                'title' => 'Sistem Informasi Pelayanan Adminduk',
                'description' => 'Portal layanan administrasi kependudukan untuk Dinas Kependudukan dan Pencatatan Sipil Kota Blitar dalam memberikan layanan kepada masyarakat.',
                'image' => null,
                'link' => 'http://trial.sipak.blitarkota.go.id/',
            ],
            [
                'title' => 'Dashboard Layanan Pengaduan Terintegrasi',
                'description' => 'Platform terpadu untuk monitoring dan pengelolaan pengaduan masyarakat yang dikembangkan untuk Diskominfo Kabupaten Blitar.',
                'image' => null,
                'link' => 'https://dashboardpsc.blitarkab.go.id/',
            ],
            [
                'title' => 'Learning Management System',
                'description' => 'Platform e-learning untuk Institut Teknologi Sepuluh Nopember (ITS) yang mendukung pembelajaran online dan manajemen materi kuliah.',
                'image' => null,
                'link' => 'https://mooc.advancedmaterialsits.org/',
            ],
            [
                'title' => 'Website Profile Pramuka Kota Blitar',
                'description' => 'Website resmi Gerakan Pramuka Kwartir Cabang Kota Blitar yang menyediakan informasi kegiatan, berita, dan profil organisasi pramuka.',
                'image' => null,
                'link' => 'https://www.pramukakotablitar.org/',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
