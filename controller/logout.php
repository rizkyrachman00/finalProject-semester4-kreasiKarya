<?php

    session_start();;
    session_destroy();
    unset($_SESSION);
    empty($_SESSION);
    header("Location: ../index.php");

?>