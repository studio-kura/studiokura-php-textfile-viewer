<?php
if (!isset($_GET['s'])) die('No input');
if (strlen($_GET['s']) < 5) die('No input');
if (strpos($_GET['s'], '.txt') == false) die('No input');
$config = include('config.php');
$filename = $config['path'] . $_GET['s'];
echo '<pre>';
readfile($filename);
