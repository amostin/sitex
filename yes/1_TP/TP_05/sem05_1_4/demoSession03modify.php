<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 13/03/2019
 * Time: 07:57
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
// to change a session variable, just overwrite it

if(isset($_SESSION["startTime"])){
    $_SESSION["lastVisit"]["modify"] = date("Y D d H\hi's\"");
}
$_SESSION["favcolor"] = "yellow";
?>

<pre><?php print_r($_SESSION); ?></pre>

</body>
</html>