<?php
$ceu = array("Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels",
    "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris",
    "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", "Greece" => "Athens",
    "Ireland" => "Dublin", "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid",
    "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin",
    "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna",
    "Poland" => "Warsaw");

$ceu2 = $ceu;

asort($ceu);
ksort($ceu2);
?>


<?php
foreach ($ceu as $raktas => $value) {
    echo "The capital of <span><b>$raktas</b></span> is <span><b>$value</b></span><br>";
}
?>
<br>
<br>
<br>
<?php
foreach ($ceu2 as $raktas => $value) {
    echo "The capital of <span><b>$raktas</b></span> is <span><b>$value</b></span><br>";
}
?>
