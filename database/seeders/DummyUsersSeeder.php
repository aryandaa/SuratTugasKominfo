<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
                [
                    'name'=>'Akun User',
                    'NIP'=>'20231201',
                    'pangkat'=>'Penata',
                    'jabatan'=>'Analis Tata Usaha',
                    'role'=>'user',
                    'password'=>bcrypt('12345678')
                ],
                [
                    'name'=>'Akun Admin',
                    'NIP'=>'20231130',
                    'pangkat'=>'Penata ',
                    'jabatan'=>'Fasilitator Kemitraan',
                    'role'=>'admin',
                    'password'=>bcrypt('12345678')
                ]
               ]; 
        

        foreach ($userData as $key => $val){
            User::create($val);
        }

        $inputsurat = [
            [
            'NoSurat'=> '148',
            'TanggalBuat'=> '2023-04-08',
            'Menimbang'=> 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023',
            'Dasar'=> '',
            'Untuk'=> 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong,',
            'DariTanggal'=> '2023-04-10',
            'SampaiTanggal'=> '2023-04-15',
            'KabKota'=> 'Banjarbaru',
            'Provinsi'=> 'Kalimantan Selatan',
            ],
            [
            'NoSurat'=> '149',
            'TanggalBuat'=> '2023-01-23',
            'Menimbang'=> 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023',
            'Dasar'=> 'Peraturan Menteri Pendidikan',
            'Untuk'=> 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ',
            'DariTanggal'=> '2023-01-25',
            'SampaiTanggal'=> '2023-01-26',
            'KabKota'=> 'Banjarbaru',
            'Provinsi'=> 'Kalimantan Selatan',
            ],
            [
            'NoSurat'=> '150',
            'TanggalBuat'=> '2023-11-30',
            'Menimbang'=> 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023',
            'Dasar'=> '',
            'Untuk'=> 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ',
            'DariTanggal'=> '2023-12-02',
            'SampaiTanggal'=> '2023-12-04',
            'KabKota'=> 'Banjarbaru',
            'Provinsi'=> 'Kalimantan Selatan',
            ],
            [
            'NoSurat'=> '151',
            'TanggalBuat'=> '2023-03-13',
            'Menimbang'=> 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023',
            'Dasar'=> 'Peraturan Kaprog',
            'Untuk'=> 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ',
            'DariTanggal'=> '2023-03-15',
            'SampaiTanggal'=> '2023-03-16',
            'KabKota'=> 'Banjarbaru',
            'Provinsi'=> 'Kalimantan Selatan',
            ],
            [
            'NoSurat'=> '152',
            'TanggalBuat'=> '2023-12-24',
            'Menimbang'=> 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023',
            'Dasar'=> 'Peraturan Menteri Keuangan',
            'Untuk'=> 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ',
            'DariTanggal'=> '2023-12-25',
            'SampaiTanggal'=> '2023-12-26',
            'KabKota'=> 'Banjarbaru',
            'Provinsi'=> 'Kalimantan Selatan',
            ],
            [
            'NoSurat'=> '153',
            'TanggalBuat'=> '2023-05-13',
            'Menimbang'=> 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023',
            'Dasar'=> '',
            'Untuk'=> 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ',
            'DariTanggal'=> '2023-05-13',
            'SampaiTanggal'=> '2023-05-20',
            'KabKota'=> 'Banjarbaru',
            'Provinsi'=> 'Kalimantan Selatan',
            ],
           ];
    
           foreach ($inputsurat as $surat) {
            Surat::create($surat);
           }
        
    }
}
