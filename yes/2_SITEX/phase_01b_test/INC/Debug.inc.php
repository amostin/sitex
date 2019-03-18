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
     *
     * @param bool $debug
     */
    public function setDebug($debug = true)
    {
        if ($debug === 0 || $debug == [] || $debug == "" || $debug ==null) {
            return false;
        } else if ($debug !=0 || $debug == "0" || $debug != "" || $debug != []) {
            return true;
        }
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
//echo $this->mPr($this->msgList);
        return $this->mPr($this->msgList);
    }

    public function debug(){

    }
}



//var_dump(get_class_vars('Debug'));
