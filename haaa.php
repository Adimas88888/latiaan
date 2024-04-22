<?php
function nilaiKeWarna($nilai) {
    if ($nilai >= 70) {
        return "hijau";
    } elseif ($nilai >= 30 && $nilai < 70) {
        return "kuning";
    } else {
        return "merah";
    }
}


$nilai_siswa = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai_siswa = $_POST["nilai"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>haaa</title>
    <style>
        .hijau {
            color: green;
        }
        .kuning {
            color: yellow;
        }
        .merah {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Warna Nilai Siswa</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nilai">Masukkan nilai siswa:</label>
        <input type="number" id="nilai" name="nilai" min="0" max="100" value="<?php echo $nilai_siswa; ?>">
        <button type="submit">Submit</button>
    </form>
    <?php

    if (!empty($nilai_siswa)) {
        $warna = nilaiKeWarna($nilai_siswa);
        echo "<p style='color: $warna;'>Warna: " . ucfirst($warna) . "</p>";
    }
    ?>
</body>
</html>
