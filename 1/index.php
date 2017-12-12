<?php

$z = null;
if (isset($_GET['skaicius1']) && isset($_GET['skaicius2'])) {
    $x = $_GET['skaicius1'];
    $y = $_GET['skaicius2'];

    $z = $x + $y;
}
?>

<form action="index.php" method="get">
    X
    <input type="number" name="skaicius1" value="">
    <br>
    Y
    <input type="number" name="skaicius2" value="">
    <input type="submit" value="Send">
</form>

<div style="<?php echo (!isset($z)) ? "display:none;" : "";?> width: 100px;height: 100px; background-color: red;color white;">
    <?php echo (!isset($z)) ? "" : $z; ?>
</div>
