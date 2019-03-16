<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 12:46
 */

if (isset($_POST['emailAddress']) && isset($_POST['subject']) && isset($_POST['message'])) {
    if (!empty($_POST['emailAddress']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
        $to = $_POST['emailAddress'];
        $subject = $_POST['subject'];
        $entete = 'Content-Type: text/html; charset=utf-8\r\n';
        ini_set('sendmail_from', 'a.mostin@students.ephec.be');
        $message = $_POST['message'];
        if (mail($to, $subject, $message, $entete)) echo "le mail a bien été envoyé";
    }
}