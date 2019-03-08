<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 08/03/2019
 * Time: 11:54
 */

require "dbConnect.inc.php";
require "mesFonctions.inc.php";
$groupe = !empty($_GET['groupe']) ? $_GET['groupe'] : '1TL2';
$sql = "select code, faculte, intitule from cours c 
        join course_class cc on c.code = cc.cours_id 
        join class cl on cc.class_id = cl.id 
        where cl.nom = ?
        order by code";
try {
    $dbName = 'minicampus';
    $dbh = new PDO("mysql:host={$__INFOS__['host']};dbname={$dbName}", $__INFOS__['user'], $__INFOS__['pswd']);
    $sth = $dbh->prepare($sql);
    $sth->execute([$groupe]);
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo creeTableau($res, "avec index", true);
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}