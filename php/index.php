<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>PHP</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
  </head>
  <body>
    <h2>Let's learn PHP...</h2>
    <p>Example 1:</p>
    
    <?php

    $number = 10;

    function math($number) {
        $number *= 10;
    }
    
    math($number);
    
    echo '<p>Result: ' . $number . '</p>';

    ?>
    <hr />
    <p>Example 2:</p>
    
    <?php
    
    $a = 0;
    $b = -5;
    
    function isGreater($a, $b) {
        if ($a > $b) {
            return $a;
        } elseif ($b > $a) {
            return $b;
        } else {
            return FALSE;
        }
    }
    
    $number = isGreater($a, $b);
    
    if ($number || $number == 0) {
        echo '<p>Greater is ' . $number . '.</p>'; 
    } else {
        echo '<p>Variables are same.</p>';
    }
    
    ?>
    <hr />
    <p>Example 3:</p>
    
    <?php
    
    function getReverseArray($data)
    {
        krsort($data);
        return $data;
    }
    
    $data = [
        0 => 'a',
        1 => 'b',
        2 => 'c',
    ];
    
    $getReverseData = getReverseArray($data);
    foreach ($getReverseData as $key => $item) {
        echo '<p> ' . $key . ' = ' . $item . '</p>';
    }
    
    ?>
    <hr />
    <p>Example 4:</p>
    <?php
    $a = 4; //$c = 0;
    for ($b = 0; $b <= $a; ++$b) {
        $c++;
    }
    //var_dump($c);
    echo '<p>' . $c . '</p>';

    
    $a = 'abc';
    $b = substr($a, 0, -1);
    echo '<p>' . $b . '</p>';
    
    $a = '1';
    $b = &$a;
    
    echo '<p>' . $b . '</p>';
    
    $b = "2$a";
    echo '<p>' . $b . '</p>';
    
    $a = "a";
    $b = "b";
    
    echo '<p>' . ${$b} . '</p>';
    
    ?>
    
    <hr />
    <p>Example 5:</p>
    
    
    
    
  </body>    
</html>