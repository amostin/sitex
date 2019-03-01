<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SITEX1819.00</title>
		<link rel="icon" href="favico.ico">
		<meta name="author" content="Mostin Ambroise">
		<meta name="version" content="1819-SITEX-00">
        <meta name="description" content="EPHEC-T2112 - site d'examen 1819">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="IMG/apple-touch-icon.png">

        <link rel="stylesheet" href="CSS/normalize.min.css">
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/custom.css">
        <link rel="stylesheet" href="CSS/mediaQueries.css">



        <script src="/All/mo/modernizr.min.js"></script>

        <script src="/All/jQ/jquery.min.js"></script>
        <script src="JS/main.js"></script>
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
