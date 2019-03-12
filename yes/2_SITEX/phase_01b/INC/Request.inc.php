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

class Request
{
    private $rq = null;
    private $iDebug = null;
    private $rqList = ["test", "retest"];

    public function __construct()
    {
        $this->iDebug = new Debug();

        if (isset($_GET["rq"])) $this->rq = $_GET["rq"];
        else $this->rq = null;


        $this->iDebug->addMsg("Requête reçue : " . $this->rq);

        if($this->isValid($this->rq)){
            $this->iDebug->addMsg("Requête valide");
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

            $func = $this->rq;
            $this->$func();

        }
        else $this->iDebug->addMsg("Requête non valide");

    }

    private function test(){
        $this->iDebug->addMsg("Je suis dans " . __FUNCTION__);
    }

    private function retest(){
        $this->iDebug->addMsg("Je suis dans " . __FUNCTION__);
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
        $this->iDebug->send();
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