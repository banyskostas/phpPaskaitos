<?php


////$q = "SELECT * FROM `Documents` WHERE `extension` = 'docx' AND `created_at` < '2018-01-11 19:42:00'";
//$q = "INSERT INTO `Documents`(`title`, `type`, `path`, `extension`, `created_at`) VALUES ('myWord2', 1, 'files/documents/myword2.docx', 'docx', CURRENT_TIMESTAMP)";
//$result = $db->query($q);
//
//var_dump(mysqli_insert_id($db));
//die();
//
//$lentele = [];
//if ($result) {
//    while ($row = $result->fetch_assoc()) {
//        $lentele[] = $row;
//    }
//} else if ($error = mysqli_error($db)) {
//    echo $error;
//}
//
//mysqli_close($db);
//
//print_r($lentele);
/**
 * @return mysqli
 */
function connect()
{
    $db = new mysqli('localhost', 'root', '', 'testas');
    $db->set_charset("utf8");

    return $db;
}

/**
 * @param string $q
 * @return array|string
 */
function get($q)
{
    $db = connect();
    $result = $db->query($q);

    $arr = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
    } else if ($error = mysqli_error($db)) {
        return $error;
    }
    mysqli_close($db);

    return $arr;
}

function getEducationById($id)
{
    return get('SELECT * FROM `education` WHERE `id` = ' . $id);
}