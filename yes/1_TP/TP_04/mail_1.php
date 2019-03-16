<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 10:51
 */

$to = 'amostin@hotmail.fr';

$from = 'From: a.mostin@students.ephec.be';

$subject = 'test tp4';

$message = 'Bonjour,

Voici mon mail « structuré ».

BàT.man';

if (mail($to, $subject, $message, $from)) echo "le mail a bien été envoyé";
