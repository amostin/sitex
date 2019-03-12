<?php
function footerContent($infos){

    $html = "<a id=\"mail\" href=\"mailto:".$infos['mail'] ."\"" . " >" . $infos['pNom'] . "- <span id=\"groupeEphec\">" . $infos['groupe'] . "</span> - @ 20".substr($infos['anacad'], 2, 2)."</a>";
    return $html;
}

/**
 * La fonction va recevoir deux, voire trois paramètres.
 * Le premier sera le nom court du site (ex. SITEX)
 * Le second sera le numéro de version du site (ex. '00'),
 *
 * Le dernier s'il est passé, sera le nom COMPLET du fichier
 * (chemin relatif compris) à inclure pour retrouver les
 * informations nécessaires.
 * Par défaut (s'il n'est pas passé) ce nom sera dbconnect.inc.php.
 * La fonction va utiliser la constante __MATRICULE__ et/ou le contenu de
 * la variable __INFOS__ qui s'y trouvent pour construire
 * et retourner un tableau associatif contenant une version
 * différentes de ces infos.
 *
 * @param string SshortName : le nom du site (ex: 'SITEX')
 * @param string $version  : le numéro de version du site (ex. '00')
 * @param string $fileName : le nom COMPLET du fichier à inclure (chemin relatif compris)
 * @return array : tableau associatif contenant les propriétés suivantes :
 *        pNom  : le prénom et le nom du développeur séparé par un espace
 *        matricule : le matricule du développeur
 *        mail : l'email au format matricule@students.ephec.be
 *        groupe : la "classe" (ex. 2TM2)
 *        anacad : l'année académique (ex. 1819) récupérée dans le nom de la DB
 *        shortName : le premier paramètre reçu
 *        version : le second paramètre reçu
 */
function getInfos($shortName, $version, $fileName = "dbconnect.inc.php"){

    include("dbConnect.inc.php");


    /**
     *
     * @var string 	$__INFOS__ = array(   'matricule'=> ___MATRICULE___
    *,'host' => 'localhost'
    *,'user' => 'MOSTIN'
    *,'pswd' => 'Ambroise5a4X'
    *,'dbName' => '1819he201546'
    *,'nom' => 'MOSTIN'
    *,'prenom' => 'Ambroise'
    *,'classe' => '2TL2'
    *);
     *
     */

    $structInfos = array(
        "pNom" => $__INFOS__["prenom"] . ' ' . $__INFOS__["nom"],
        "matricule" => ___MATRICULE___,
        "mail" => ___MATRICULE___."@students.ephec.be",
        "groupe" => $__INFOS__["classe"],
        "anacad" => substr($__INFOS__['dbName'], 0, 4),
        "shortName" => $shortName,
        "version" => $version,
    );

    return $structInfos;

}

function monPrint_r($tab) {
    return '<pre>' . print_r($tab, true) . '</pre>';
}

//echo monPrint_r(getInfos("SITEX", 00));

?>