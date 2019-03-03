<?php

    function footerContent($infos){
        /** @var array $__INFOS__
        *  @param array $infos
        */
        return "<a href=\"mailto:" . $infos["mail"] ."\">" . $infos["pNom"] .  " </a> <span>- " . $infos["groupe"] . "</span> <span>- @ 20" . substr($infos['anacad'],2 , 2) . "</span>";
    }


    function getInfos($shortName, $version, $fileName = "dbConnect.inc.php"){
        /* @var array $__INFOS__ */
        include $fileName;
        $array1 = array();
        $array1['pNom'] = $__INFOS__['prenom']. " " . $__INFOS__['nom'];
        $array1['matricule'] = $__INFOS__['matricule'];
        $array1['mail'] = $__INFOS__['matricule']. "@students.ephec.be";
        $array1['groupe'] = $__INFOS__['classe'];
        $array1['anacad'] = substr($__INFOS__['dbName'],0,4);
        $array1['shortName'] = $shortName;
        $array1['version'] = $version;

        return $array1;
    }

