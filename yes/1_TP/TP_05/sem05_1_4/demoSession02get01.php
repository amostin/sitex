<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 13/03/2019
 * Time: 07:56
 */

include_once "menu.inc.php";

session_start();
$id = session_id("ambroise");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="demoSession.css">
</head>
<body>


<?php
// Echo session variables that were set on previous page
/*
$time = ["get" => date("Y D d H\hi's\"")];
array_push($_SESSION["lastVisit"], $time);
*/
if(isset($_SESSION["startTime"])){
    $_SESSION["lastVisit"]["get"] = date("Y D d H\hi's\"");
}
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
$_SESSION["name"] = "ambroise";
echo var_dump($id);
?>

</body>
</html>