<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 11/03/2019
 * Time: 19:44
 */

//include("custom.lib.php");
include_once ('Debug.inc.php');
testClass("Debug");
include_once ('Action.inc.php');
testClass("Action");
include_once "INC/Session.php";
testClass("Session");


class Request
{
    private $rq = null;
    private $iDebug = null;
    private $rqList = ["test", "home"];
    private $iAction = null;
    private $iSession = null;

    public function __construct()
    {
        $this->iDebug = new Debug();
        $this->iAction = new Action($this->iDebug);
        $this->iSession = new Session($this->iDebug);


        if (isset($_GET["rq"])) $this->rq = $_GET["rq"];
        else $this->rq = null;


        $this->iDebug->addMsg("Requête reçue : " . $this->rq);

        if($this->isValid($this->rq)){

            $this->iDebug->addMsg("Requête valide");

            $func = $this->rq;
            $this->$func();

            $this->iSession->addLog($this->rq);
        }
        else {
            $this->iDebug->addMsg("Requête non valide");
            $this->iSession->addLog("!" . $this->rq);
        }


    }

    private function test(){
        $this->iDebug->addMsg("Je suis dans " . __FUNCTION__);
        $this->iAction->add("testSousMenu", "<h1>Test du sous menu</h1><strong>God Damn !</strong>");

    }

    private function home(){
        //$this->iAction->add("testAffiche", "<h1>Test de la chaine complête</h1><strong>Cela fonctionne !</strong>");
        $this->iDebug->addMsg("Je suis dans " . __FUNCTION__);
        $this->iAction->add("testAffiche", "<h1>Test de la chaine complête</h1><strong>Cela fonctionne !</strong>");

    }

    private function isValid($rq){
        if (in_array($rq, $this->rqList)) {
            return true;
        }
        else return false;
    }

    public function send(){
//echo "ooo";
//var_dump($this->iDebug);
//$this->iDebug->send();
        //$jeNexistePas++;
        $phpError = error_get_last();
//var_dump($phpError);

        if(!(is_null($phpError))){
//echo "phperror existe";
            $this->iAction->add("phpError", $phpError);
        }
//echo "pas phperror";
        $this->iAction->add("debug", $this->iDebug->send());


        return $this->iAction->send();
    }

    /**
     * @return null
     */
    public function getRq()
    {
        //var_dump(get_class_vars('Request'));
        return $this->rq;
    }

    /**
     * @param null $rq
     */
    public function setRq($rq)
    {
        $this->rq = $rq;
    }
}


/*
 $this->test();
 var_dump($this->rq);
 echo $this->rq . "();";
 $func = $this->$this->rq;
 $func();
 echo $this->{$this->rq};
 $func = $this->{$this->rq};
 $func();

 $func = $this->rq;
 $this->{$func()}; error

             $ceci = "$this->";
 var_dump($ceci);   fatalerror object cannot be convert to string
*/