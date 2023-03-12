<?php
    session_start();
    if(isset ($_POST["logout-button"])){
        session_destroy();
        header("Location: index.php");
    }
?>