<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 15:35
 */

include_once "mesFonctions.inc.php";

echo monPrint_r($_FILES);

if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
    $acceptTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if(in_array($_FILES['userfile']['type'], $acceptTypes)) {
        $tmp_name = $_FILES['userfile']['tmp_name'];
        $name = basename($_FILES['userfile']['name']);
        $path = "MES_IMAGES/";
        if (move_uploaded_file($tmp_name,$path . $name )) echo '<a href=' . $path . $name . '>Uploaded Image</a>';
        else echo "Failure";
    } else {
        echo "Error: Extension non supportée !";
    }
}
