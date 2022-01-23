<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

session_unset();
// Finally, destroy the session.
session_destroy();

header("Location: ../../index.php");
?>