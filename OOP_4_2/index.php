<?php
include_once('darbuotojas.class.php');

const TYPE_ADD_TO_PROJECT = 1;
const TYPE_CHANGE_SALARY = 2;

//$darbuotojas = new Darbuotojas(39);
$darbuotojas = Darbuotojas::getEmployeeObjectAndClassById(51);
var_dump($darbuotojas);
$projektai = $darbuotojas->getProjects();

if (isset($_GET['type'])) {
    switch ($_GET['type']) {
        case TYPE_ADD_TO_PROJECT:
            if ($darbuotojas->addToProject($_GET['projectId'])) {
                echo 'Pavyko priskirti';
            } else {
                echo 'Nepavyko priskirti';
            }
            break;

        case TYPE_CHANGE_SALARY:
            if ($darbuotojas->changeSalary($_GET['salary'])) {
                echo 'pavyko pakeisti alga';
            } else {
                echo 'Nepavyko pakeisti algos';
            }
            break;
    }
}
?>

<h2>Darbuotojo informacija</h2>
<table>
    <thead>
    <tr>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Pareigos</th>
        <th>Alga</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $darbuotojas->getVardas(); ?></td>
        <td><?php echo $darbuotojas->getPavarde(); ?></td>
        <td><?php echo $darbuotojas->getPareigos(); ?></td>
        <td><?php echo $darbuotojas->getAlga(); ?></td>
    </tr>
    </tbody>
</table>
<br>
<br>
<h2>Darbuotojo projektai</h2>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Pavadinimas</th>
        <th>Metai</th>
        <th>Kaina</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($projektai as $item) {
        ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['year']; ?></td>
            <td><?php echo $item['price']; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<br>
<br>
<h2>Veiksmai</h2>
<h3>Prideti prie projekto</h3>
<form action="index.php" type="get">
    <input type="hidden" name="type" value="<?php echo TYPE_ADD_TO_PROJECT;?>">

    <label for="projectId">Projekto ID: </label>
    <input type="number" id="projectId" name="projectId" step="1" value="">

    <button type="submit">Submit</button>
</form>
<br>
<br>
<h3>Pakeisti atlyginima</h3>
<form action="index.php" type="get">
    <input type="hidden" name="type" value="<?php echo TYPE_CHANGE_SALARY;?>">

    <label for="salary">Nauja alga: </label>
    <input type="number" id="salary" name="salary" step="0.01" value="">

    <button type="submit">Submit</button>
</form>
