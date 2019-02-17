<?php
function footerContent(){
    include("dbConnect.inc.php");

    /**
     * @var string $__INFOS__
     *
     */

    $html = "<a id=\"mail\" href=\"mailto:".___MATRICULE___."@students.ephec.be\" >Ambroise MOSTIN - <span id=\"groupeEphec\">2TL2</span> - @ 20".substr($__INFOS__['dbName'], 2, 2)."</a>";
    return $html;
}
?>