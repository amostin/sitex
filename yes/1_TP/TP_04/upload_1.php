<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 14:55
 */

include_once "mesFonctions.inc.php";

echo monPrint_r($_FILES);

if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['userfile']['tmp_name'];
    $name = basename($_FILES['userfile']['name']);
    $path = "DOCUMENTS/";
    if (move_uploaded_file($tmp_name,$path . $name )) echo '<a href=' . $path . $name . '>Uploaded Image</a>';
    else echo "Failure";
}
