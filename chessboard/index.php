<?php
$errors = array();

if (isset($_GET['x']) && isset($_GET['y'])) {
    $x = (int) $_GET['x'];
    $y = (int) $_GET['y'];
    
    if ($x < 0 || $y < 0) {
        $errors[] = 'The number must be a positive value!';
    } 
    if ($x > 100 || $y > 100) {
        $errors[] = 'The limit is 100 squares!';
    }
    if (!$errors) {
        $data = array();
        $row = array();

        for ($col = 0; $col < $y; $col++) {
            ($col % 2) ? $defaultRow = 1 : $defaultRow = 0;     // not even : even
            for ($square = 0; $square < $x; $square++) {
                if ($defaultRow == 0) {
                    ($square % 2) ? $num = 1 : $num = 0;
                }    
                if ($defaultRow == 1) {
                    ($square % 2) ? $num = 0 : $num = 1;
                }
                $row[] = $num;
            }
            $data[$col] = $row;
            unset($row);
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Chessboard in PHP</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="chessboard.css" />
  </head>
  <body>
    <h2>Make your own chessboard!</h2>
    <p>The limit is 100 vertical or horizontal squares...</p>  
    <form method="GET" action="index.php">
      <table>
        <tr><td>Number of squares for a row:</td><td><input type="text" name="x" size="5" maxlength="3" /></td></tr>
        <tr><td>Number of squares for a column:</td><td><input type="text" name="y" size="5" maxlength="3" /></td></tr>
        <tr><td><input type="submit" value="Go!" name="submit" /></td><td></td></tr>
      </table>
    </form>
    <hr />
    <?php
    if ($errors) {
        foreach($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
    } elseif (isset($x) && isset($y)) {
        echo '<table class="chessboard">';
        foreach ($data as $tabRow) {
            echo '<tr>';
            foreach ($tabRow as $square) {
                if ($square == 0) {
                    echo '<td class="white"></td>';
                }
                if ($square == 1) {
                    echo '<td class="black"></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
  </body>
</html>