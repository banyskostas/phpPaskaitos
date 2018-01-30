<?php
include_once('darbuotojas.class.php');
include_once('IprastinisDarbuotojas.class.php');
include_once('AutorinisDarbuotojas.class.php');
include_once('IndividualiVeiklaDarbuotojas.class.php');

// Actual add
if ($_GET) {
    // Variantas 1
    $className = Darbuotojas::getSalaryAfterTaxesRules()[$_GET['tipas']]['className'];
    $obj = new $className();

    // Variantas 2
//    $obj = null;

//    switch ($_GET['tipas']) {
//        case Darbuotojas::EMPLOYEE_TYPE_DEFAULT:
//            /** @var IprastinisDarbuotojas $obj */
//            $obj = new IprastinisDarbuotojas();
//            break;
//
//        case Darbuotojas::EMPLOYEE_TYPE_AUTHOR:
//            /** @var AutorinisDarbuotojas $obj */
//            $obj = new AutorinisDarbuotojas();
//            break;
//
//        case Darbuotojas::EMPLOYEE_TYPE_INDIVIDUAL_ACTIVITY_CERT:
//            /** @var IndividualiVeiklaDarbuotojas $obj */
//            $obj = new IndividualiVeiklaDarbuotojas();
//            break;
//    }

    if (!$obj) {
        echo 'Tipas nerastas';
        return false;
    }

    $obj->setVardas(trim(htmlentities($_GET['vardas'])));
    $obj->setPavarde(trim(htmlentities($_GET['pavarde'])));
    $obj->setAlga(trim(htmlentities($_GET['alga'])));
    $obj->setTipas(trim(htmlentities($_GET['tipas'])));

    if ($obj->save()) {
        echo 'Darbuotojas pridetas';
        return true;
    }
    echo 'Darbuotojo prideti nepavyko';
    return false;
}
?>

<h2>Prideti darbuotoja</h2>

<form action="addEmployee.php" method="get">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="vardas">Vardas</label>
                <input name="vardas" type="text" class="form-control" id="vardas" placeholder="Vardas">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="pavarde">Pavarde</label>
                <input name="pavarde" type="text" class="form-control" id="pavarde" placeholder="pavarde">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="alga">Alga</label>
                <input name="alga" type="text" class="form-control" id="alga" placeholder="alga">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipas">Darbuotojo tipas</label>
                    <select name="tipas" id="tipas">
                        <?php
                        foreach (Darbuotojas::getSalaryAfterTaxesRules() as $rule) {
                            echo '<option value="'.$rule['type'].'">'.$rule['title'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="submit">Submit</button>
        </div>
    </div>
</form>
