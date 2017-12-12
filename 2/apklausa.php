<?php
// 1 variantas
$atsakymas = "";
$teisingas = 4;
$spalva = "red";
$atsakymasTekstu = "";
$elnias = 'Elnias';
$katinas = 'Katinas';
$muse = 'Muse';
$meska = 'Meska';


if (isset($_GET["reiksme"])) {
    $atsakymas = $_GET["reiksme"];

    if ($atsakymas == 1) {
        $atsakymasTekstu = $elnias;

    } else if ($atsakymas == 2) {
        $atsakymasTekstu = $katinas;

    } else if ($atsakymas == 3) {
        $atsakymasTekstu = $muse;

    } else if ($atsakymas == 4) {
        $atsakymasTekstu = $meska;
    }
//    $atsakymas = 1;
//    switch ($atsakymas) {
//        case 1:
//            $atsakymasTekstu = $elnias;
//            break;
//
//        case 2:
//            $atsakymasTekstu = $katinas;
//            break;
//
//        case 3:
//            $atsakymasTekstu = $muse;
//            break;
//
//        default:
//            break;
//    }




    if ($atsakymas == $teisingas) {
        $spalva = "green";
    }
}
$style = 'color: ' . $spalva . ';';


// 2 variantas
//$atsakymas = (isset($_GET["reiksme"])) ? $_GET["reiksme"] : null;
?>

<div id="main" style="width: 500px; margin: 0 auto;">
    <div style="float:left; width: 50%;">
        <div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/79/2010-brown-bear.jpg" style="width: 100%;">
        </div>
    </div>
    <div style="float:left; width: 50%;">
        <div style="padding: 15px;">
            <form action="apklausa.php" method="get">
                <ul style="list-style-type: none;">
                    <li><input type="radio" name="reiksme" value="1" <?php echo $atsakymas == 1 ? 'checked' : ''; ?>>
                        Elnias
                    </li>
                    <li><input type="radio" name="reiksme" value="2" <?php echo $atsakymas == 2 ? 'checked' : ''; ?>>
                        Katinas
                    </li>
                    <li><input type="radio" name="reiksme" value="3" <?php echo $atsakymas == 3 ? 'checked' : ''; ?>>
                        Muse
                    </li>
                    <li><input type="radio" name="reiksme" value="4" <?php echo $atsakymas == 4 ? 'checked' : ''; ?>>
                        Meska
                    </li>
                </ul>
                <br>
                <input type="submit" value="Send">
            </form>
        </div>
    </div>

    <div style="width: 100%;">
        <span style="<?php echo $style; ?>">
            <?php echo $atsakymasTekstu; ?>
        </span>
    </div>
</div>
