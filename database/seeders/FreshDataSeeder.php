<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FreshDataSeeder extends Seeder
{
    public function run()
    {
        // ─────────────────────────────────────────
        // HAPUS SEMUA DATA LAMA (urutan: child dulu)
        // ─────────────────────────────────────────
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tukar_poins')->truncate();
        DB::table('points')->truncate();
        DB::table('transactions')->truncate();
        DB::table('sampah')->truncate();
        DB::table('sampah_categories')->truncate();
        DB::table('rewards')->truncate();
        DB::table('users')->truncate();
        // Jangan hapus cms_users (admin login tetap ada)
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = Carbon::now();

        // ─────────────────────────────────────────
        // 1. SAMPAH CATEGORIES (7 kategori)
        // ─────────────────────────────────────────
        $categories = [
            ['name' => 'Logam',      'description' => 'Sampah jenis logam seperti besi, aluminium, tembaga'],
            ['name' => 'Plastik',    'description' => 'Sampah berbahan plastik seperti botol, ember, dll'],
            ['name' => 'Kertas',     'description' => 'Sampah kertas seperti kardus, koran, majalah'],
            ['name' => 'Kaca',       'description' => 'Sampah berbahan kaca seperti botol kaca, cermin'],
            ['name' => 'Elektronik', 'description' => 'Sampah elektronik seperti HP, kabel, baterai'],
            ['name' => 'Kayu',       'description' => 'Sampah berbahan kayu seperti palet, perabot rusak'],
            ['name' => 'Organik',    'description' => 'Sampah organik yang bisa diolah menjadi kompos'],
        ];
        foreach ($categories as &$c) {
            $c['created_at'] = $now;
            $c['updated_at'] = $now;
        }
        DB::table('sampah_categories')->insert($categories);
        $catIds = DB::table('sampah_categories')->pluck('id', 'name');

        // ─────────────────────────────────────────
        // 2. SAMPAH (7 jenis)
        //    price_per_kg = harga (Rp), point_per_kg = poin
        // ─────────────────────────────────────────
        $sampahs = [
            ['name' => 'Besi Tua',        'category_id' => $catIds['Logam'],      'price_per_kg' => 3000,  'point_per_kg' => 6,  'image' => 'sampah/besi.jpg'],
            ['name' => 'Aluminium',        'category_id' => $catIds['Logam'],      'price_per_kg' => 8000,  'point_per_kg' => 15, 'image' => 'sampah/aluminium.jpg'],
            ['name' => 'Botol Plastik',    'category_id' => $catIds['Plastik'],    'price_per_kg' => 1500,  'point_per_kg' => 3,  'image' => 'sampah/plastik.jpg'],
            ['name' => 'Kardus / Karton',  'category_id' => $catIds['Kertas'],     'price_per_kg' => 1200,  'point_per_kg' => 2,  'image' => 'sampah/kardus.jpg'],
            ['name' => 'Botol Kaca',       'category_id' => $catIds['Kaca'],       'price_per_kg' => 700,   'point_per_kg' => 1,  'image' => 'sampah/kaca.jpg'],
            ['name' => 'Kabel Tembaga',    'category_id' => $catIds['Elektronik'], 'price_per_kg' => 25000, 'point_per_kg' => 50, 'image' => 'sampah/kabel.jpg'],
            ['name' => 'Koran & Majalah',  'category_id' => $catIds['Kertas'],     'price_per_kg' => 900,   'point_per_kg' => 2,  'image' => 'sampah/koran.jpg'],
        ];
        foreach ($sampahs as &$s) {
            $s['created_at'] = $now;
            $s['updated_at'] = $now;
        }
        DB::table('sampah')->insert($sampahs);
        $sampahIds = DB::table('sampah')->pluck('id', 'name');

        // ─────────────────────────────────────────
        // 3. REWARDS (7 hadiah)
        //    price = harga dalam poin
        // ─────────────────────────────────────────
        $rewards = [
            ['name' => 'Tas Belanja Ramah Lingkungan', 'category' => 'Tas',        'description' => 'Tas kain daur ulang cocok untuk belanja harian',  'price' => 50,  'image' => 'rewards/tas.jpg',      'stock' => 20],
            ['name' => 'Tumbler Botol Minum 500ml',    'category' => 'Peralatan',  'description' => 'Botol minum stainless steel anti karat',           'price' => 80,  'image' => 'rewards/tumbler.jpg',  'stock' => 15],
            ['name' => 'Sabun Cuci Piring Organik',    'category' => 'Kebersihan', 'description' => 'Sabun cuci ramah lingkungan dari bahan alami',     'price' => 30,  'image' => 'rewards/sabun.jpg',    'stock' => 30],
            ['name' => 'Tempat Sampah Pilah 3-in-1',  'category' => 'Peralatan',  'description' => 'Tempat sampah dengan 3 kompartemen untuk pilah',   'price' => 150, 'image' => 'rewards/tempat.jpg',   'stock' => 10],
            ['name' => 'Buku Catatan Daur Ulang',      'category' => 'Alat Tulis', 'description' => 'Buku catatan dari kertas daur ulang 100 halaman', 'price' => 25,  'image' => 'rewards/buku.jpg',     'stock' => 40],
            ['name' => 'Payung Lipat Eco Series',      'category' => 'Lainnya',    'description' => 'Payung lipat ringan berbahan daur ulang',          'price' => 100, 'image' => 'rewards/payung.jpg',   'stock' => 12],
            ['name' => 'Voucher Belanja Rp 10.000',    'category' => 'Voucher',    'description' => 'Voucher belanja di merchant rekanan bank sampah',  'price' => 60,  'image' => 'rewards/voucher.jpg',  'stock' => 50],
        ];
        foreach ($rewards as &$r) {
            $r['created_at'] = $now;
            $r['updated_at'] = $now;
        }
        DB::table('rewards')->insert($rewards);
        $rewardIds = DB::table('rewards')->pluck('id', 'name');

        // ─────────────────────────────────────────
        // 4. USERS (7 nasabah)
        // ─────────────────────────────────────────
        $users = [
            ['username' => 'Budi Santoso',    'email' => 'budi@example.com',    'phone_number' => '081234567001', 'address' => 'Jl. Mawar No. 1, Bandung'],
            ['username' => 'Siti Rahayu',     'email' => 'siti@example.com',    'phone_number' => '081234567002', 'address' => 'Jl. Melati No. 5, Bandung'],
            ['username' => 'Ahmad Fauzi',     'email' => 'ahmad@example.com',   'phone_number' => '081234567003', 'address' => 'Jl. Kenanga No. 12, Bandung'],
            ['username' => 'Dewi Lestari',    'email' => 'dewi@example.com',    'phone_number' => '081234567004', 'address' => 'Jl. Dahlia No. 8, Bandung'],
            ['username' => 'Hendra Gunawan',  'email' => 'hendra@example.com',  'phone_number' => '081234567005', 'address' => 'Jl. Anggrek No. 3, Bandung'],
            ['username' => 'Rina Marlina',    'email' => 'rina@example.com',    'phone_number' => '081234567006', 'address' => 'Jl. Cempaka No. 7, Bandung'],
            ['username' => 'Tedi Kurniawan',  'email' => 'tedi@example.com',    'phone_number' => '081234567007', 'address' => 'Jl. Flamboyan No. 15, Bandung'],
        ];
        $userIds = [];
        foreach ($users as $u) {
            $id = DB::table('users')->insertGetId([
                'username'   => $u['username'],
                'email'      => $u['email'],
                'password'   => Hash::make('password123'),
                'phone_number' => $u['phone_number'],
                'address'    => $u['address'],
                'picture'    => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $userIds[] = $id;
        }

        // Admin ID (ambil dari cms_users yang sudah ada)
        $adminId = DB::table('cms_users')->value('id');

        // ─────────────────────────────────────────
        // 5. TRANSACTIONS (7 transaksi)
        //    Poin = total_weight * point_per_kg sampah
        // ─────────────────────────────────────────
        $transData = [
            // [user_index, sampah_name, weight_kg]
            [6, 'Besi Tua',       5.0],   // Tedi → besi 5kg → 6pt/kg → 30pt
            [0, 'Aluminium',      2.5],   // Budi → aluminium 2.5kg → 15pt/kg → 37pt
            [1, 'Botol Plastik',  8.0],   // Siti → plastik 8kg → 3pt/kg → 24pt
            [2, 'Kardus / Karton',10.0],  // Ahmad → kardus 10kg → 2pt/kg → 20pt
            [3, 'Kabel Tembaga',  1.0],   // Dewi → kabel 1kg → 50pt/kg → 50pt
            [4, 'Botol Kaca',     6.0],   // Hendra → kaca 6kg → 1pt/kg → 6pt
            [5, 'Koran & Majalah',12.0],  // Rina → koran 12kg → 2pt/kg → 24pt
        ];

        $transactionIds = [];
        $userPointMap = [];

        foreach ($transData as [$userIdx, $sampahName, $weight]) {
            $sampah = DB::table('sampah')->where('name', $sampahName)->first();
            $userId = $userIds[$userIdx];
            $income = (int) round($sampah->price_per_kg * $weight);
            $points = (int) round($sampah->point_per_kg * $weight);

            $tid = DB::table('transactions')->insertGetId([
                'user_id'        => $userId,
                'admin_id'       => $adminId,
                'sampah_id'      => $sampah->id,
                'total_weight'   => $weight,
                'total_income'   => $income,
                'point_received' => $points,
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
            $transactionIds[] = $tid;

            // Akumulasi poin per user
            if (!isset($userPointMap[$userId])) $userPointMap[$userId] = 0;
            $userPointMap[$userId] += $points;
        }

        // ─────────────────────────────────────────
        // 6. POINTS (akumulasi per user dari transaksi)
        // ─────────────────────────────────────────
        foreach ($userPointMap as $userId => $totalPoin) {
            DB::table('points')->insert([
                'user_id'      => $userId,
                'total_points' => $totalPoin,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]);
        }

        // ─────────────────────────────────────────
        // 7. TUKAR POIN (7 penukaran)
        // ─────────────────────────────────────────
        $tukarData = [
            // [user_index, reward_name, qty, status]
            [6, 'Tas Belanja Ramah Lingkungan', 1, 'selesai'],   // Tedi 30pt → tukar tas 50pt ✗ (buat status pending)
            [0, 'Buku Catatan Daur Ulang',      1, 'selesai'],   // Budi 37pt → buku 25pt ✓
            [1, 'Sabun Cuci Piring Organik',    1, 'selesai'],   // Siti 24pt → sabun 30pt (pending)
            [2, 'Buku Catatan Daur Ulang',      1, 'selesai'],   // Ahmad 20pt → buku 25pt (pending)
            [3, 'Tumbler Botol Minum 500ml',    1, 'selesai'],   // Dewi 50pt → tumbler 80pt (pending)
            [4, 'Buku Catatan Daur Ulang',      1, 'pending'],   // Hendra 6pt → buku 25pt (pending)
            [5, 'Sabun Cuci Piring Organik',    1, 'pending'],   // Rina 24pt → sabun 30pt (pending)
        ];

        foreach ($tukarData as [$userIdx, $rewardName, $qty, $status]) {
            $reward = DB::table('rewards')->where('name', $rewardName)->first();
            $userId = $userIds[$userIdx];

            DB::table('tukar_poins')->insert([
                'user_id'     => $userId,
                'admin_id'    => $adminId,
                'reward_id'   => $reward->id,
                'quantity'    => $qty,
                'total_price' => $reward->price * $qty,
                'status'      => $status,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }

        $this->command->info('✅ Fresh data seeded successfully!');
        $this->command->info('   - 7 Kategori Sampah');
        $this->command->info('   - 7 Jenis Sampah');
        $this->command->info('   - 7 Reward/Hadiah');
        $this->command->info('   - 7 Nasabah (user)');
        $this->command->info('   - 7 Transaksi');
        $this->command->info('   - ' . count($userPointMap) . ' Data Poin');
        $this->command->info('   - 7 Tukar Poin');
    }
}
