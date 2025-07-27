<?php
// Bahan.php

// Data bahan jamu
$data = [
    ['Kunyit', 'Bahan utama', 'Antioksidan, antiradang, meningkatkan sistem imun, meredakan nyeri haid', 1500],
    ['Jahe', 'Bahan utama', 'Menghangatkan tubuh, meredakan nyeri otot, meningkatkan imun, mencegah mual', 1200],
    ['Temulawak', 'Bahan utama', 'Melindungi hati, antiinflamasi, meningkatkan nafsu makan', 2000],
    ['Kencur', 'Bahan utama', 'Meredakan nyeri, antibakteri, melancarkan pencernaan, meningkatkan nafsu makan', 1500],
    ['Serai', 'Bahan utama', 'Meredakan demam, melancarkan pencernaan, mengurangi stres', 800],
    ['Daun Pepaya', 'Bahan utama', 'Meningkatkan nafsu makan, membantu pencernaan dengan enzim papain', 600],
    ['Mengkudu', 'Bahan utama', 'Mengelola tekanan darah, pereda nyeri, memperbaiki pencernaan', 2100],
    ['Daun Beluntas', 'Bahan utama', 'Antibakteri, detoksifikasi, menghilangkan bau badan', 800],
    ['Asam Jawa', 'Bahan utama', 'Menurunkan suhu badan, menyegarkan, mendukung kesehatan hati', 1000],
    ['Cengkeh', 'Rempah tambahan', 'Mengatasi sakit kepala, antibakteri', 800],
    ['Kayu Manis', 'Rempah tambahan', 'Menurunkan gula darah, meningkatkan metabolisme', 800],
    ['Daun Pandan', 'Rempah tambahan', 'Memberi aroma harum, membantu pencernaan', 800],
    ['Kapulaga', 'Rempah tambahan', 'Melancarkan peredaran darah, meningkatkan nafsu makan', 500],
    ['Bunga Lawang', 'Rempah tambahan', 'Memberi aroma khas, membantu pencernaan', 500],
    ['Daun Sirih', 'Rempah tambahan', 'Antiseptik, kesehatan mulut dan organ kewanitaan', 500],
    ['Gula Merah', 'Pemanis', 'Menambah rasa manis alami, sumber energi', 1000],
    ['Madu', 'Pemanis', 'Meningkatkan imun, mempercepat penyembuhan, menambah rasa manis', 2000],
    ['Tebu', 'Pemanis', 'Menambah rasa manis alami, mempercepat penyembuhan', 1000],
    ['Lemon', 'Bahan tambahan', 'Menambah rasa segar, sumber vitamin C', 1200],
    ['Delima', 'Bahan tambahan', 'Antioksidan, meningkatkan stamina', 3400],
    ['Soda', 'Bahan tambahan', 'Memberi sensasi segar dan rasa modern pada jamu', 1000],
    ['Mint', 'Bahan tambahan', 'Memberi sensasi segar, antibakteri', 800],
    ['Stevia', 'Pemanis', 'Menambah rasa manis alami, sumber energi', 2000]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Bahan Jamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            vertical-align: top;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even){background-color: #f2f2f2;}
    </style>
</head>
<body>

<h1>Daftar Bahan Jamu</h1>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bahan</th>
            <th>Jenis</th>
            <th>Manfaat</th>
            <th>Harga (Rp)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $index => $bahan): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($bahan[0]) ?></td>
                <td><?= htmlspecialchars($bahan[1]) ?></td>
                <td><?= htmlspecialchars($bahan[2]) ?></td>
                <td><?= number_format($bahan[3], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
