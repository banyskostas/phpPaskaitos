<?php
require_once('mysql.php');

function getNavigation()
{
    $result = get("
    SELECT B.id, B.pid, B.name, B.link 
    FROM `navigation` A, navigation B
    WHERE A.id = B.pid 
    OR (B.pid = 0 AND A.pid = 0) 
    GROUP BY id
    ");

    return $result;
}

var_dump(getNavigation());
