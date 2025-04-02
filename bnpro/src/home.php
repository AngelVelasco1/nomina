<?php
include('./src/config.php');
include('./src/session.php');
$userDetails=$userClass->userDetails($session_uid);
?>
<h1>Welcome <?php echo $userDetails->name; ?></h1>

<h4><a href="<?php echo BASE_URL; ?>./src/logout.php">Logout</a></h4>