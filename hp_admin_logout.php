<?php
    session_start();

    session_destroy();

    header("Location: hp_admin_login_choice.php"); //x tau lagi nk pi mana, go homepage
?>