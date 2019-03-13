<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 13/03/2019
 * Time: 07:56
 */

include_once "menu.inc.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="demoSession.css">
</head>
<body>

<pre><?php print_r($_SESSION) ?></pre>;

</body>
</html>