<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Los_Angeles");

# Header
require_once('header.php');

# Pages
require_once('about.php');
require_once('stats.php');
require_once('moderation.php');
require_once('support.php');
require_once('contact.php');

# Footer
require_once('footer.php');

?>