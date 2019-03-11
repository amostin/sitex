<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 11/03/2019
 * Time: 15:32
 */

class Request
{
    private $rq = null;

    public function __construct()
    {
        if (isset($_GET["rq"])) $this->rq = $_GET["rq"];
        else $this->rq = null;
    }

    /**
     * @return null
     */
    public function getRq()
    {
        return $this->rq;
    }
}