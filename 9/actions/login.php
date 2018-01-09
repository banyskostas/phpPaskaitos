<?php
require_once('../data/session.php');

require_once('../data/users.php');

$redirect = '../pages/login.php';

if (count($_POST)) {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $psw = isset($_POST['password']) ? $_POST['password'] : null;

    $redirect = login($username, $psw, $redirect, $users);
}

function login($username, $psw, $redirect, $users) {
    // Validate data
    if (!$username || !$psw || !strlen($username) || !strlen($psw)) {
        return $redirect . '?error=Username or password missing';
    }

    if (!isset($users) || !count($users)) {
        return $redirect . '?error=Users not found';
    }

    $valid = false;
    foreach ($users as $user) {
        if ($user['username'] !== $username) {
            continue;
        }

        if (password_verify($psw, $user['psw'])) {
            $valid = true;

            $_SESSION['loggedIn'] = true;
            $_SESSION['user'] = $user;

            break;
        }
    }

    if ($valid) {
        return '../pages/main.php';
    }
    return $redirect . '?error=Username or password incorrect';
}
?>

<div style="margin: 50px auto;">Please wait 1 sec. ...</div>

<script>
    setTimeout(function() {
        window.location.href = "<?php echo $redirect; ?>";
    }, 1000);
</script>




