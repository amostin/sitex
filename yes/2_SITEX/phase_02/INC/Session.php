<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 25/03/2019
 * Time: 15:59
 */

include_once ('Debug.inc.php');
testClass("Debug");


class Session
{
    private $iDebug;

    function __construct($iDebug = null)
    {
        session_start();
        $idSession = session_id("premiereSession");
//var_dump($idSession);
        if($iDebug instanceof Debug) {
            $this->iDebug = $iDebug;
        }
        else $this->iDebug = new Debug();

        if(!($this->isStart())){
            $_SESSION["start"] = $this->getTime();
            $_SESSION["user"] = [];
            $_SESSION["logs"] = [];
        }
    }

    function getTime(){
        date_default_timezone_set('Europe/Brussels'); // CDT
        return $current_date = date('YmdHis');
    }

    function isStart(){
        if(isset($_SESSION["start"])){
            return true;
        }
        else return false;
    }

    /**
     * @return Debug
     */
    public function getStart()
    {
        return $_SESSION["start"];
    }

    public function getLogs()
    {
        return $_SESSION["logs"];
    }

    public function getUser()
    {
        return $_SESSION["user"];
    }

    public function getSession()
    {
        return $_SESSION; //echo ?
    }


    public function addLog($texte)
    {
         array_push($_SESSION["logs"], $texte . "@" . $this->getTime()); //attention tableau ?
    }

    public function clearLogs()
    {
        $_SESSION["logs"] = [];
    }

    public function clearStart()
    {
        unset($_SESSION['start']);
    }

}