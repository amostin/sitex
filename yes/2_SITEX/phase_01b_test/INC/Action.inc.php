<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 12/03/2019
 * Time: 11:00
 */

include_once ('Debug.inc.php');
testClass("Debug");

class Action
{
    private $list = [];
    private $iDebug = null;


    public function __construct($iAct = null)
    {
        $this->iDebug = new Debug();
//var_dump($iAct);
        if($iAct instanceof Debug) {
            $this->iDebug = $iAct;
//echo "iact est une instance de debug";
        }
        else $iAct = new Debug();

    }

    public function add($actionName, $actionDatas){
        array_push($this->list, [$actionName => $actionDatas]);
        $this->iDebug->addMsg("Ajout de l'action : " . $actionName);
    }

    public function send(){
//echo "yooooooooooooooooooooooooooooooo";
        //if (method_exists($this->iDebug, 'debug')){
        if (true){

                //array_push($this->list, ["debug" => $this->iDebug->send()]);
        };
//var_dump($this->list);
//echo "juste avant json encode";
        echo json_encode($this->list);
        return json_encode($this->list);
    }
}

/*

        if (!(method_exists($this->iDebug, 'debug'))){
            array_push($this->list, ["debug" => $this->iDebug->send()]);
        };

*/