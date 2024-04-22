<?php
function nilaiKeKata($nilai) {
    if (is_numeric($nilai)) {
        if ($nilai % 2 != 0) {
            return "Tok";
        } else {
            return "Tik";
        }
    } else {
        return "Tiktok";
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
    <title>hiii</title>
</head>
<body>
    <h1>Kata Sesuai Nilai</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nilai">Masukkan nilai siswa:</label>
        <input type="text" id="nilai" name="nilai" value="<?php echo $nilai_siswa; ?>">
        <button type="submit">Submit</button>
    </form>
    <?php

    if (!empty($nilai_siswa)) {
        $kata = nilaiKeKata($nilai_siswa);
        echo "<p>Kata: $kata</p>";
    }
    ?>
</body>
</html>
