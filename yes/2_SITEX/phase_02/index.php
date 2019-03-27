<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 09/02/2019
 * Time: 23:08
 */

// include("JS/test.js");

include "INC/custom.lib.php";

$infos = getInfos("SITEX", 00);

include_once "INC/Request.inc.php";
include_once "INC/Debug.inc.php";

testClass("Request");
testClass("Debug");
/*
include_once "INC/Session.php";
$iSession = new Session();
*/


$iRequete = new Request();

if(!($iRequete->getRq() == null)){
    //echo $iRequete->getRq();
    $iRequete->send();
    die();
}
else {
    //var_dump($iRequete);
    unset($iRequete);
    //var_dump($iRequete);
}


$param = array(   "titleText"=> $infos['shortName']
    ,"mainContent" => "<header>
                        <h1>Bienvenue</h1>
                        <p LANG=\"fr\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </header>
                    <section hidden>
                        <h2>article section h2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
                    </section>
                    <section hidden>
                        <h2>article section h2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
                    </section>
                    <footer hidden>
                        <h3>article footer h3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</p>
                    </footer>"
    ,"asideContent"=> "                    <h3>aside</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>"
    ,"footerSection"=> footerContent($infos)
    ,"navContent"=> "                    <ul>
                       <li><a href=\"home.php\">accueil</a></li>
                        <li><a href=\"works.php\">tp</a></li>
                        <li><a href=\"logOn.php\">connexion</a></li>
                    </ul>"

);

include_once "INC/template.inc.php";




// echo monPrint_r($infos);
/*
if($_GET["rq"] != null){
    echo $_GET["rq"];
    die();
}
else unset($_GET["null"]);


$uneRequete = new Request();

if($uneRequete->getRq() != null){
    echo $uneRequete->getRq();
    die();
}
else {
    //echo $uneRequete->getRq();
    var_dump($uneRequete);
    unset($uneRequete);
}

var_dump(get_class_vars('Debug'));

$unBug = new Debug();
$unBug->setDebug("");

var_dump(get_class_vars('Debug'));


$uneRequete = new Request();

if($uneRequete->send() != null){
    echo $uneRequete->send();
    die();
}
else {
    //echo $uneRequete->getRq();
    var_dump($uneRequete);
    unset($uneRequete);
}

$iReq = new Request();
$iReq->getRq();

if (isset($_GET['rq'])) {
    if (!empty($_GET['rq'])) {
        require_once "INC/request.inc.php";
        die(gereRequete($_GET['rq']));
    }
}

*/
