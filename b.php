<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumlah Kuadrat</title>
</head>
<body>
    <h2>Jumlah Kuadrat</h2>
    <form method="post">
        <label for="numbers">Masukkan angka (pisahkan dengan koma):</label><br>
        <input type="text" id="numbers" name="numbers" required><br><br>
        <input type="submit" value="Hitung">
    </form>
    <?php
    function sumOfSquares($numbers) {
        $numbers = explode(",", $numbers);
        $numbers = array_map('intval', $numbers);
        $squared_numbers = array_map(function($x) { return $x * $x; }, $numbers);
        $sum = array_reduce($squared_numbers, function($carry, $item) { return $carry + $item; }, 0);
        return $sum;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["numbers"];
        $result = sumOfSquares($input);
        echo "<h3> $result</h3>";
    }
    ?>
</body>
</html>
