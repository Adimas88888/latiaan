<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Numbers</title>
</head>
<body>
    <h2>Sorting Numbers</h2>
    <form method="post">
        <label for="numbers">Enter numbers (separated by space):</label><br>
        <input type="text" id="numbers" name="numbers"><br><br>
        <input type="submit" value="Sort">
    </form>
    <?php
    function bubbleSort($arr) {
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j+1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                }
            }
        }
        return $arr;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["numbers"];
        $numbers = explode(" ", $input);
        $numbers = array_map('intval', $numbers);
        $sorted_numbers = bubbleSort($numbers);
        echo "<h3>Sorted numbers:</h3>";
        echo implode(", ", $sorted_numbers);
    }
    ?>
</body>
</html>
