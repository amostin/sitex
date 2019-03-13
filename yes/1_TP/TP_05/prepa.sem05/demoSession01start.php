<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 13/03/2019
 * Time: 07:55
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

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>

</body>
</html>