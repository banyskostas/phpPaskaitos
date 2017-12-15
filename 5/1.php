<?php
// Predefined variables
$theMost = [
    "title" => null,
    "value" => null,
];


if (isset($_GET["salaries"])) {
    $arr = explode(',', $_GET["salaries"]);

    $salariesByPeriod = [
        "till380" => 0,
        "from380till820" => 0,
        "from820till1500" => 0,
        "from1500" => 0,
    ];

    foreach ($arr as $salary) {
        if ($salary <= 380) {
            $salariesByPeriod["till380"]++;
        } else if ($salary >= 380 && $salary <= 820) {
            $salariesByPeriod["from380till820"]++;
        } else if ($salary >= 820 && $salary <= 1500) {
            $salariesByPeriod["from820till1500"]++;
        } else {
            $salariesByPeriod["from1500"]++;
        }
    }

    foreach ($salariesByPeriod as $title => $value) {
        if (is_null($theMost["value"]) || $theMost["value"] < $value) {
            $theMost["title"] = $title;
            $theMost["value"] = $value;
        }
    }
}

?>

<form action="1.php" method="get">
    <input type="text" name="salaries">
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_GET["salaries"])) {
?>
<p><?php echo $theMost["title"];?>: <?php echo $theMost["value"];?></p>
<?php
}
?>
