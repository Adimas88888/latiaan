<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktorial Calculator</title>
</head>
<body>
    <h2>Faktorial Calculator</h2>
    <form method="post">
        <label for="number">Enter a non-negative integer:</label><br>
        <input type="number" id="number" name="number" min="0" required><br><br>
        <input type="submit" value="Calculate">
    </form>
    <?php
    function factorial($n) {
        if ($n == 0) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST["number"];
        $result = factorial($n);
        echo "<h3>Faktorial dari $n adalah: $result</h3>";
    }
    ?>
</body>
</html>
