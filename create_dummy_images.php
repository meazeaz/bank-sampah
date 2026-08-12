<?php
// create_dummy_images.php

$publicPath = __DIR__ . '/public';
$sampahPath = $publicPath . '/uploads/sampah';
$rewardsPath = $publicPath . '/uploads/rewards';

// Create directories if they do not exist
if (!is_dir($sampahPath)) {
    mkdir($sampahPath, 0777, true);
}
if (!is_dir($rewardsPath)) {
    mkdir($rewardsPath, 0777, true);
}

// Function to generate a beautiful, modern gradient image with text
function generateGradientImage($path, $title, $category = 'general') {
    $width = 400;
    $height = 300;
    $img = imagecreatetruecolor($width, $height);

    // Turn on antialiasing if supported
    if (function_exists('imageantialias')) {
        imageantialias($img, true);
    }

    // Pick colors based on category
    switch ($category) {
        case 'plastic':
            $c1 = [22, 163, 74];   // Emerald Green
            $c2 = [74, 222, 128];  // Mint Green
            break;
        case 'paper':
            $c1 = [37, 99, 235];   // Royal Blue
            $c2 = [147, 197, 253]; // Sky Blue
            break;
        case 'metal':
            $c1 = [217, 119, 6];   // Amber Gold
            $c2 = [252, 211, 77];  // Yellow Gold
            break;
        case 'glass':
            $c1 = [13, 148, 136];  // Teal
            $c2 = [45, 212, 191];  // Light Teal
            break;
        case 'electronic':
            $c1 = [220, 38, 38];   // Crimson Red
            $c2 = [248, 113, 113]; // Soft Red
            break;
        case 'organic':
            $c1 = [101, 163, 13];  // Lime Green
            $c2 = [190, 242, 100]; // Yellow Green
            break;
        case 'voucher':
            $c1 = [147, 51, 234];  // Purple
            $c2 = [216, 180, 254]; // Soft Lavender
            break;
        case 'goods':
            $c1 = [79, 70, 229];   // Indigo
            $c2 = [165, 180, 252]; // Light Indigo
            break;
        case 'food':
            $c1 = [234, 88, 12];   // Orange
            $c2 = [253, 186, 116]; // Soft Peach
            break;
        default:
            $c1 = [75, 85, 99];    // Gray
            $c2 = [156, 163, 175]; // Light Gray
            break;
    }

    // Draw background gradient (vertical)
    for ($y = 0; $y < $height; $y++) {
        $r = (int)($c1[0] + ($y / $height) * ($c2[0] - $c1[0]));
        $g = (int)($c1[1] + ($y / $height) * ($c2[1] - $c1[1]));
        $b = (int)($c1[2] + ($y / $height) * ($c2[2] - $c1[2]));
        $color = imagecolorallocate($img, $r, $g, $b);
        imageline($img, 0, $y, $width, $y, $color);
    }

    // Draw some subtle abstract shapes (e.g. circle in the background)
    $whiteTrans = imagecolorallocatealpha($img, 255, 255, 255, 110);
    imagefilledellipse($img, $width / 2, $height / 2 - 20, 140, 140, $whiteTrans);

    // Draw icon representation using simple GD shapes
    $accentColor = imagecolorallocate($img, $c1[0], $c1[1], $c1[2]);
    $white = imagecolorallocate($img, 255, 255, 255);
    
    // Draw stylized icon inside the circle
    if ($category === 'plastic') {
        // Draw bottle shape
        imagefilledrectangle($img, $width / 2 - 15, $height / 2 - 60, $width / 2 + 15, $height / 2 + 30, $accentColor);
        imagefilledrectangle($img, $width / 2 - 25, $height / 2 - 40, $width / 2 + 25, $height / 2 + 30, $accentColor);
        imagefilledrectangle($img, $width / 2 - 10, $height / 2 - 70, $width / 2 + 10, $height / 2 - 60, $white);
    } elseif ($category === 'paper') {
        // Draw folded sheet
        imagefilledrectangle($img, $width / 2 - 25, $height / 2 - 50, $width / 2 + 25, $height / 2 + 30, $accentColor);
        imagefilledrectangle($img, $width / 2 - 15, $height / 2 - 30, $width / 2 + 15, $height / 2 - 25, $white);
        imagefilledrectangle($img, $width / 2 - 15, $height / 2 - 15, $width / 2 + 15, $height / 2 - 10, $white);
        imagefilledrectangle($img, $width / 2 - 15, $height / 2 + 0, $width / 2 + 15, $height / 2 + 5, $white);
    } elseif ($category === 'metal') {
        // Draw tin can shape
        imagefilledrectangle($img, $width / 2 - 20, $height / 2 - 50, $width / 2 + 20, $height / 2 + 30, $accentColor);
        imagefilledellipse($img, $width / 2, $height / 2 - 50, 40, 10, $white);
        imagefilledellipse($img, $width / 2, $height / 2 + 30, 40, 10, $accentColor);
    } elseif ($category === 'glass') {
        // Draw glass jar
        imagefilledrectangle($img, $width / 2 - 20, $height / 2 - 40, $width / 2 + 20, $height / 2 + 30, $accentColor);
        imagefilledellipse($img, $width / 2, $height / 2 - 40, 40, 15, $white);
    } elseif ($category === 'electronic') {
        // Draw gadget screen
        imagefilledrectangle($img, $width / 2 - 30, $height / 2 - 50, $width / 2 + 30, $height / 2 + 30, $accentColor);
        imagefilledrectangle($img, $width / 2 - 25, $height / 2 - 45, $width / 2 + 25, $height / 2 + 20, $white);
        imagefilledellipse($img, $width / 2, $height / 2 + 25, 6, 6, $white);
    } elseif ($category === 'organic') {
        // Draw leaf
        imagefilledellipse($img, $width / 2, $height / 2 - 10, 50, 70, $accentColor);
        imagefilledellipse($img, $width / 2, $height / 2 - 20, 20, 80, $whiteTrans);
    } elseif ($category === 'voucher') {
        // Draw voucher ticket
        imagefilledrectangle($img, $width / 2 - 35, $height / 2 - 30, $width / 2 + 35, $height / 2 + 10, $accentColor);
        imagefilledellipse($img, $width / 2 - 35, $height / 2 - 10, 15, 15, $white);
        imagefilledellipse($img, $width / 2 + 35, $height / 2 - 10, 15, 15, $white);
    } elseif ($category === 'goods') {
        // Draw shopping bag
        imagefilledrectangle($img, $width / 2 - 25, $height / 2 - 30, $width / 2 + 25, $height / 2 + 30, $accentColor);
        imagefilledellipse($img, $width / 2, $height / 2 - 30, 30, 30, $whiteTrans);
    } elseif ($category === 'food') {
        // Draw bag of rice
        imagefilledrectangle($img, $width / 2 - 20, $height / 2 - 45, $width / 2 + 20, $height / 2 + 30, $accentColor);
        imagefilledellipse($img, $width / 2, $height / 2 - 45, 40, 10, $white);
    }

    // Write text inside the image using standard GD fonts
    $textCol = imagecolorallocate($img, 255, 255, 255);
    $shadowCol = imagecolorallocatealpha($img, 0, 0, 0, 80);

    $fontSize = 5;
    $textWidth = imagefontwidth($fontSize) * strlen($title);
    $textX = (int)(($width - $textWidth) / 2);
    $textY = $height - 50;

    // Draw shadow first
    imagestring($img, $fontSize, $textX + 1, $textY + 1, $title, $shadowCol);
    imagestring($img, $fontSize, $textX, $textY, $title, $textCol);

    // Save image
    if (preg_match('/\.jpg$/i', $path)) {
        imagejpeg($img, $path, 90);
    } else {
        imagepng($img, $path);
    }
    imagedestroy($img);
}

