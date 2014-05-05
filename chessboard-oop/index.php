<?php
require_once 'Grid.php';
$errors = array();

if (isset($_GET['x']) && isset($_GET['y'])) {
    $x = $_GET['x'];
    $y = $_GET['y'];
    
    if ($x < 0 || $y < 0) {
        $errors[] = 'The number must be a positive value!';
    } 
    if ($x > 100 || $y > 100) {
        $errors[] = 'The limit is 100 squares!';
    }
    if (!$errors) {
        $chessboard = new Grid();
        $chessboard->setX($x);
        $chessboard->setY($y);
        $chessboard->getGrid();
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
        $chessboard->writeGrid();
    }
    ?>
  </body>
</html>