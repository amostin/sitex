<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 20/02/2019
 * Time: 08:43
 */

include("dbConnect.inc.php");

include "mesFonctions.inc.php";

$sql = 'select code, faculte, intitule from cours c 
        join course_class cc on c.code = cc.cours_id 
        join class cl on cc.class_id = cl.id 
        where cl.nom = \'1TL2\' 
        order by code';
try {
    $dbName = 'minicampus';
    $dbh = new PDO("mysql:host={$__INFOS__['host']};dbname={$dbName}", $__INFOS__['user'], $__INFOS__['pswd']);
    foreach ($dbh->query($sql, PDO::FETCH_ASSOC) as $row){
        echo monPrint_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}