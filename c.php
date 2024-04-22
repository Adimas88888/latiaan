<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Search</title>
</head>
<body>
    <h2>Binary Search</h2>
    <form method="post">
        <label for="numbers">Enter numbers separated by comma and the number to find:</label><br>
        <input type="text" id="numbers" name="numbers" required><br><br>
        <input type="submit" value="Search">
    </form>
    <?php
    function binarySearch($arr, $target) {
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            
            if ($arr[$mid] == $target) {
                return $mid; 
            } elseif ($arr[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return -1; 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["numbers"];
        $inputs = explode(",", $input);
        $angka = array_map('intval', array_slice($inputs, 0, -1));
        $target = intval(end($inputs));
        $result = binarySearch($angka, $target);

        if ($result != -1) {
            echo "<h3>Angka $target ditemukan di indeks ke-$result.</h3>";
        } else {
            echo "<h3>Angka $target tidak ditemukan dalam daftar.</h3>";
        }
    }
    ?>
</body>
</html>
