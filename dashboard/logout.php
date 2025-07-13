<?php
session_start();
session_unset();         // remove all session variables
session_destroy();       // destroy session

header("Location: ../index.php"); // ✅ change path if logout.php is inside /dashboard
exit;
?>
