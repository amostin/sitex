<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 11/03/2019
 * Time: 19:42
 */

class Debug
{
    private $debug = false;
    private $msgList = [];

    public function __construct($param = false)
    {
        $this->setDebug($param);
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * the !! trick was found at https://www.jstips.co/en/javascript/converting-truthy-falsy-values-to-boolean/
     * @param bool $debug
     */
    public function setDebug($debug = true)
    {
        //$this->debug = "!!".$debug;

        if($debug == "truthy"){
            return "true";
        } else if($debug == "falsy"){
            return "false";
        }
        $this->debug = $debug;
    }

    public function clear(){
        $this->msgList = [];
    }

    public function addMsg($msg){
        array_push($this->msgList, $msg);
    }

    public function mPr($tab){
        return '<pre>' . print_r($tab, true) . '</pre>';
    }

    public function send(){
        //echo "iiii";
        //echo var_dump($this->msgList);
        echo $this->mPr($this->msgList);
    }
}

//var_dump(get_class_vars('Debug'));
