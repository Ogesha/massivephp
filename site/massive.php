<?php
function getPrimeNumbers($max) {
    $primes = [];
    for ($i = 2; $i <= $max; $i++) {
        $isPrime = true;
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            $primes[] = $i;
        }
    }
    return $primes;
}

if (isset($_GET['task'])) {
    $task = $_GET['task'];

    if ($task == 'params') {
        echo "<h2>URL Parameters</h2>";
        foreach ($_GET as $key => $value) {
            echo "<p>$key: $value</p>";
        }
    } elseif ($task == 'primes' && isset($_GET['number'])) {
        $number = intval($_GET['number']);
        if ($number > 1000) {
            echo "Number should be less than or equal to 1000.";
        } else {
            $primes = getPrimeNumbers($number);
            echo "<h2>Prime Numbers up to $number</h2>";
            echo "<p>" . implode(", ", $primes) . "</p>";
        }
    } else {
        echo "Invalid task or missing parameter.";
    }
} else {
    echo "No task specified.";
}
?>