// Generate Sampah Images
$sampahItems = [
    ['file' => 'botol_pet.jpg', 'title' => 'Botol Plastik PET', 'cat' => 'plastic'],
    ['file' => 'gelas_pet.jpg', 'title' => 'Gelas Plastik PET', 'cat' => 'plastic'],
    ['file' => 'botol_hdpe.jpg', 'title' => 'Botol Sabun HDPE', 'cat' => 'plastic'],
    ['file' => 'botol_minyak_hdpe.jpg', 'title' => 'Botol Minyak HDPE', 'cat' => 'plastic'],
    ['file' => 'kresek.jpg', 'title' => 'Kantong Kresek', 'cat' => 'plastic'],
    ['file' => 'kardus.jpg', 'title' => 'Kardus Cokelat', 'cat' => 'paper'],
    ['file' => 'kertas_hvs.jpg', 'title' => 'Kertas HVS', 'cat' => 'paper'],
    ['file' => 'buku_bekas.jpg', 'title' => 'Buku Bekas', 'cat' => 'paper'],
    ['file' => 'koran.jpg', 'title' => 'Koran Harian', 'cat' => 'paper'],
    ['file' => 'kaleng.jpg', 'title' => 'Kaleng Aluminium', 'cat' => 'metal'],
    ['file' => 'besi.jpg', 'title' => 'Besi Seng Tua', 'cat' => 'metal'],
    ['file' => 'tembaga.jpg', 'title' => 'Tembaga Super', 'cat' => 'metal'],
    ['file' => 'botol_bening.jpg', 'title' => 'Botol Kaca Bening', 'cat' => 'glass'],
    ['file' => 'botol_cokelat.jpg', 'title' => 'Botol Kaca Cokelat', 'cat' => 'glass'],
    ['file' => 'kipas.jpg', 'title' => 'Kipas Angin Rusak', 'cat' => 'electronic'],
    ['file' => 'magiccom.jpg', 'title' => 'Magic Com Mati', 'cat' => 'electronic'],
    ['file' => 'hp.jpg', 'title' => 'HP Jadul Rusak', 'cat' => 'electronic'],
    ['file' => 'keyboard.jpg', 'title' => 'Keyboard Bekas', 'cat' => 'electronic'],
    ['file' => 'organik.jpg', 'title' => 'Sampah Organik', 'cat' => 'organic'],
    ['file' => 'jelantah.jpg', 'title' => 'Minyak Jelantah', 'cat' => 'organic'],
];

