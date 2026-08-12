<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Clear existing records first to be fresh
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tukar_poins')->truncate();
        DB::table('transactions')->truncate();
        DB::table('points')->truncate();
        DB::table('users')->truncate();
        DB::table('sampah')->truncate();
        DB::table('sampah_categories')->truncate();
        DB::table('rewards')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Seed 15 Sampah Categories
        $categories = [
            ['name' => 'Plastik PET', 'description' => 'Plastik transparan seperti botol air mineral', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Plastik HDPE', 'description' => 'Plastik tebal seperti botol deterjen dan tutup botol', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Plastik LDPE', 'description' => 'Plastik lentur seperti kantong belanja dan pembungkus', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kertas Karton', 'description' => 'Kardus pembungkus barang tebal atau karton cokelat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kertas HVS', 'description' => 'Kertas kantor, buku bekas, lembaran kertas cetak putih', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kertas Koran', 'description' => 'Kertas koran bekas harian, brosur lipat, dan majalah lama', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Aluminium', 'description' => 'Kaleng minuman ringan, wadah aluminium foil bersih', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Besi & Seng', 'description' => 'Potongan besi, seng atap bekas, paku, dan kawat besi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tembaga', 'description' => 'Tembaga murni dari kabel kupas atau peralatan bekas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kaca Bening', 'description' => 'Botol sirup, toples kaca bening tanpa tutup logam', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kaca Berwarna', 'description' => 'Botol kaca berwarna hijau atau cokelat seperti botol kecap', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Elektronik Rumah', 'description' => 'Magic com rusak, setrika bekas, kipas angin mati', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gadget & Komputer', 'description' => 'HP lama, baterai kembung, keyboard, mouse rusak', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sampah Organik', 'description' => 'Sisa potongan sayur, kulit buah, atau daun kering', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Minyak Jelantah', 'description' => 'Minyak sisa penggorengan dapur rumah tangga yang disaring', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('sampah_categories')->insert($categories);
        $categoryIds = DB::table('sampah_categories')->pluck('id', 'name')->toArray();

        // 3. Seed 20 Sampah Items
        $sampahItems = [
            ['category_id' => $categoryIds['Plastik PET'], 'name' => 'Botol Plastik PET Bersih', 'price_per_kg' => 3000, 'image' => 'uploads/sampah/botol_pet.jpg'],
            ['category_id' => $categoryIds['Plastik PET'], 'name' => 'Gelas Plastik Bening PET', 'price_per_kg' => 2000, 'image' => 'uploads/sampah/gelas_pet.jpg'],
            ['category_id' => $categoryIds['Plastik HDPE'], 'name' => 'Botol Sabun HDPE Tebal', 'price_per_kg' => 2500, 'image' => 'uploads/sampah/botol_hdpe.jpg'],
            ['category_id' => $categoryIds['Plastik HDPE'], 'name' => 'Botol Minyak Goreng HDPE', 'price_per_kg' => 1800, 'image' => 'uploads/sampah/botol_minyak_hdpe.jpg'],
            ['category_id' => $categoryIds['Plastik LDPE'], 'name' => 'Kantong Kresek Bersih', 'price_per_kg' => 1200, 'image' => 'uploads/sampah/kresek.jpg'],
            ['category_id' => $categoryIds['Kertas Karton'], 'name' => 'Kardus Bekas Cokelat', 'price_per_kg' => 2500, 'image' => 'uploads/sampah/kardus.jpg'],
            ['category_id' => $categoryIds['Kertas HVS'], 'name' => 'Kertas HVS Kantor Bekas', 'price_per_kg' => 2000, 'image' => 'uploads/sampah/kertas_hvs.jpg'],
            ['category_id' => $categoryIds['Kertas HVS'], 'name' => 'Buku Pelajaran Bekas', 'price_per_kg' => 1800, 'image' => 'uploads/sampah/buku_bekas.jpg'],
            ['category_id' => $categoryIds['Kertas Koran'], 'name' => 'Koran Bekas Harian', 'price_per_kg' => 1500, 'image' => 'uploads/sampah/koran.jpg'],
            ['category_id' => $categoryIds['Aluminium'], 'name' => 'Kaleng Soda Aluminium', 'price_per_kg' => 8000, 'image' => 'uploads/sampah/kaleng.jpg'],
            ['category_id' => $categoryIds['Besi & Seng'], 'name' => 'Besi Tua / Rantai Karatan', 'price_per_kg' => 4000, 'image' => 'uploads/sampah/besi.jpg'],
            ['category_id' => $categoryIds['Tembaga'], 'name' => 'Tembaga Kupas Super', 'price_per_kg' => 15000, 'image' => 'uploads/sampah/tembaga.jpg'],
            ['category_id' => $categoryIds['Kaca Bening'], 'name' => 'Botol Kaca Bening Sirup', 'price_per_kg' => 1000, 'image' => 'uploads/sampah/botol_bening.jpg'],
            ['category_id' => $categoryIds['Kaca Berwarna'], 'name' => 'Botol Kaca Cokelat Kecap', 'price_per_kg' => 800, 'image' => 'uploads/sampah/botol_cokelat.jpg'],
            ['category_id' => $categoryIds['Elektronik Rumah'], 'name' => 'Kipas Angin Rusak', 'price_per_kg' => 5000, 'image' => 'uploads/sampah/kipas.jpg'],
            ['category_id' => $categoryIds['Elektronik Rumah'], 'name' => 'Magic Com Mati Total', 'price_per_kg' => 6000, 'image' => 'uploads/sampah/magiccom.jpg'],
            ['category_id' => $categoryIds['Gadget & Komputer'], 'name' => 'HP Jadul / Rusak', 'price_per_kg' => 15000, 'image' => 'uploads/sampah/hp.jpg'],
            ['category_id' => $categoryIds['Gadget & Komputer'], 'name' => 'Keyboard USB Bekas', 'price_per_kg' => 4000, 'image' => 'uploads/sampah/keyboard.jpg'],
            ['category_id' => $categoryIds['Sampah Organik'], 'name' => 'Daun Kering & Sisa Sayur', 'price_per_kg' => 500, 'image' => 'uploads/sampah/organik.jpg'],
            ['category_id' => $categoryIds['Minyak Jelantah'], 'name' => 'Jerigen Minyak Jelantah', 'price_per_kg' => 7000, 'image' => 'uploads/sampah/jelantah.jpg'],
        ];
        foreach ($sampahItems as $item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            DB::table('sampah')->insert($item);
        }
        $sampahIds = DB::table('sampah')->get()->toArray();

        // 4. Seed 15 Rewards (UMKM Desa Setempat)
        $rewards = [
            // Hiasan
            ['name' => 'Vas Bunga Anyaman Pandan', 'category' => 'hiasan', 'description' => 'Vas bunga estetik hasil kerajinan anyaman daun pandan kering.', 'price' => 800, 'image' => 'uploads/rewards/vas_pandan.png', 'stock' => 20],
            ['name' => 'Hiasan Dinding Bambu Siluet', 'category' => 'hiasan', 'description' => 'Hiasan dinding eksklusif ukiran bambu siluet alam.', 'price' => 1200, 'image' => 'uploads/rewards/hiasan_bambu.png', 'stock' => 15],
            ['name' => 'Piring Anyaman Lidi Kelapa', 'category' => 'hiasan', 'description' => 'Satu set (6 pcs) piring saji tradisional anyaman lidi kelapa.', 'price' => 600, 'image' => 'uploads/rewards/piring_lidi.png', 'stock' => 40],
            ['name' => 'Miniatur Becak Bambu', 'category' => 'hiasan', 'description' => 'Kerajinan tangan pajangan miniatur becak berbahan bambu halus.', 'price' => 1500, 'image' => 'uploads/rewards/becak_bambu.png', 'stock' => 10],
            ['name' => 'Gantungan Kunci Kayu Ukir', 'category' => 'hiasan', 'description' => 'Gantungan kunci kayu dengan ukiran khas nama desa setempat.', 'price' => 300, 'image' => 'uploads/rewards/gantungan_ukir.png', 'stock' => 100],

            // Peralatan
            ['name' => 'Bangku Rotan Anyaman', 'category' => 'peralatan', 'description' => 'Bangku rotan kokoh hasil anyaman pengrajin lokal untuk ruang santai.', 'price' => 3500, 'image' => 'uploads/rewards/bangku_rotan.png', 'stock' => 8],
            ['name' => 'Tampah Bambu Tradisional', 'category' => 'peralatan', 'description' => 'Tampah bambu serbaguna untuk menjemur atau menampi beras.', 'price' => 500, 'image' => 'uploads/rewards/tampah_bambu.png', 'stock' => 30],
            ['name' => 'Sapu Lidi Tangkai Kayu', 'category' => 'peralatan', 'description' => 'Sapu lidi tebal dengan gagang kayu kokoh untuk halaman rumah.', 'price' => 400, 'image' => 'uploads/rewards/sapu_lidi.png', 'stock' => 50],
            ['name' => 'Tempat Tisu Rotan Estetik', 'category' => 'peralatan', 'description' => 'Kotak tisu minimalis rajutan serat rotan alam.', 'price' => 1000, 'image' => 'uploads/rewards/tisu_rotan.png', 'stock' => 25],
            ['name' => 'Keranjang Pakaian Bambu', 'category' => 'peralatan', 'description' => 'Keranjang baju kotor anyaman bambu diameter 40cm dengan tutup.', 'price' => 2000, 'image' => 'uploads/rewards/keranjang_bambu.png', 'stock' => 12],

            // Perlengkapan
            ['name' => 'Tas Anyaman Bambu Cantik', 'category' => 'perlengkapan', 'description' => 'Tas jinjing wanita anyaman bambu dengan aksen tali kulit.', 'price' => 1500, 'image' => 'uploads/rewards/tas_anyaman.png', 'stock' => 15],
            ['name' => 'Topi Caping Bambu Lebar', 'category' => 'perlengkapan', 'description' => 'Topi caping tradisional pengrajin bambu pelindung sinar matahari.', 'price' => 800, 'image' => 'uploads/rewards/topi_caping.png', 'stock' => 25],
            ['name' => 'Dompet Koin Rotan Mini', 'category' => 'perlengkapan', 'description' => 'Dompet koin anyaman rotan bulat dengan resleting.', 'price' => 500, 'image' => 'uploads/rewards/dompet_rotan.png', 'stock' => 60],
            ['name' => 'Sandal Selop Eceng Gondok', 'category' => 'perlengkapan', 'description' => 'Sandal santai rumah berbahan serat anyaman eceng gondok kering.', 'price' => 1200, 'image' => 'uploads/rewards/sandal_eceng.png', 'stock' => 20],
            ['name' => 'Eco Bag Goni UMKM', 'category' => 'perlengkapan', 'description' => 'Tas belanja ramah lingkungan berbahan kain goni tebal dan kuat.', 'price' => 1000, 'image' => 'uploads/rewards/tas_goni.png', 'stock' => 30],
        ];
        foreach ($rewards as $r) {
            $r['created_at'] = Carbon::now();
            $r['updated_at'] = Carbon::now();
            DB::table('rewards')->insert($r);
        }
        $rewardIds = DB::table('rewards')->get()->toArray();

        // 5. Seed 20 Users (1 default + 19 new)
        $userIds = [];

        // Seed default user
        $userIds[] = DB::table('users')->insertGetId([
            'username' => 'tedihanafiah',
            'email' => 'tedihanafiah12@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'Desa Cibugel RT 02/RW 03, Cisoka, Tangerang',
            'phone_number' => '081234567890',
            'created_at' => Carbon::now()->subDays(30),
            'updated_at' => Carbon::now()->subDays(30),
        ]);

        $usernames = [
            'budi_santoso', 'ani_lestari', 'eko_wahyudi', 'dewi_kartika', 'rudi_hermawan',
            'siti_aminah', 'joko_susilo', 'rara_wulandari', 'agus_setiawan', 'yanti_sumiati',
            'andi_wijaya', 'lisa_permata', 'hendra_gunawan', 'mega_kusuma', 'fajar_hidayat',
            'dian_safitri', 'tony_sucipto', 'wulan_sari', 'hendri_pratama'
        ];

        $addresses = [
            'Kp. Cisoka RT 01/RW 01, Desa Cisoka, Kec. Cisoka, Tangerang',
            'Kp. Cibugel RT 03/RW 02, Desa Cibugel, Kec. Cisoka, Tangerang',
            'Kp. Bojong RT 04/RW 01, Desa Bojong, Kec. Cisoka, Tangerang',
            'Kp. Karang Harja RT 02/RW 04, Desa Karangharja, Kec. Cisoka, Tangerang',
            'Perumahan Cisoka Indah Regensi Blok A1 No. 5, Kec. Cisoka, Tangerang',
            'Kp. Jeunjing RT 01/RW 03, Desa Jeunjing, Kec. Cisoka, Tangerang',
            'Kp. Munjul RT 05/RW 02, Desa Munjul, Kec. Cisoka, Tangerang',
            'Kp. Sukatani RT 02/RW 01, Desa Sukatani, Kec. Cisoka, Tangerang',
            'Kp. Carenang RT 03/RW 03, Desa Carenang, Kec. Cisoka, Tangerang'
        ];

        foreach ($usernames as $u) {
            $randomDay = rand(5, 28);
            $userIds[] = DB::table('users')->insertGetId([
                'username' => $u,
                'email' => $u . '@gmail.com',
                'password' => Hash::make('password'),
                'address' => $addresses[array_rand($addresses)],
                'phone_number' => '0857' . rand(10000000, 99999999),
                'created_at' => Carbon::now()->subDays($randomDay),
                'updated_at' => Carbon::now()->subDays($randomDay),
            ]);
        }

        // 6. Seed transactions (1 to 5 for each user) and track accumulated points
        $accumulatedPoints = [];
        $deductedPoints = [];

        foreach ($userIds as $uid) {
            $txCount = rand(1, 5);
            $userTotalPoints = 0;

            for ($t = 0; $t < $txCount; $t++) {
                $sampah = $sampahIds[array_rand($sampahIds)];
                $weight = rand(50, 250) / 10; // 5.0 to 25.0 kg
                $points = (int) ($weight * 100); // 100 points per kg
                $income = (int) ($weight * $sampah->price_per_kg);
                $randomHours = rand(24, 720); // within the last 30 days

                DB::table('transactions')->insert([
                    'user_id' => $uid,
                    'admin_id' => 1,
                    'sampah_id' => $sampah->id,
                    'total_weight' => $weight,
                    'total_income' => $income,
                    'point_received' => $points,
                    'created_at' => Carbon::now()->subHours($randomHours),
                    'updated_at' => Carbon::now()->subHours($randomHours),
                ]);

                $userTotalPoints += $points;
            }

            $accumulatedPoints[$uid] = $userTotalPoints;
            $deductedPoints[$uid] = 0;
        }

        // 7. Seed exactly 15 point redemptions (for the first 15 users)
        for ($i = 0; $i < 15; $i++) {
            $uid = $userIds[$i];
            $userPoints = $accumulatedPoints[$uid];

            $affordableRewards = array_filter($rewardIds, function($r) use ($userPoints) {
                return $r->price <= $userPoints;
            });

            if (empty($affordableRewards)) {
                // sort rewards by price ascending
                usort($rewardIds, function($a, $b) {
                    return $a->price <=> $b->price;
                });
                $reward = $rewardIds[0];
            } else {
                $reward = $affordableRewards[array_rand($affordableRewards)];
            }

            $qty = 1;
            $price = $reward->price * $qty;
            $status = array_rand(['Selesai' => 0, 'Dalam Proses' => 1]) ? 'Selesai' : 'Dalam Proses';
            $randomHours = rand(1, 24);

            DB::table('tukar_poins')->insert([
                'user_id' => $uid,
                'admin_id' => 1,
                'reward_id' => $reward->id,
                'quantity' => $qty,
                'total_price' => $price,
                'status' => $status,
                'created_at' => Carbon::now()->subHours($randomHours),
                'updated_at' => Carbon::now()->subHours($randomHours),
            ]);

            $deductedPoints[$uid] = $price;
        }

        // 8. Seed points table (exactly 20 records, 1 for each user)
        foreach ($userIds as $uid) {
            DB::table('points')->insert([
                'user_id' => $uid,
                'total_points' => max(0, $accumulatedPoints[$uid] - $deductedPoints[$uid]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
