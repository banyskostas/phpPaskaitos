<?php
// Predefined variables
$arr = [];
$arr2 = [];

if (isset($_GET["numbers"])) {
    $arr = explode(',', $_GET["numbers"]);
    $arr2 = [];

    for ($i = 0; $i < count($arr); $i++) {
        $prev = isset($arr[$i - 1]) ? $arr[$i - 1] : 0;
        $curr = $arr[$i];
        $next = isset($arr[$i + 1]) ? $arr[$i + 1] : 0;

        $delimiter = 3;
        if (!isset($arr[$i - 1]) || !isset($arr[$i + 1])) {
            $delimiter = 2;
        }
        $arr2[] = ($prev + $curr + $next) / $delimiter;
    }
}



?>

<form action="2.php" method="get">
    <input type="text" name="numbers">
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_GET["numbers"])) {
?>
    <table>
        <thead>
        <tr>
            <th>Before</th>
            <th>After</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($arr); $i++) {
            echo "<tr><td>$arr[$i]</td><td>$arr2[$i]</td></tr>";
        }
        ?>
        </tbody>
    </table>
<?php
}
?>
