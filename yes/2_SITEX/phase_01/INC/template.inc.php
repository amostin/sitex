<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->

<?php

$infos = getInfos("SITEX", 00);

$links = array(
    "lien1" => array("icon" => "favico.ico"),
    "lien2" => array("apple-touch-icon" => "IMG/apple-touch-icon.png"),
    "lien3" => array("stylesheet" => "CSS/normalize.min.css"),
    "lien4" => array("stylesheet" => "CSS/main.css"),
    "lien5" => array("stylesheet" => "CSS/custom.css"),
    "lien6" => array("stylesheet" => "CSS/mediaQueries.css")
);

$metaNames = array(
    "author" => $infos['pNom'],
    "description" => "EPHEC-T2112 - site d'examen 18" . substr($infos['anacad'], 2, 2),
    "version" => "18" . substr($infos['anacad'], 2, 2) . "-" . $infos['shortName'] . "-" . $infos["version"],
    "viewport" => "width=device-width, initial-scale=1"
);

$source = array("/All/mo/modernizr.min.js", "/All/jQ/jquery.min.js", "JS/main.js");

?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= $infos['shortName'] . $infos['anacad'] . '.' . $infos['version'] ?></title>
        <?php foreach($metaNames as $aName => $aValue): ?>
		<meta name="<?= $aName ?>" content="<?= $aValue ?>">
        <?php endforeach; ?>

        <?php foreach ($links as $aLink): ?>
            <link<?php foreach ($aLink as $attribut => $valeur): ?> rel="<?= $attribut ?>" href="<?= $valeur ?>"><?php endforeach; ?>
        <?php endforeach; ?>

        <?php foreach($source as $aSource): ?>
            <script src="<?= $aSource ?>"></script>
        <?php endforeach; ?>


        <!--
        <link rel="icon" href="favico.ico">
        <link rel="apple-touch-icon" href="IMG/apple-touch-icon.png">
        <link rel="stylesheet" href="CSS/normalize.min.css">
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/custom.css">
        <link rel="stylesheet" href="CSS/mediaQueries.css">

        <script src="/All/mo/modernizr.min.js"></script>
        <script src="/All/jQ/jquery.min.js"></script>
        <script src="JS/main.js"></script>
-->

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">

            <header class="wrapper clearfix">
                <div class="ico">
                    <img  src="IMG/template.jpg" alt="logo" />
                </div>
                <h1 class="title"><?=$param['titleText'] ?></h1>
                <nav id="menu">
                    <?=$param['navContent'] ?>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    <?=$param['mainContent'] ?>
                </article>

                <aside>
                    <?=$param['asideContent'] ?>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <section id="infos">
                    <?=$param['footerSection'] ?>

                </section>
            </footer>
        </div>
    </body>
</html>
