<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 08/03/2019
 * Time: 12:24
 */

$groupe = !empty($_GET['groupe']) ? $_GET['groupe'] : '';
?>
    <form method="get" action="">
        <input type="text" name="groupe" placeholder="groupe recherché" value="<?= $groupe ?>">
        <input type="submit" value="envoi">
    </form>
<?php
if (!isset($_GET['groupe']) || $_GET['groupe'] == "") die();
require_once "dbConnect.inc.php";
require_once "mesFonctions.inc.php";
try {
    $dbh = new PDO("mysql:host=".getServer().";dbname={$__INFOS__['dbName']}", $__INFOS__['user'], $__INFOS__['pswd']);
    $sql = <<<EOD
    call 1819he201546.mc_group(?);
EOD;
    $_oh__oh___oh = '';
    $sth = $dbh->prepare($sql);
    $sth->execute([$groupe]);
    $infos = $sth->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($infos);

    if (count($infos) > 1 ) {
        $_oh__oh___oh .= 'Plusieurs groupes <br> de même nom';

        //if ($infos) $_oh__oh___oh .= creeTableau($infos, "avec index", true);
        //var_dump($infos);
        if ($infos) {
            $temp = '';
            for ($i = 0; $i < count($infos); $i++) {
                $temp .= $infos[$i]['parent_id'] . ' - ' . $infos[$i]['nom'] . '<br>';
            }
            echo $temp;
        }

        else $_oh__oh___oh .= 'Aucun cours n\'est rattaché à ce groupe !';
        $dbh = null;
        die();
    }

    if ($infos) {
        $sql = <<<'EOD'
        call 1819he201546.mc_coursesGroup(?);
EOD;
        $sth = $dbh->prepare($sql);
        $sth->execute([$groupe]);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($res);
        $_oh__oh___oh .= 'Groupe : ' . $groupe . '<br>';
        $_oh__oh___oh .= 'Nom du parent : ' . $infos[0]['parent_id'] . '<br>';
        if ($res) $_oh__oh___oh .= creeTableau($res, "avec index", true);
        else $_oh__oh___oh .= 'Aucun cours n\'est rattaché à ce groupe !';
        $dbh = null;
    } else {
        $_oh__oh___oh .= 'Ce groupe n\'existe pas';
        $dbh = null;
    }
    echo $_oh__oh___oh;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}