foreach ($sampahItems as $item) {
    generateGradientImage($sampahPath . '/' . $item['file'], $item['title'], $item['cat']);
}

// Generate Reward Images
$rewardItems = [
    // Hiasan
    ['file' => 'vas_pandan.png', 'title' => 'Vas Anyaman Pandan', 'cat' => 'organic'],
    ['file' => 'hiasan_bambu.png', 'title' => 'Hiasan Dinding Bambu', 'cat' => 'organic'],
    ['file' => 'piring_lidi.png', 'title' => 'Piring Anyaman Lidi', 'cat' => 'organic'],
    ['file' => 'becak_bambu.png', 'title' => 'Miniatur Becak Bambu', 'cat' => 'organic'],
    ['file' => 'gantungan_ukir.png', 'title' => 'Gantungan Kayu Ukir', 'cat' => 'paper'],

    // Peralatan
    ['file' => 'bangku_rotan.png', 'title' => 'Bangku Rotan Anyaman', 'cat' => 'metal'],
    ['file' => 'tampah_bambu.png', 'title' => 'Tampah Bambu Tradisional', 'cat' => 'organic'],
    ['file' => 'sapu_lidi.png', 'title' => 'Sapu Lidi Tangkai', 'cat' => 'organic'],
    ['file' => 'tisu_rotan.png', 'title' => 'Tempat Tisu Rotan', 'cat' => 'organic'],
    ['file' => 'keranjang_bambu.png', 'title' => 'Keranjang Bambu Pakaian', 'cat' => 'organic'],

    // Perlengkapan
    ['file' => 'tas_anyaman.png', 'title' => 'Tas Anyaman Bambu', 'cat' => 'goods'],
    ['file' => 'topi_caping.png', 'title' => 'Topi Caping Bambu', 'cat' => 'goods'],
    ['file' => 'dompet_rotan.png', 'title' => 'Dompet Koin Rotan', 'cat' => 'goods'],
    ['file' => 'sandal_eceng.png', 'title' => 'Sandal Eceng Gondok', 'cat' => 'goods'],
    ['file' => 'tas_goni.png', 'title' => 'Eco Bag Goni UMKM', 'cat' => 'goods'],
];

foreach ($rewardItems as $item) {
    generateGradientImage($rewardsPath . '/' . $item['file'], $item['title'], $item['cat']);
}

echo "All 35 dummy images generated successfully!\n";
