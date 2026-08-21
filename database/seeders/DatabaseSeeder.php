<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tourism;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Master Admin (Super Admin)
        User::firstOrCreate(
            ['email' => 'admin@portalkopeng.id'],
            [
                'name' => 'Admin Portal Kopeng',
                'password' => bcrypt('password'),
                'role' => 'super_admin',
                'is_active' => true,
            ]
        );

        // ==========================================
        // UMKM Categories
        // ==========================================
        $umkmCategories = [
            'Kuliner & Makanan',
            'Kerajinan Tangan',
            'Pertanian & Perkebunan',
            'Oleh-Oleh & Souvenir',
        ];

        $umkmCats = [];
        foreach ($umkmCategories as $name) {
            $umkmCats[] = Category::firstOrCreate(
                [
                    'name' => $name,
                    'type' => 'umkm',
                ],
                [
                    'slug' => Str::slug($name),
                ]
            );
        }

        // ==========================================
        // Tourism Categories
        // ==========================================
        $wisataCategories = [
            'Wisata Alam',
            'Agrowisata',
            'Wisata Edukasi',
            'Camping & Outbound',
            'Kuliner & View',
            'Perdagangan / Wisata Blanja',
            'Penginapan',
            'Rekreasi',
        ];

        $wisataCats = [];
        foreach ($wisataCategories as $name) {
            $wisataCats[] = Category::firstOrCreate(
                [
                    'name' => $name,
                    'type' => 'wisata',
                ],
                [
                    'slug' => Str::slug($name),
                ]
            );
        }

        // ==========================================
        // UMKM Data (Sample/Development)
        // ==========================================
        $umkmData = [
            [
                'name' => '[Sample] Warung Sego Pecel Bu Darmi',
                'category' => 0,
                'description' => 'Warung sego pecel khas Jawa Tengah dengan sambal pecel buatan sendiri. Menyajikan berbagai lauk pauk tradisional yang diolah dengan resep turun temurun. Tempat makan sederhana namun cita rasa yang autentik.',
                'address' => 'Jl. Raya Kopeng No. 12, Desa Kopeng',
                'latitude' => -7.3720,
                'longitude' => 110.4210,
                'whatsapp' => '081234567001',
                'opening_hours' => '07:00 - 15:00',
            ],
            [
                'name' => '[Sample] Kedai Kopi Lereng Merbabu',
                'category' => 0,
                'description' => 'Kedai kopi dengan suasana pegunungan yang asri. Menyajikan kopi arabika lokal dari perkebunan sekitar Kopeng. Cocok untuk bersantai sambil menikmati udara sejuk.',
                'address' => 'Jl. Kopeng-Salatiga Km 3, Desa Kopeng',
                'latitude' => -7.3685,
                'longitude' => 110.4185,
                'whatsapp' => '081234567002',
                'opening_hours' => '09:00 - 21:00',
            ],
            [
                'name' => '[Sample] Batik Tulis Sekar Kopeng',
                'category' => 1,
                'description' => 'Produsen batik tulis dengan motif khas Kopeng yang terinspirasi dari keindahan alam sekitar. Menerima pesanan batik custom dan menyediakan workshop batik untuk wisatawan.',
                'address' => 'Dusun Sidomukti, Desa Kopeng',
                'latitude' => -7.3755,
                'longitude' => 110.4235,
                'whatsapp' => '081234567003',
                'opening_hours' => '08:00 - 16:00',
            ],
            [
                'name' => '[Sample] Sayur Organik Pak Slamet',
                'category' => 2,
                'description' => 'Petani sayur organik yang menanam berbagai jenis sayuran segar tanpa pestisida. Menyediakan sayur mayur segar langsung dari kebun setiap hari.',
                'address' => 'Dusun Kopeng Kulon, Desa Kopeng',
                'latitude' => -7.3800,
                'longitude' => 110.4150,
                'whatsapp' => '081234567004',
                'opening_hours' => '06:00 - 12:00',
            ],
            [
                'name' => '[Sample] Bakso Gepeng Mas Joko',
                'category' => 0,
                'description' => 'Bakso gepeng khas Kopeng dengan kuah kaldu sapi yang gurih. Porsi besar dengan harga terjangkau. Sudah terkenal di kalangan wisatawan dan warga lokal.',
                'address' => 'Jl. Raya Kopeng No. 28, Desa Kopeng',
                'latitude' => -7.3740,
                'longitude' => 110.4200,
                'whatsapp' => '081234567005',
                'opening_hours' => '10:00 - 20:00',
            ],
            [
                'name' => '[Sample] Keripik Jamur Mbak Ani',
                'category' => 3,
                'description' => 'Produsen keripik jamur kriuk dengan berbagai varian rasa. Oleh-oleh khas Kopeng yang terbuat dari jamur segar pilihan. Tersedia kemasan kecil dan besar.',
                'address' => 'Jl. Kopeng Indah No. 5, Desa Kopeng',
                'latitude' => -7.3710,
                'longitude' => 110.4250,
                'whatsapp' => '081234567006',
                'opening_hours' => '08:00 - 17:00',
            ],
            [
                'name' => '[Sample] Anyaman Bambu Pak Karso',
                'category' => 1,
                'description' => 'Pengrajin anyaman bambu yang membuat berbagai produk seperti keranjang, tampah, dan hiasan dinding. Kerajinan tradisional yang dilestarikan secara turun temurun.',
                'address' => 'Dusun Ngablak, Desa Kopeng',
                'latitude' => -7.3780,
                'longitude' => 110.4175,
                'whatsapp' => '081234567007',
                'opening_hours' => '08:00 - 16:00',
            ],
            [
                'name' => '[Sample] Strawberry Farm Fresh Kopeng',
                'category' => 2,
                'description' => 'Kebun strawberry segar yang bisa dipetik langsung oleh pengunjung. Juga menyediakan produk olahan strawberry seperti selai, jus, dan dodol strawberry.',
                'address' => 'Dusun Sidomukti, Desa Kopeng',
                'latitude' => -7.3695,
                'longitude' => 110.4300,
                'whatsapp' => '081234567008',
                'opening_hours' => '07:00 - 16:00',
            ],
            [
                'name' => '[Sample] Susu Segar Peternakan Merbabu',
                'category' => 2,
                'description' => 'Peternakan sapi perah yang menyediakan susu segar setiap hari. Pengunjung bisa belajar memerah susu dan mencicipi berbagai produk olahan susu.',
                'address' => 'Jl. Lereng Merbabu, Desa Kopeng',
                'latitude' => -7.3660,
                'longitude' => 110.4220,
                'whatsapp' => '081234567009',
                'opening_hours' => '06:00 - 14:00',
            ],
            [
                'name' => '[Sample] Getuk Goreng Bu Sumiyati',
                'category' => 3,
                'description' => 'Getuk goreng tradisional yang dibuat dari singkong pilihan. Camilan khas yang cocok dijadikan oleh-oleh. Tersedia dalam berbagai ukuran kemasan.',
                'address' => 'Jl. Raya Kopeng No. 35, Desa Kopeng',
                'latitude' => -7.3735,
                'longitude' => 110.4195,
                'whatsapp' => '081234567010',
                'opening_hours' => '07:00 - 18:00',
            ],
        ];

        foreach ($umkmData as $data) {
            $slug = Str::slug(str_replace('[Sample] ', '', $data['name']));
            $umkm = Umkm::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'address' => $data['address'],
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude'],
                    'whatsapp' => $data['whatsapp'],
                    'instagram' => null,
                    'opening_hours' => $data['opening_hours'],
                    'image' => null,
                    'is_published' => true,
                ]
            );
            $umkm->categories()->syncWithoutDetaching([$umkmCats[$data['category']]->id]);
        }

        // ==========================================
        // Tourism Data (Sample/Development)
        // ==========================================
        $tourismData = [
            [
                'name' => '[Sample] Air Terjun Kopeng Indah',
                'category' => 0,
                'description' => 'Air terjun dengan ketinggian sekitar 25 meter yang dikelilingi pepohonan hijau. Suasananya sangat sejuk dan asri, cocok untuk relaksasi dan menikmati keindahan alam. Akses jalan menuju air terjun cukup mudah.',
                'address' => 'Dusun Kopeng Kulon, Desa Kopeng',
                'latitude' => -7.3820,
                'longitude' => 110.4130,
                'phone' => '081234568001',
                'ticket_price' => 'Rp 10.000',
                'facilities' => 'Parkir, Toilet, Warung Makan, Area Foto',
                'opening_hours' => '07:00 - 17:00',
            ],
            [
                'name' => '[Sample] Agrowisata Kebun Teh Kopeng',
                'category' => 1,
                'description' => 'Perkebunan teh yang luas dengan pemandangan Gunung Merbabu yang indah. Pengunjung bisa belajar proses pengolahan teh, memetik teh sendiri, dan mencicipi teh segar langsung dari kebun.',
                'address' => 'Jl. Perkebunan Teh, Desa Kopeng',
                'latitude' => -7.3650,
                'longitude' => 110.4280,
                'phone' => '081234568002',
                'ticket_price' => 'Rp 15.000',
                'facilities' => 'Parkir, Toilet, Mushola, Gazebo, Toko Teh',
                'opening_hours' => '08:00 - 16:00',
            ],
            [
                'name' => '[Sample] Taman Wisata Bunga Kopeng',
                'category' => 0,
                'description' => 'Taman bunga yang memiliki koleksi berbagai jenis bunga hias dan tanaman langka. Tempat yang sangat instagramable dengan berbagai spot foto menarik.',
                'address' => 'Jl. Kopeng Indah No. 1, Desa Kopeng',
                'latitude' => -7.3700,
                'longitude' => 110.4260,
                'phone' => '081234568003',
                'ticket_price' => 'Rp 20.000',
                'facilities' => 'Parkir, Toilet, Mushola, Playground, Cafe, Area Foto',
                'opening_hours' => '08:00 - 17:00',
            ],
            [
                'name' => '[Sample] Camping Ground Lereng Merbabu',
                'category' => 3,
                'description' => 'Area camping dengan pemandangan Gunung Merbabu yang spektakuler. Dilengkapi fasilitas dasar camping dan area api unggun. Cocok untuk kegiatan outdoor dan team building.',
                'address' => 'Jl. Lereng Merbabu Km 2, Desa Kopeng',
                'latitude' => -7.3580,
                'longitude' => 110.4200,
                'phone' => '081234568004',
                'ticket_price' => 'Rp 25.000',
                'facilities' => 'Parkir, Toilet, Mushola, Camping Ground, Area Api Unggun, Sewa Tenda',
                'opening_hours' => '24 Jam',
            ],
            [
                'name' => '[Sample] Kebun Strawberry Edukasi Kopeng',
                'category' => 2,
                'description' => 'Wisata edukasi di kebun strawberry dimana pengunjung bisa belajar budidaya strawberry dan teknik pertanian modern. Cocok untuk anak-anak dan keluarga.',
                'address' => 'Dusun Sidomukti, Desa Kopeng',
                'latitude' => -7.3690,
                'longitude' => 110.4310,
                'phone' => '081234568005',
                'ticket_price' => 'Rp 15.000',
                'facilities' => 'Parkir, Toilet, Mushola, Area Edukasi, Toko Oleh-Oleh',
                'opening_hours' => '08:00 - 16:00',
            ],
            [
                'name' => '[Sample] Pemandangan Puncak Kopeng',
                'category' => 0,
                'description' => 'Gardu pandang di puncak bukit yang menawarkan pemandangan 360 derajat. Bisa melihat Gunung Merbabu, Gunung Telomoyo, dan hamparan persawahan. Spot terbaik untuk melihat sunrise.',
                'address' => 'Puncak Bukit Kopeng, Desa Kopeng',
                'latitude' => -7.3620,
                'longitude' => 110.4170,
                'phone' => '081234568006',
                'ticket_price' => 'Rp 5.000',
                'facilities' => 'Parkir, Toilet, Gazebo',
                'opening_hours' => '05:00 - 18:00',
            ],
            [
                'name' => '[Sample] Kolam Renang Alam Kopeng',
                'category' => 0,
                'description' => 'Kolam renang dengan air pegunungan yang sejuk dan alami. Terdapat kolam untuk dewasa dan anak-anak. Dilengkapi dengan area bermain dan gazebo.',
                'address' => 'Jl. Raya Kopeng No. 50, Desa Kopeng',
                'latitude' => -7.3750,
                'longitude' => 110.4140,
                'phone' => '081234568007',
                'ticket_price' => 'Rp 15.000',
                'facilities' => 'Parkir, Toilet, Ruang Ganti, Mushola, Warung Makan, Gazebo',
                'opening_hours' => '07:00 - 17:00',
            ],
        ];

        foreach ($tourismData as $data) {
            $slug = Str::slug(str_replace('[Sample] ', '', $data['name']));
            $tourism = Tourism::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'address' => $data['address'],
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude'],
                    'phone' => $data['phone'],
                    'instagram' => null,
                    'opening_hours' => $data['opening_hours'],
                    'ticket_price' => $data['ticket_price'],
                    'facilities' => $data['facilities'],
                    'image' => null,
                    'is_published' => true,
                ]
            );
            $tourism->categories()->syncWithoutDetaching([$wisataCats[$data['category']]->id]);
        }
    }
}
