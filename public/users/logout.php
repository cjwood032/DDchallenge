<?php
require_once('../../private/initialize.php');

unset($_SESSION['username']);
unset($_SESSION['user_id']);
// or you could use
// $_SESSION['username'] = NULL;

redirect_to(url_for('/users/login.php'));

?>
