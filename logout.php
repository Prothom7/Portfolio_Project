<?php
session_start();
session_destroy();

// Clear the remembered username cookie
setcookie("remembered_username", "", time() - 3600, "/");

header("Location: admin.php");
exit();
?>