<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 12:02
 */

include "mesFonctions.inc.php";
?>
<pre><?php echo (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/he201546/2_SITEX/phase_01/index.php';
    ?></pre>

<?php

$href = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/he201546/2_SITEX/phase_01/index.php';

$message = "Cliquez sur <a href=\"".$href."\">ce lien</a>";
echo $message;
?>

