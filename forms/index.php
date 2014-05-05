<?php

$answers = [
    0 => 'Are you saying the Chantry is wrong?',
    1 => 'Belive what feel right to you, Leliana.',
    2 => 'Just make sure your beliefs arent a hindrance.',
    3 => 'I understand, lets move on.'
];

function getAnswers($answers)
{
    $count = count($answers);
    $values = [];
    $data = [];
    
    for ($i = 0; $i < $count; $i++) {
        $values[] = $i;
    }
    
    while (count($data) < $count) {
        $max = max($values);
        $min = min($values);
        $num = rand($min,$max);
        
        if (!in_array($num, $data)) {
            $data[] = $num;
            unset($values[$num]);
        }
    }
    
    foreach ($data as $item) {
        echo "<p>$answers[$item]</p>";
    }
    
    echo '<hr />';
}


$error = '';
$data = trim($_GET['values']);
$data = preg_replace('/\,$/', '', $data); // z konce retezcu odstranit vse, co neni cislo
$data = preg_replace('/\.$/', '', $data);
$values = explode(',', $data);
foreach ($values as $key => $value) {
    $values[$key] = trim($value);
    if (!is_numeric($value)) {
        $error = 'Invalid data!';
        break;
    }
}
sort($values);
$count = count($values);
if ($count % 2) {
    $position = round($count/2)-1;
    $median = $values[$position];
} else {
    $positionA = ($count/2)-1;
    $positionB = $positionA + 1;
    $median = ($values[$positionA] + $values[$positionB]) / 2;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="chessboard.css" />
  </head>
  <body>
    <h2>Select median</h2>
    <form method="GET" action="index.php">
        <p>Enter values separated with a comma in the following format "0, 7, 1, 4, 9, 0.5, 3":</p>   
        <p><input type="text" name="values" size="65" /></p>
        <p><input type="submit" value="Median" name="submit" /></p>
    </form>
    <?php
    if ($error) {
        echo '<p>' . $error . '</p>';
    } elseif (isset($median)) {
        echo '<p><strong>Median is ' . $median . '.</strong></p>';
    }
    ?>
    <hr />
    <?php
    getAnswers($answers);
    getAnswers($answers);
    getAnswers($answers);
    getAnswers($answers);
    ?>
  </body>
</html>