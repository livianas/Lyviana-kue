<!DOCTYPE html>
<html>
<head>
    <title>Toko Kue Lyvi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            padding: 8px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 8px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        ul {
            list-style: none;
            padding: 0;
            text-align: left;
            margin: 0 auto;
            max-width: 300px;
        }
        li {
            margin-bottom: 5px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
        }
        .info {
            background-color: #dff0d8;
            padding: 10px;
            margin-top: 20px;
            max-width: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Toko Kue Lyvi</h1>
    <form method="post" action="">
        <label for="nama_kue">Nama Kue:</label>
        <input type="text" id="nama_kue" name="nama_kue">
        <input type="submit" value="Cari">
    </form>

    <?php
    // Deklarasi array yang berisi informasi kue
    $daftar_kue = array(
        array("Nama" => "Kue Keju", "Harga" => 15000),
        array("Nama" => "Brownies", "Harga" => 20000),
        array("Nama" => "Kue Lapis", "Harga" => 18000),
        array("Nama" => "Donat", "Harga" => 12000)
    );

    // Fungsi untuk menampilkan daftar kue
    function tampilkanDaftarKue($daftar_kue) {

        echo "<ul>";
        foreach ($daftar_kue as $kue) {
            echo "<li>" . $kue['Nama'] . " - Rp " . $kue['Harga'] . "</li>";
        }
        echo "</ul>";
    }

    // Fungsi untuk mencari kue berdasarkan nama
    function cariKue($daftar_kue, $nama_kue) {
        foreach ($daftar_kue as $kue) {
            if ($kue['Nama'] == $nama_kue) {
                return $kue;
            }
        }
        return null;
    }

    // Fungsi untuk menampilkan informasi kue berdasarkan nama
    function tampilkanInfoKue($kue) {
        echo "<h2>Informasi Kue:</h2>";
        if ($kue) {
            echo "<p>Nama: " . $kue['Nama'] . "</p>";
            echo "<p>Harga: Rp " . $kue['Harga'] . "</p>";
        } else {
            echo "<p>Kue tidak ditemukan.</p>";
        }
    }

    // Jika form disubmit, cari kue sesuai dengan input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_kue_yang_dicari = $_POST['nama_kue'];
        $kue_terpilih = cariKue($daftar_kue, $nama_kue_yang_dicari);
        echo '<div class="info">';
        tampilkanInfoKue($kue_terpilih);
        echo '</div>';
    }

    // Menampilkan daftar kue
    echo '<h2>Daftar Kue yang Tersedia:</h2>';
    echo '<ul>';
    tampilkanDaftarKue($daftar_kue);
    echo '</ul>';
    ?>

</body>
</html>
