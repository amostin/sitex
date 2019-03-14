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
if(!(isset($_SESSION["startTime"]))){
    $_SESSION["startTime"] = date("Y D d H\hi's\"");
}
/*
$_SESSION["lastVisit"] = [
        "start" => date("Y D d H\hi's\"")
];
*/

$_SESSION["lastVisit"]["start"] = date("Y D d H\hi's\"");

$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["name"] = "ambroise";


echo "Session variables are set.";
?>

</body>
</html>