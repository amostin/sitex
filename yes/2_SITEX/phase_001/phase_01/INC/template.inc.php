<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->

    <?php $metaNames = [
            'author' => "CHELLE Adrien",
            'description' => "EPHEC-T2112 - site d'examen 1819",
            'version' => "1819-SITEX-00",
            'viewport' => "width=device-width, initial-scale=1"
    ];


    $links=[
    $l1=['apple-touch-icon' =>'IMG/apple-touch-icon.png'],
    $l2=['icon' =>'favicon.ico'],
    $l3=['stylesheet' =>'CSS/normalize.min.css'],
    $l4=['stylesheet' =>'CSS/main.css'],
    $l5=['stylesheet' =>'CSS/custom.css'],
    $l6=['stylesheet' =>'CSS/mediaQueries.css']
    ];

    $scripts = [
        'https://devweb.ephec.be/all/mo/modernizr.min.js',
        'https://devweb.ephec.be/all/jQ/jquery.min.js',
        'JS/testBis3.js',
        'JS/main.js'
    ];

    ?>



    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= $param['titleText']?></title>
        <?php foreach ($metaNames as $clef => $value): ?>
            <meta name="<?=$clef ?>" content="<?=$value ?>">
        <?php endforeach; ?>
        <?php foreach ($links as $aLink): ?>
            <link<?php foreach ($aLink as $attribut=>$valeur): ?> rel="<?= $attribut ?>" href="<?= $valeur ?>" <?php endforeach; ?>>
        <?php endforeach; ?>
        <?php foreach($scripts as $ascript): ?>
            <script src= "<?= $ascript ?>"></script>
        <?php endforeach; ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade" lang="en">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title"><img class="ico" src="IMG/template.jpg" alt="template"><?php  echo $param['siteName']; ?></h1>
                <nav id="menu">
                    <?php echo $param['navContent']; ?>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    <?php echo $param['mainContent']; ?>
                </article>

                <aside>
                    <?php echo $param['asideContent']; ?>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <?php echo $param['footerSection']; ?>
            </footer>
        </div>
    </body>
</html>
