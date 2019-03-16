<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 16/03/2019
 * Time: 13:29
 */

if(!isset($_POST)) die('<div style="color: #ff0000;">Erreur: parametre manquant</div>');
if (empty($_POST['exp']) || empty($_POST['subject']) || empty($_POST['message'])) die('<div style="color: #ff0000;">Erreur: parametre vide</div>');

//1er email
ini_set('sendmail_from', $_POST['exp']);
$dest = 'amostin@hotmail.fr';
$entete = 'Content-Type: text/html; charset=utf-8\r\n';
if (!mail($dest, $_POST['subject'], $_POST['message'], $entete)) die('<div style="color: red;">Erreur: L\'envoie de l\'email vers le destinataire à échoué !</div>');
else echo "vers dest ok" . '<br>';

//2eme email ATTENTION A CHECKER SES COURRIER INDESIRABLE EVIDEMMENT
ini_set('sendmail_from', $dest);
$subject = 'Confirmation de votre prise de contact';
$msg = '<table>';
$msg .= '<tr>';
$msg .= '<td><b>Expéditeur :</b></td>';
$msg .= '<td>' . $dest . '</td>';
$msg .= '</tr>';
$msg .= '<tr>';
$msg .= '<td><b>Sujet :</b></td>';
$msg .= '<td>' . $_POST['subject'] . '</td>';
$msg .= '</tr>';
$msg .= '<tr>';
$msg .= '<td><b>Contenu :</b></td>';
$msg .= '<td>' . $_POST['message'] . '</td>';
$msg .= '</tr>';
if (!mail($_POST['exp'], $subject, $msg, $entete)) die('<div style="color: red;">Erreur: L\'envoie de l\'email vers l\'expediteur à échoué !</div>');
else echo "vers exp ok";
