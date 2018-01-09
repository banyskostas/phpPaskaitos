<?php
$users = [
    0 => [
        'id' => 1,
        'username' => 'kostas',
        'psw' => '$2y$10$fde4X/lDeySYscImwUMuF.G7jEpeFrTw4ovxojGjDXn2YslrSph5y'
    ],
    1 => [
        'id' => 2,
        'psw' => '$2y$10$UqmsSKkzitIxUYgK.l2.A.FzKEnE1ycbrewWjVA0JLMkGdnCLa25y'
    ]
];
//$psw = 'Slaptazodis';
//$psw = 'Slaptazodissssssssssssssssssss';

$id = 1;
$psw = 'Slaptazodis';

var_dump(checkUser($id, $psw, $users));

function checkUser($id, $psw, $users) {
    foreach ($users as $user) {
        if (!$user['id'] === $id) {
            continue;
        }

        return password_verify($psw, $user['psw']);
    }
}


//$hash = password_hash($psw, PASSWORD_BCRYPT );
//
//echo $hash;
//
////if (password_verify($psw, $generatedHash)) {
////    echo 'Yes';
////} else {
////    echo 'Nooooo';
////}

