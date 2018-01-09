<?php
require_once('../data/session.php');

session_destroy();
?>
<div style="margin: 50px auto;">Please wait 1 sec. ...</div>

<script>
    setTimeout(function() {
        window.location.href = "../pages/login.php";
    }, 1000);
</script>