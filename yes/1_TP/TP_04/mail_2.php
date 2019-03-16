<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 11:46
 */

include "mesFonctions.inc.php";

$to = 'amostin@hotmail.fr';

//$from = 'From: a.mostin@students.ephec.be';
ini_set('sendmail_from', 'a.mostin@students.ephec.be');

$subject = 'test tp4';

$entete = 'Content-Type: text/html; charset=utf-8\r\n';

$href = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/he201546/2_SITEX/phase_01/index.php';

$message = "<a href='".$href."'>lien vers sitex phase 01</a>";


if (mail($to, $subject, $message, $entete)) echo "le mail a bien été envoyé";
