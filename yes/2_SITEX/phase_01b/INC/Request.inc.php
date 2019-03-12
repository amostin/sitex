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
    

    public function __construct()
    {
        $this->iDebug = new Debug();

        if (isset($_GET["rq"])) $this->rq = $_GET["rq"];
        else $this->rq = null;


        $this->iDebug->addMsg("Requête reçue : " . $this->rq);
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